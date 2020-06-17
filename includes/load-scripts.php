<?php

/**
 * JS and Style file add for FrontEnd Section. 
 * 
 * @since 1.0.0
 */
function wcqbtn_style_js_adding(){
    wp_enqueue_style( 'wqpmb-style', WQPMB_Button::getPath('BASE_URL') . 'assets/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'wqpmb-script', WQPMB_Button::getPath('BASE_URL') . 'assets/js/scripts.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wcqbtn_style_js_adding', 99 );
