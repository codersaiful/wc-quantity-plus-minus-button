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
        return ' ultraaddons ';
    }
    add_filter( 'admin_body_class', 'wcqbtn_admin_body_class' );
}


if( !function_exists( 'wcqbtn_submit_form' ) ){
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
            $selector = apply_filters( 'wqpmb_default_css_selector', '.wqpmb_abbs', $datas  );
            if( isset( $datas['data']['css'] ) && is_array( $datas['data']['css'] ) ){
                $style = "\n";
                foreach( $datas['data']['css'] as $property=>$value ){
                    
                    $style .= !is_array( $value ) ? $property . ': ' . $value . ";\n" : '';
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

