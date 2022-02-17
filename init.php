<?php

/**
 * Plugin Name: Quantity Plus Minus Button for WooCommerce
 * Plugin URI: https://wcquantity.com/wc-quantity-plus-minus-button/
 * Description: Easily add plus,minus button for WooCommerce Quantity Input box in everywhere. Such: Single Page, In Loop Quantity input, Cart page etc. 
 * Author: CodeAstrology
 * Author URI: https://profiles.wordpress.org/codersaiful/#content-plugins
 * Text Domain: wqpmb
 * Domain Path: /languages/
 * 
 * Version: 1.1.1
 * Requires at least:    4.0.0
 * Tested up to:         5.9
 * WC requires at least: 3.7
 * WC tested up to:      6.1.1
 */
if ( ! defined( 'ABSPATH' ) ) {
    die();
}

if ( ! defined( 'UltraAddons' ) ) {
    define( 'UltraAddons', __( 'UltraAddons', 'wqpmb' ));
}

if ( !defined( 'WQPMB_VERSION' ) ) {
    define( 'WQPMB_VERSION', '1.1.1.0');
}

if ( !defined( 'WQPMB_NAME' ) ) {
    define( 'WQPMB_NAME', 'Quantity Plus/Minus Button');
}

if ( !defined( 'WQPMB_BASE_NAME' ) ) {
    define( 'WQPMB_BASE_NAME', plugin_basename( __FILE__ ) );
}

if ( !defined( 'WQPMB_MENU_SLUG' ) ) {
    define( 'WQPMB_MENU_SLUG', 'ua-quanity-plus-minus-button' );
}

if ( !defined( 'WQPMB_MENU_NAME' ) ) {
    define( 'WQPMB_MENU_NAME', __( '(+-) Plus Minus button', 'wqpmb' ) );
}

if ( !defined( 'WQPMB_BASE_URL' ) ) {
    define( "WQPMB_BASE_URL", plugins_url() . '/'. plugin_basename( dirname( __FILE__ ) ) . '/' );
}

if ( !defined( 'WQPMB_BASE_DIR' ) ) {
    define( "WQPMB_BASE_DIR", str_replace( '\\', '/', dirname( __FILE__ ) ) );
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

WQPMB_Button::getInstance();

class WQPMB_Button {

    /**
     * Core singleton class
     * @var self - pattern realization
     */
    private static $_instance;
    
    /**
     * Option names Array, We have used to option key for WP Option table
     *
     * @var type Array
     */
    public static $option = array(
        'option' => 'wqpmb_configs',
        'css'       => 'wqpmb_css',
    );
    
    /**
     * CSS selector for Plus Minus Button tag
     *
     * @var type String
     */
    public static $css_selector = '.qib-button-wrapper button.qib-button,.qib-button-wrapper .quantity input.input-text.qty.text';

    /**
     * Trying to commit and push something
     * Minimum PHP Version
     *
     * @since 1.0.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '5.6';
    
    
    /*
     * List of Path
     * 
     * @since 1.0.0
     * @var array
     */
    protected $paths = array();
    
    /**
     * Set like Constant static array
     * Get this by getPath() method
     * Set this by setConstant() method
     *  
     * @var type array
     */
    private static $constant = array();
    
    /**
    * Set Path
    * 
    * @param type $path_array
    * 
    * @since 1.0.0
    */
   public function setPath( $path_array ) {
       $this->paths = $path_array;
   }
   
   /**
    * 
    * @param type $contanst_array
    */
   private function setConstant( $contanst_array ) {
       self::$constant = $this->paths;
   }
   
   /**
    * Set Path as like Constant Will Return Full Path
    * Name should like Constant and full Capitalize
    * 
    * @param type $name
    * @return string
    */
   public function path( $name, $_complete_full_file_path = false ) {
       $path = $this->paths[$name] . $_complete_full_file_path;
       return $path;
   }
   
   /**
    * To Get Full path to Anywhere based on Constant
    * 
    * @param type $constant_name
    * @return type String
    */
   public static function getPath( $constant_name = false ) {
       $path = self::$constant[$constant_name];
       return $path;
   }
   
   /**
    * Getting full Plugin data. We have used __FILE__ for the main plugin file.
    * 
    * @since V 1.5
    * @return Array Returnning Array of full Plugin's data for This Woo Product Table plugin
    */
   public static function getPluginData(){
       return get_plugin_data( __FILE__ );
   }
   
   /**
    * Getting Version by this Function/Method
    * 
    * @return type static String
    */
   public static function getVersion() {
       $data = self::getPluginData();
       return $data['Version'];
   }
   
   /**
    * Getting Version by this Function/Method
    * 
    * @return type static String
    */
   public static function getName() {
       $data = self::getPluginData();
       return $data['Name'];
   }

    /**
     * Create instance
     */
    public static function getInstance() {
        if (!( self::$_instance instanceof self )) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct() {
        
        if (!is_plugin_active('woocommerce/woocommerce.php')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }
        
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }
        
        add_action(
	'plugins_loaded',
	function () {
		load_plugin_textdomain( 'wqpmb', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	});
        
        
        $dir = dirname( __FILE__ ); 
       
       /**
        * See $path_args for Set Path and set Constant
        * 
        * @since 1.0.0
        */
       $path_args = array(
           'PLUGIN_BASE_FOLDER' =>  plugin_basename( $dir ),
           'PLUGIN_BASE_FILE' =>  plugin_basename( __FILE__ ),
           'BASE_URL' =>  plugins_url() . '/'. plugin_basename( $dir ) . '/', //using plugins_url() instead of WP_PLUGIN_URL
           'BASE_DIR' =>  str_replace( '\\', '/', $dir . '/' ),
       );
       
       /**
        * Set Path Full with Constant as Array
        * 
        * @since 1.0.0
        */
       $this->setPath($path_args);

       /**
        * Set Constant
        * 
        * @since 1.0.0
        */
       $this->setConstant($path_args);
       
       
       if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
            include_once $this->path('BASE_DIR', 'includes/functions.php');
            include_once $this->path('BASE_DIR', 'includes/admin-menu.php');
            include_once $this->path('BASE_DIR', 'includes/load-scripts.php');
       }
    }

    public function admin_notice_missing_main_plugin() {
        
        if (isset($_GET['activate']))
            unset($_GET['activate']);
        
        $message = sprintf(
                esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'wqpmb'),
                '<strong>' . WQPMB_NAME . '</strong>',
                '<strong><a href="' . esc_url('https://wordpress.org/plugins/woocommerce/') . '" target="_blank">' . esc_html__('WooCommerce', 'wqpmb') . '</a></strong>'
        );

        printf('<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message);
    }
    
    public function admin_notice_minimum_php_version() {

           if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

           $message = sprintf(
                   /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
                   esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wqpmb' ),
                   '<strong>' . WQPMB_NAME . '</strong>',
                   '<strong>' . esc_html__( 'PHP', 'wqpmb' ) . '</strong>',
                    self::MINIMUM_PHP_VERSION
           );

           printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );

    }
    
    public static function defaultDatas() {
        $default_data = array(
                'on_off'    => 'on',
                'css'       => false,
                /*
                 'css'   =>  array(
                'background-color' => '#bada55',
                'border-color'  => '#bada55',
                'color'         => '#bada55',
                'border-width'  => '1px',
                'border-radious'=> '6px',
                ),
                 */
            );
        return  $default_data;
    }
    /**
     * Activation Hook for WordPress
     */
    public static function install() {
        $default_data = self::defaultDatas();
        
        $option_key = self::$option['option'];
        $css_key = self::$option['css'];
        $saved_data = get_option( $option_key );
        if( empty( $saved_data ) ){
            update_option( $option_key, $default_data);
        }
    }
    
    
    /**
     * Deactivation Hook for WordPress
     */
    public static function uninstall() {
        //Nothing for now
        return;
    }
    
    
}


/**
* Plugin Install and Uninstall
*/
register_activation_hook(__FILE__, array( 'WQPMB_Button','install' ) );
register_deactivation_hook( __FILE__, array( 'WQPMB_Button','uninstall' ) );