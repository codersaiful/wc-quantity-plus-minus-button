<?php
namespace WQPMB\Admin;

use WQPMB\Core\Base;

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
    public $submenu;
    public $menu;
    public function __construct()
    {

        //Base a obbossoi pri fix thakte hobe.
        $this->transient_key = $this->plugin_prefix . '_transient_trak';
        $this->option_key = $this->plugin_prefix . '_trak_optin';

        $this->tracker_url = $this->_domain . $this->route;
        $this->optin_bool = get_option( $this->option_key );
        $this->transient = get_transient( $this->transient_key );
        // delete_transient($this->transient_key);
        
        // remove_submenu_page($this->if_parent, $this->target_menu);
        if($this->if_parent){
            // var_dump($this);
            // add_submenu_page($this->if_parent, $this->plugin_name, $this->plugin_name, 'manage_woocommerce', $this->target_menu );
            // var_dump(44444444);
            add_action($this->if_parent . '_page_' . $this->target_menu,function(){
                $content = '';
                $content .= '<h2>HHHHHHHHHHHH</h2>';
                $content .= '<h2>HHHHHHHHHHHH</h2>';
                $content .= '<h2>HHHHHHHHHHHH</h2>';
                $content .= '<h2>HHHHHHHHHHHH</h2>';
                $content .= '<h2>HHHHHHHHHHHH</h2>';
                $content .= '<h2>HHHHHHHHHHHH</h2>';
                $content .= '<h2>HHHHHHHHHHHH</h2>';
                echo $content;
            });
            // add_action('admin_init', [$this, 'get_data']);
            add_action( 'admin_menu', [$this, 'add_sub_menu'] );
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
        add_submenu_page($this->if_parent, $this->plugin_name, $this->plugin_name, 'read', $this->target_menu . '-allow', [$this,'page_html']);
        
    }

    public function page_html()
    {
        var_dump($this);
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
    public function get_data()
    {
        global $submenu;
        var_dump($submenu);
    }
}