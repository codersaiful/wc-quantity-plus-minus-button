<?php
namespace WQPMB\Admin;

use WQPMB\Core\Base;
use WQPMB\Admin\Tracker;

class Page_Loader extends Base
{
    public $slug = WQPMB_MENU_SLUG;
    protected $parent_slug = 'woocommerce';
    public $option_key;
    public $data;
    public $is_pro = true;

    /**
     * Right slash already set
     *
     * @var [type]
     */
    public $html_folder_dir;
    public $topbar_file_dir;


    public function __construct()
    {
        /**
         * No need to call construct
         * actually I assign again option_key and data
         * 
         * @since 1.1.8.2
         */
        // parent::__construct();
        $this->option_key = \WQPMB_Button::$option['option'];
        
        $this->data = get_option( $this->option_key);

        $this->html_folder_dir = $this->base_dir . '/admin/html/';
        $this->topbar_file_dir = $this->base_dir . '/admin/html/topbar.php';

    }

    public function run()
    {
        
        add_action( 'admin_init', [$this,'admin_init_tracker'], 999 );
        // var_dump($this);
        add_action( 'admin_menu', [$this, 'admin_menu'] );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_scripts'] );

        //Live Support tawkto.code
        add_action( 'admin_head', [$this,'tawkto_code'], 999 );
        
    }

    public function admin_init_tracker(){
        /**
         * Tracker Enable Only Based on Customer Approval
         * You able to disbale/Enable from
         * Dashboard -> Min Max Control -> Support & Tracker -> Tracker
         * 
         * @since 4.5.8
         */
        $tracker = new Tracker();
        $tracker->run();
        
    }

    public function admin_menu()
    {
        $capability = apply_filters( 'wqpmb_menu_capability', 'manage_woocommerce' );
        add_submenu_page($this->parent_slug, WQPMB_NAME, WQPMB_MENU_NAME, $capability, $this->slug, [$this,'page_html']);
    }
    public function page_html()
    {
        $page_file = $this->html_folder_dir . 'main-page.php';
        if(is_file($page_file)){
            include $this->topbar_file_dir;
            include $page_file;
        }
    }
    public function admin_enqueue_scripts( $hook_suffix )
    {
        global $current_screen;

        $s_id = isset( $current_screen->id ) ? $current_screen->id : '';
        if( strpos( $s_id, $this->plugin_prefix ) !== false ){

            wp_enqueue_style( 'wp-color-picker' );
            wp_register_script( $this->plugin_prefix . '-admin-script', $this->base_url .'assets/js/admin-script.js', array( 'wp-color-picker' ), false, true );
            wp_enqueue_script( $this->plugin_prefix . '-admin-script' );

            $ajax_url = admin_url( 'admin-ajax.php' );
            $WQPMB_ADMIN_DATA = array( 
                'ajax_url'       => $ajax_url,
                'site_url'       => site_url(),
                'cart_url'       => wc_get_cart_url(),
                );
            wp_localize_script( $this->plugin_prefix . '-admin-script', 'WQPMB_ADMIN_DATA', $WQPMB_ADMIN_DATA );
            

            add_filter('admin_footer_text',[$this, 'admin_footer_text']);
            
            wp_register_style( $this->plugin_prefix . '-icon-font', $this->base_url . 'assets/fontello/css/wqpmb-icon.css', false, $this->dev_version );
            wp_enqueue_style( $this->plugin_prefix . '-icon-font' );

            
            wp_register_style( $this->plugin_prefix . '-icon-animation', $this->base_url . 'assets/fontello/css/animation.css', false, $this->dev_version );
            wp_enqueue_style( $this->plugin_prefix . '-icon-animation' );




            wp_register_style( $this->plugin_prefix . '-admin', $this->base_url . 'assets/css/admin-style.css', false, $this->dev_version );
            wp_enqueue_style( $this->plugin_prefix . '-admin' );


            wp_register_style( $this->plugin_prefix . '-new-admin', $this->base_url . 'assets/css/new-admin.css', false, $this->dev_version );
            wp_enqueue_style( $this->plugin_prefix . '-new-admin' );

        }

    }

    public function admin_footer_text($text)
    {
        $rev_link = 'https://wordpress.org/support/plugin/wc-quantity-plus-minus-button/reviews/#new-post';
        $text = sprintf(
			__( 'Thank you for using Plus Minus Button. <a href="%s" target="_blank">%sPlease review us</a>.' ),
			$rev_link,
            '<i class="wqpmb_icon-star-filled"></i><i class="wqpmb_icon-star-filled"></i><i class="wqpmb_icon-star-filled"></i><i class="wqpmb_icon-star-filled"></i><i class="wqpmb_icon-star-filled"></i>'
		);
        return '<span id="footer-thankyou" class="wqpmb-footer-thankyou">' . $text . '</span>';
    }

    /**
     * Adding tawk.to Live Chat support rendering
     * here
     *
     * @return void
     */
    public function tawkto_code()
    {
        global $current_screen;
        $s_id = isset( $current_screen->id ) ? $current_screen->id : '';

        if( strpos( $s_id, $this->plugin_prefix) == false ) return;

        //If disbale option found, we will remove live support
        $off = $this->data['extra']['disable_live_support'] ?? 'no_disable';
        if($off == '1') return;
        ?>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/628f5d4f7b967b1179915ad7/1g4009033';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->      
        <?php
       
    }
}