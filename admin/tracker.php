<?php
namespace WQPMB\Admin;

use WQPMB\Core\Base;

/**
 * Obbossoi admin_init er maddhome load korte hobe
 * noile kaj korbe na.
 * 
 * Guruttopurrno Bishoy:
 * Base Class a obossoi $this->plugin_prefix thakte hobe.
 * noile kaj korobe na kintu. agei bole rakhlam.
 * eta finalize korar date: 6 Aug, 2023
 * tobe eta agei kora hoyeche min max plugin a
 * test korar jonno.
 * emon ki chalu o kora hoiche.
 * 
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * 
 * 
 */
class Tracker extends Base
{

    protected $plugin_name = 'Plus Minus Button';
    protected $plugin_version = WQPMB_VERSION;


    /**
     * Target menu
     * It's can be sub menu or main/parent menu
     * jodi amar target menu ekti sub menu hoye, tahole
     * $this->if_parent a parent menu dite hobe
     * 
     * R jobi nijei main menu hoy, tahole
     * if_parent = null kore dite hobe.
     *
     * @var string
     */
    public $target_menu = 'wqpmb-settings';
    public $if_parent = 'woocommerce';

    /**
     * Very sectret,
     * we need $this->plugin_fix to generate this
     * key
     * obbossoi Base class a $this->plugin_fix thakte hobe
     * eta amra jenerete korbo constructor e
     * @var string
     */
    protected $transient_key;
    protected $transient;

    /**
     * Very sectret,
     * we need $this->plugin_fix to generate this
     * key
     * obbossoi Base class a $this->plugin_fix thakte hobe
     * eta amra jenerete korbo constructor e
     * @var string
     */
    public $option_key;

    protected $optin_bool;
    /**
     * jetar uppor vitti kore mulot online dekhabe
     * ami ekhane 1 ghonta debo
     * 1 hour = 3600 second
     * half hour = 1800 second
     *
     */
    protected $transient_exp = 10; // in second // when test used 60
    
    public $_domain = 'http://wptheme.cm'; //Don't use slash at the end of the link. eg: http://wptheme.cm or: http://edm.ultraaddons.com
    public $tracker_url;

    public $route = '/wp-json/tracker/v1/track';
    public $current_page;
    public $menu;
    public $access_page;
    public function __construct()
    {

        //Base a obbossoi pri fix thakte hobe.
        $this->transient_key = $this->plugin_prefix . '_transient_trak';
        $this->option_key = $this->plugin_prefix . '_trak_optin';

        $this->tracker_url = $this->_domain . $this->route;
        $this->optin_bool = get_option( $this->option_key );
        $this->transient = get_transient( $this->transient_key );
        // delete_transient($this->transient_key);
        
        

        add_filter('admin_body_class', [$this, 'body_class']);
        if($this->if_parent){
            
            add_action($this->if_parent . '_page_' . $this->target_menu,[$this, 'page_html']);
            add_action('admin_head', [$this, 'style_control']);

        }else{
            add_action('admin_menu', [$this, 'hide_main_menu']);
        }
        
        
    }

    public function hide_main_menu() {
        // remove_submenu_page('parent-menu-slug', 'sub-menu-slug');
    }
    public function run()
    {

        if( $this->transient ) return;
        if( function_exists('current_user_can') && ! current_user_can('administrator') ) return;
        
        set_transient($this->transient_key, 'sent', $this->transient_exp);
        
        $user = wp_get_current_user();
        $theme = wp_get_theme();
        $themeName = $theme->Name;
        
        global $wpdb,$wp_version;
        $other = [];
        $other['plugin_version'] = $this->plugin_version;
        $other['active_plugins'] = $this->active_plugins();
        // $other['php_version'] = phpversion();
        $other['php_version'] = PHP_VERSION;
        
        $other['wp_version'] = $wp_version;
        $other['mysql_version'] = $wpdb->db_version();
        $other['wc_version'] = WC()->version;

        $data = [
            'plugin' => $this->plugin_name,
            'site' => site_url(),
            'site_title' => get_bloginfo('name'),
            'email' => '',//$user->user_email
            'theme' => $themeName,
            'other' => json_encode($other),
        ];

        $api_url = $this->tracker_url; // Replace this with your actual API endpoint

        // return;
        // Send data to the tracking API using the WordPress HTTP API
        wp_remote_post( $api_url, array(
            'method' => 'POST',
            'timeout' => 15,
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
            'body' => json_encode( $data ),
        ) );
    }

    public function add_sub_menu()
    {
        // remove_submenu_page($this->if_parent, $this->target_menu);
        // add_submenu_page($this->if_parent, $this->plugin_name, $this->plugin_name, 'read', $this->target_menu . '-allow', [$this,'page_html']);
        
    }

    public function page_html()
    {
        $datas = filter_input_array(INPUT_POST);
        ?>
        <div class="tracker-wrapper">
            <div class="tracker-content-allow-wrapper">
                <div class="track-content">
                    <?php
                    // var_dump($this,$datas);
                    ?>
                    <div class="track-section header-section">
                        <h3 class="track-title">Never miss an important update</h3>
                    </div>
                    <div class="track-section description-aread">
                        <p>Opt in to get email notifications for security & feature updates, educational content, and occasional offers, and to share some basic WordPress environment info. This will help us make the plugin more compatible with your site and better at doing what you need it to.</p>
                    </div>
                    <div class="track-section allow-submission-wrapper">
                        <form action="" class="ca-track-submission-form" method="POST">
                            <button type="submit" name="allow_and_submit" class="button button-primary">Allow & Continue</button> 
                            <button type="submit" name="skip" class="button button-default">Skip</button> 
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * List of Active plugins.
     *
     * @return array
     */
    private function active_plugins(){
        $active_plugins = get_option( 'active_plugins', array() );
    
        // Return an array of plugin names (without file paths)
        $plugin_names = array_map( 'plugin_basename', $active_plugins );
    
        return $plugin_names;
    }
    public function style_control()
    {
        global $current_screen;
        $s_id = isset( $current_screen->id ) ? $current_screen->id : '';
        
        if( strpos( $s_id, $this->plugin_prefix) == false ) return;
        
        ?>
<style id="<?php echo $this->plugin_prefix ?>-tracker-style">
    .tracker-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        /* background: #ffffffe6; */
        background: #f0f0f1;
        z-index: 1;
        overflow: hidden;
        display: flex;
        align-items: baseline;
        justify-content: center;
        cursor: help;
    }
    .tracker-content-allow-wrapper {
        display: block;
        background: white;
        padding: 0;
        position: fixed;
        margin-top: 80px;
        border: 1px solid white;
        box-shadow: 0 10px 30px #96939359;
        cursor: default;
        min-width: 350px;
        min-height: 100px;
        max-width: 500px;
    }
    .track-content {
        display: flex;
        flex-direction: column;
        gap: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .track-content .track-section {
        padding-left: 15px;
        padding-right: 15px;
    }
    .track-content {
        background: white;
        padding: 20px;
    }
</style>
        <?php
    }

    public function body_class($classes)
    {
        global $current_screen;
        $s_id = isset( $current_screen->id ) ? $current_screen->id : '';
        
        if( strpos( $s_id, $this->plugin_prefix) == false ) return $classes;

        $this->access_page = true;
        $classes .= ' tracker-added allow-tracker-body ';
        return $classes;
    }
}