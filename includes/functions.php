<?php

if( !function_exists( 'wqpmb_locate_template' ) ){
    /**
     * Template selection for Quantity Button
     * 
     * @global type $woocommerce
     * @return type Template
     */
    function wqpmb_locate_template( $template, $template_name, $template_path ){
        $option_key = WQPMB_Button::$option['option'];
        $datas = get_option( $option_key, false );
		
        
        $validation = isset( $datas['on_off'] ) && $datas['on_off'] == 'on' ? true : false;
        
        /**
         * @Hook Filter: wqpmb_show_validation
         * To set any validation, Based on your saved data
         * use following Filter Hook.
         * @return bool Need True false Validation
         */
        $validation = apply_filters( 'wqpmb_show_validation', $validation, $datas );
        
        if ( false === $validation ) {
                return $template;
        }
        
        $show_on_product_page       = apply_filters( 'wqpmb_on_product_page', true );
        $show_on_cart_page          = apply_filters( 'wqpmb_on_cart_page', true );
        $show_on_mini_cart_page     = apply_filters( 'wqpmb_on_mini_cart_page', true );
        $emplate_on_off             = apply_filters( 'wqpmb_template_on_off', true, $template, $template_name, $template_path );

        //Assaign Template or changing template based on $template, $template_name, $template_path, If needed
        $template                   = apply_filters( 'wqpmb_template', $template, $template_name, $template_path );

        //To set condition based on current template name, temp path etc,
        if ( false === $emplate_on_off ) {
        return $template;
        }

        if ( false === $show_on_product_page && is_product() ) {
                return $template;
        }

        if ( false === $show_on_cart_page && is_cart() ) {
                return $template;
        }
        
        if ( false === $show_on_mini_cart_page && 'cart/mini-cart.php' == $template_name ) {
                return $template;
        }

        global $woocommerce;

        $_template     = $template;
        
        $template_base_dir = untrailingslashit( WQPMB_Button::getPath('BASE_DIR') ) . '/template/';
        
        /**
         * @Hook Filter: wqpmb_template_base_dir
         * To Change Template Base Directory, Use following Hook
         * In that directory, template files folder will be locate
         * @return string Need a String of your templates folder directory. default is: this_plugin_dir/templates/
         */
        $template_base_dir = apply_filters( 'wqpmb_template_base_dir', $template_base_dir, $datas, $template, $template_name, $template_path );
        $plugin_path   = $template_base_dir;
        $template_path = ( ! $template_path ) ? $woocommerce->template_url : null;
        
        /**
         * @Hook Filter: wqpmb_template_name
         * To change Default Template Name, use following Hook
         * Currently default template name is: global/quantity-input.php
         * By this Filter, you able to change that template name. default is: global/quantity-input.php
         */
        $template_name = apply_filters( 'wqpmb_template_name', $template_name, $datas, $template, $template_path );
        
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
     * 
     * Fully fixed
     * @author Saiful Islam <codersaiful@gmail.com>
     * Fixed by Saiful at V1.1.0.0
     */
    function wqpmb_admin_body_class( $class ){
        global $current_screen;
        if( isset( $current_screen->id ) && $current_screen->id == 'ultraaddons_page_' . WQPMB_MENU_SLUG ){
            if( is_array( $class ) ){
                $class[] = 'ultraaddons';
                $class[] = WQPMB_MENU_SLUG;
                return $class;
            }
            return  ' ultraaddons ' . WQPMB_MENU_SLUG . ' ';
        }
        return $class;
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
        $option_key = WQPMB_Button::$option['option'];
        $css_key = WQPMB_Button::$option['css'];
        if( NULL !== filter_input( INPUT_POST, 'configure_submit' ) && !empty( $datas ) ){
            /**
             * @Hook Filter: wqpmb_data_on_save
             * Populate data where data will save and pass data condition
             * 
             * @return Array When submit form, user able to modify by this filter
             */
            $datas = apply_filters( 'wqpmb_data_on_save', $datas );
            update_option( $option_key, $datas );
            
            $selector = WQPMB_Button::$css_selector;
            /**
             * @Hook Filter: wqpmb_default_css_selector
             * to change selector of css selector, Currently set for qty button and input box
             * @return String 
             */
            $selector = apply_filters( 'wqpmb_default_css_selector', $selector, $datas  );
            if( isset( $datas['css'] ) && is_array( $datas['css'] ) ){
                $style = "\n";
                foreach( $datas['css'] as $property => $value ){
                    
                    $style .= !empty( $value ) && !is_array( $value ) ? $property . ': ' . $value . ";\n" : '';
                }
                $css = $selector . "{" . $style . "}";
                $css = apply_filters( 'wqpmb_css_on_save', $css, $datas );
                update_option( $css_key, $css);
            }
        }
        if( NULL !== filter_input( INPUT_POST, 'reset_button' ) ){
            $default_data = WQPMB_Button::defaultDatas();
            
            $r_data = apply_filters( 'wqpmb_data_on_reset', $default_data, $datas );
            update_option( $option_key , $r_data);
            
            $css = apply_filters( 'wqpmb_css_on_reset', false, $datas );
            update_option( $css_key, $css);
        }
    }
    add_filter( 'wqpmb_save_data', 'wqpmb_form_submit' );
}

if( !function_exists( 'wqpmb_button_off_in_minicart' ) ){
    
    /**
     * Disable our qty button from other place where global $product is not available
     *
     * @param bool $bool
     * @return bool
     */
    function wqpmb_button_off_in_minicart( $bool ){
        global $product;
        if(is_null($product)) return false;
        return $bool;
    }
    //add_filter( 'wqpmb_template_on_off', 'wqpmb_button_off_in_minicart' ); //currently disable
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
        $css_key = WQPMB_Button::$option['css'];
        $css = get_option( $css_key );
        if( !empty( $css ) && is_string( $css ) ){
            $style .= "<style type='text/css' id='wqpmb_internal_css'>";
            $style .= $css;
            $style .= "</style>";
        }
        
        echo $style;
    }
    add_filter( 'wp_head', 'wqpmb_header_css' );
}
