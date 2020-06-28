<?php


        

if( !function_exists( 'wcqbtn_locate_template' ) ){
    /**
     * Template selection for Qty Button
     * 
     * @global type $woocommerce
     * @return type Template
     */
    function wcqbtn_locate_template(){
        $show_on_product_page = apply_filters( 'show_on_product_page', true );
        $show_on_cart_page    = apply_filters( 'show_on_cart_page', true );

        if ( false === $show_on_product_page && is_product() ) {
                return $template;
        }

        if ( false === $show_on_cart_page && is_cart() ) {
                return $template;
        }

        global $woocommerce;

        $_template     = $template;

        $plugin_path   = untrailingslashit( WQPMB_Button::getPath('BASE_DIR') ) . '/template/';
        $template_path = ( ! $template_path ) ? $woocommerce->template_url : null;
        $template      = locate_template( array( $template_path . $template_name, $template_name ) );

        if ( ! $template && file_exists( $plugin_path . $template_name ) ) {
                $template = $plugin_path . $template_name;
        }

        if ( ! $template ) {
                $template = $_template;
        }

        return $template;
    }
    add_filter( 'woocommerce_locate_template', 'wcqbtn_locate_template',1,3 );
}

if( !function_exists( 'wcqbtn_admin_body_class' ) ){
    /**
     * set class for Admin Body tag
     * 
     * @param type $classes
     * @return String
     */
    function wcqbtn_admin_body_class(){
        return 'ultraaddons';
    }
    add_filter( 'admin_body_class', 'wcqbtn_admin_body_class' );
}
