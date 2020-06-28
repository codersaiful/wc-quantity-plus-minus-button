<?php


        

if( !function_exists( 'wqpmb_locate_template' ) ){
    /**
     * Template selection for Qty Button
     * 
     * @global type $woocommerce
     * @return type Template
     */
    function wqpmb_locate_template( $template, $template_name, $template_path ){
        $datas = get_option( 'wqpmb_configs', false );
        
        $validation = isset( $datas['data']['on_off'] ) && $datas['data']['on_off'] == 'on' ? true : false;
        
        $validation = apply_filters( 'wqpmb_show_validation', $validation, $datas );
        if ( false === $validation ) {
                return $template;
        }
        
        $show_on_product_page = apply_filters( 'wqpmb_on_product_page', true );
        $show_on_cart_page    = apply_filters( 'wqpmb_on_cart_page', true );

        if ( false === $show_on_product_page && is_product() ) {
                return $template;
        }

        if ( false === $show_on_cart_page && is_cart() ) {
                return $template;
        }

        global $woocommerce;

        $_template     = $template;
        
        $template_base_dir = untrailingslashit( WQPMB_Button::getPath('BASE_DIR') ) . '/template/';
        
        /**
         * To Change Templae Base Directory, Use following Hook
         * In that directory, template files folder will be locate
         * 
         */
        $template_base_dir = apply_filters( 'wqpmb_template_base_dir', $template_base_dir, $datas, $template, $template_name, $template_path );
        $plugin_path   = $template_base_dir;
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
    add_filter( 'woocommerce_locate_template', 'wqpmb_locate_template',1,3 );
}

if( !function_exists( 'wqpmb_admin_body_class' ) ){
    /**
     * set class for Admin Body tag
     * 
     * @param type $classes
     * @return String
     */
    function wqpmb_admin_body_class(){
        return ' ultraaddons ';
    }
    add_filter( 'admin_body_class', 'wqpmb_admin_body_class' );
}


if( !function_exists( 'wqpmb_submit_form' ) ){
    /**
     * Form Submit based on Action Hook
     * 
     * @param type $classes
     * @return Void
     */
    function wqpmb_form_submit( $datas ){
        
        if( NULL !== filter_input( INPUT_POST, 'configure_submit' ) && !empty( $datas ) ){
            $datas = apply_filters( 'wqpmb_data_on_save', $datas );
            update_option( 'wqpmb_configs', $datas );
            //For Button CSS Style
            $selector = apply_filters( 'wqpmb_default_css_selector', '.qib-button-wrapper button.qib-button,.qib-button-wrapper .quantity input.input-text.qty.text', $datas  );
            if( isset( $datas['data']['css'] ) && is_array( $datas['data']['css'] ) ){
                $style = "\n";
                foreach( $datas['data']['css'] as $property=>$value ){
                    
                    $style .= !empty( $value ) && !is_array( $value ) ? $property . ': ' . $value . ";\n" : '';
                }
                $css = $selector . "{" . $style . "}";
                $css = apply_filters( 'wqpmb_css_on_save', $css, $datas );
                update_option( 'wqpmb_css', $css);
            }
        }
        if( NULL !== filter_input( INPUT_POST, 'reset_button' ) ){
            $default_data['data']['on_off'] = 'on';
            $default_data['data']['css'] = false;
            /*
            array(
            'background-color' => '#bada55',
            'border-color'  => '#bada55',
            'color'         => '#bada55',
            'border-width'  => '1px',
            'border-radious'=> '6px',
            )
            */
            
            $r_data = apply_filters( 'wqpmb_data_on_reset', $default_data, $datas );
            update_option( 'wqpmb_configs' , $r_data);
            
            $css = apply_filters( 'wqpmb_css_on_reset', '', $datas );
            update_option( 'wqpmb_css', $css);
        }
    }
    add_filter( 'wqpmb_save_data', 'wqpmb_form_submit' );
}

if( !function_exists( 'wqpmb_header_css' ) ){
    /**
     * set class for Admin Body tag
     * 
     * @param type $classes
     * @return String
     */
    function wqpmb_header_css(){
        $style = false;
        $css = get_option( 'wqpmb_css' );
        if( !empty( $css ) && is_string( $css ) ){
            $style .= "<style type='text/css' id='wqpmb_internal_css'>";
            $style .= $css;
            $style .= "</style>";
        }
        
        echo $style;
    }
    add_filter( 'wp_head', 'wqpmb_header_css' );
}
