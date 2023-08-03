<?php
namespace WQPMB\Admin;

use WQPMB\Core\Base;

class Page_Loader extends Base
{
    public $slug = WQPMB_MENU_SLUG;
    protected $parent_slug = 'woocommerce';
    public $option_key;
    public $data;

    /**
     * Right slash already set
     *
     * @var [type]
     */
    public $html_folder_dir;

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

    }

    public function run()
    {
        var_dump($this);
        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }
    public function admin_menu()
    {
        $capability = apply_filters( 'wqpmb_menu_capability', 'manage_woocommerce' );
        add_submenu_page($this->parent_slug, WQPMB_NAME, WQPMB_MENU_NAME, $capability, $this->slug, [$this,'page_html']);
    }
    public function page_html()
    {
        $page_file = $this->html_folder_dir . 'menu-page.php';
        if(is_file($page_file)){
            include $page_file;
        }
    }
}