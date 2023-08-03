<?php
namespace WQPMB\Admin;

use WQPMB\Core\Base;

class Page_Loader extends Base
{
    public $slug = WQPMB_MENU_SLUG;

    public function __construct()
    {
        var_dump($this);
    }

    public function run()
    {
        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }
    public function admin_menu()
    {
        $capability = apply_filters( 'wqpmb_menu_capability', 'manage_woocommerce' );
        add_submenu_page('woocommerce', WQPMB_NAME, WQPMB_MENU_NAME, $capability, WQPMB_MENU_SLUG, 'wqpmb_menupage_content');
    }
}