<?php

/**
 * JS and Style file add for FrontEnd Section. 
 * 
 * @since 1.0.0
 */
function wqpmb_style_js_adding(){
    wp_enqueue_style( 'wqpmb-style', WQPMB_Button::getPath('BASE_URL') . 'assets/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'wqpmb-script', WQPMB_Button::getPath('BASE_URL') . 'assets/js/scripts.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wqpmb_style_js_adding', 99 );

add_action( 'admin_enqueue_scripts', 'wqpmb_admin_script_loader' );
function wqpmb_admin_script_loader( $hook_suffix ) {
    /**
     * Including UltraAddons CSS form Style
     */
    wp_enqueue_style( 'ultraaddons-css', WQPMB_Button::getPath('BASE_URL') . 'assets/css/admin-common.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('ultraaddons-css');
    
    wp_enqueue_style( $hook_suffix, WQPMB_Button::getPath('BASE_URL') . 'assets/css/admin-style.css', array(), '1.0.0', 'all' );
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( $hook_suffix, WQPMB_Button::getPath('BASE_URL') .'assets/js/admin-script.js', array( 'wp-color-picker' ), false, true );
}