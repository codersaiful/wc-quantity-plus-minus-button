<?php
if( !function_exists( 'wqpmb_admin_menu' ) ){
    
    /**
     * Admin menu adding under WooCommerce Menu
     * 
     * @version 1.0.0
     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/ From WordPress Codex
     */
    function wqpmb_admin_menu(){
        add_submenu_page('woocommerce', WQPMB_NAME, __( '(+-) Plus Minus button', 'wqpmb' ), 'manage_woocommerce', 'wqpmb-settings', 'wqpmb_menupage_content');
        //add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
    }
    add_action( 'admin_menu', 'wqpmb_admin_menu' );
}


if( !function_exists( 'wqpmb_menupage_content' ) ){
    
    /**
     * Page Content to show in Dashboard
     * 
     * @version 1.0.0
     */
    function wqpmb_menupage_content(){
        echo "<h1>";
        echo WQPMB_NAME;
        echo "</h1>";
    }
}
