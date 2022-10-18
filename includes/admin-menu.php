<?php

if( !function_exists( 'wqpmb_plugin_actions' ) ){
    /**
     * For showing configure or add new link on plugin page
     * It was actually an individual file, now combine at 4.1.1
     * @param type $links
     * @return type
     */
    function wqpmb_plugin_actions( $actions ) {
        $links[] = '<a href="' . admin_url( 'admin.php?page=ua-quanity-plus-minus-button' ) . '" title="' . esc_attr__( 'WC Quantity Plus Minus', 'wqpmb' ) . '">' . esc_html__( 'Settings', 'wqpmb' ).'</a>';
        // $links[] = '<a href="https://wcquantity.com/wc-quantity-plus-minus-button/" title="' . esc_attr__( 'Plugin Features', 'wqpmb' ) . '" target="_blank">' . esc_html__( 'Features', 'wqpmb' ) . '</a>';
        $links[] = '<a href="https://demo.wooproducttable.com/product/beanie/" title="' . esc_attr__( 'Plugin Demo', 'wqpmb' ) . '" target="_blank">'.esc_html__( 'Demo','wqpmb' ).'</a>';
        $links[] = '<a href="https://codeastrology.com/support/" title="' . esc_attr__( 'Support', 'wqpmb' ) . '" target="_blank">'.esc_html__( 'Support','wqpmb' ).'</a>';
        return array_merge( $links, $actions );
    }
    add_filter('plugin_action_links_' . WQPMB_BASE_NAME, 'wqpmb_plugin_actions' );
}

if( !function_exists( 'wqpmb_plugin_meta' ) ){
    /**
     * For showing configure or add new link on plugin page
     * It was actually an individual file, now combine at 4.1.1
     * @param type $links
     * @return type
     */
    function wqpmb_plugin_meta( $plugin_meta, $plugin_file ) {
        
        if( $plugin_file == WQPMB_BASE_NAME ){
            // $plugin_meta[] = '<a href="https://wcquantity.com/wc-quantity-plus-minus-button/" title="' . esc_attr__( 'Plugin Features', 'wqpmb' ) . '">' . esc_html__( 'Features', 'wqpmb' ) . '</a>';
            $plugin_meta[] = '<a href="https://demo.wooproducttable.com/product/beanie/" title="' . esc_attr__( 'Plugin Demo', 'wqpmb' ) . '" target="_blank">'.esc_html__( 'Demo','wqpmb' ).'</a>';
            $plugin_meta[] = '<a href="mailto:codersaiful@gmail.com" title="' . esc_attr__( 'Mail to Developer', 'wqpmb' ) . '" target="_blank">'.esc_html__( 'Contact to Developer','wqpmb' ).'</a>';

        }
        return $plugin_meta;
    }
    add_filter('plugin_row_meta', 'wqpmb_plugin_meta',10, 2 );
}

if( !function_exists( 'wqpmb_admin_menu' ) ){
    
    /**
     * Admin menu adding under WooCommerce Menu
     * 
     * @version 1.0.0
     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/ From WordPress Codex
     */
    function wqpmb_admin_menu(){
        global $admin_page_hooks;
        $capability = apply_filters( 'wqpmb_menu_capability', 'manage_woocommerce' );
        
        if( !isset( $admin_page_hooks['ultraaddons'] ) ){
            $icon_url = WQPMB_BASE_URL . 'assets/images/icon.png';//Our Custom Icon will be add
            add_menu_page( UltraAddons, UltraAddons, 'manage_woocommerce', 'ultraaddons', '__return_true', $icon_url, 35);
        }
        
        /**
         * @todo Submenu under ultraaddons will be removed
         */
        add_submenu_page('ultraaddons', WQPMB_NAME, WQPMB_MENU_NAME, $capability, WQPMB_MENU_SLUG, 'wqpmb_menupage_content');
        add_submenu_page('woocommerce', WQPMB_NAME, WQPMB_MENU_NAME, $capability, WQPMB_MENU_SLUG, 'wqpmb_menupage_content');
        remove_submenu_page( 'ultraaddons', 'ultraaddons' );
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
        wqpmb_enable_quantity_button();
    }
}

if( !function_exists( 'wqpmb_enable_quantity_button' ) ){
    
    /**
     * Enable site wide quantity button
     * 
     * @version 1.0.0
     */
    function wqpmb_enable_quantity_button(){
        
        $datas = filter_input_array(INPUT_POST);
        do_action( 'wqpmb_save_data', $datas );
        
        $option_key = WQPMB_Button::$option['option'];
        $our_data = get_option( $option_key);
        ?>
<div class="wqpmb wqpmb-wrapper ultraaddons ultraaddons-wrapper">

    <h1 class="wp-heading-inline ca-main-header-title"><?php echo esc_html( WQPMB_NAME ); ?></h1>
    <div class="wqpmb-fields-wrapper">
        <form action="" method="POST">
            <?php
            $wqpmb_forms_validation = apply_filters( 'wqpmb_default_form_panel_validation', true, $our_data, $datas );
            if( $wqpmb_forms_validation ){
            ?>
            <div class="section ultraaddons-panel">
                <h2 class="with-background light-background ca-branding-header">Quantity Button Settings</h2>
                <table class="ultraaddons-table">
                    <?php
                    /**
                     * @Hook Filter: wqpmb_checkbox_row_validation
                     * To set validation for Quantity Button On/Off Checkbox
                     * @return bool Need true for enable/ otherwise false to disable
                     */
                    $checkbox_for_row = apply_filters( 'wqpmb_checkbox_row_validation', true, $our_data, $datas );
                    if( $checkbox_for_row ){
                    ?>
                    <tr>
                        <th><label for="wqpmb-enable-quantity-button">Enable Quantity Button</label></th>
                        <td>
                            <?php
                            $checkbox = isset( $our_data['on_off'] ) ? 'checked' : '';
                            ?>
                            <label class="switch">
                                <input  name="on_off" type="checkbox" id="wqpmb-enable-quantity-button" <?php echo esc_attr( $checkbox ); ?>>
                                <div class="slider round"><!--ADDED HTML -->
                                    <span class="on">ON</span><span class="off">OFF</span><!--END-->
                                </div>
                            </label>
                            
                        </td>
                    </tr>
                    
                    <?php
                    } //End of Checkbox Row Validation
                    do_action( 'wqpmb_checkbox_row', $our_data, $datas );
                    
                    
                    $css_for_row = apply_filters( 'wqpmb_css_row_validation', true, $our_data, $datas );
                    if( $css_for_row ){

                    $css = isset( $our_data['css'] ) && is_array( $our_data['css'] ) ? $our_data['css'] : array();
                    ?>
                    <tr>
                        <th><label for="wqpmb-btn-bg-color">Button Background Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-bg-color" name="css[background-color]" 
                                   value="<?php echo isset( $css['background-color'] ) ? $css['background-color'] : '' ?>" 
                                   class="ua_color_picker" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="wqpmb-btn-border-color">Button Border Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-border-color" name="css[border-color]" 
                                   value="<?php echo isset( $css['border-color'] ) ? $css['border-color'] : '' ?>" 
                                   class="ua_color_picker" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="wqpmb-btn-font-color">Button Font Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-font-color" name="css[color]" 
                                   value="<?php echo isset( $css['color'] ) ? $css['color'] : '' ?>" 
                                   class="ua_color_picker" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="">Border Width</label></th>
                        <td>
                            <input type="text" id="" name="css[border-width]" 
                                   value="<?php echo isset( $css['border-width'] ) ? $css['border-width'] : '' ?>" 
                                   placeholder="eg: 1px"
                                   class="ua_input" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="">Border Radius</label></th>
                        <td>
                            <input type="text" id="" name="css[border-radius]" 
                                   value="<?php echo isset( $css['border-radius'] ) ? $css['border-radius'] : '' ?>" 
                                   placeholder="eg: 4px"
                                   class="ua_input" />
                        </td>
                    </tr>
                    
                    <?php                     
                    } //End of CSS Row Validation
                    
                    /**
                     * @Hook Action: wqpmb_css_row
                     * To add New CSS row, use following @Hook 
                     */
                    do_action( 'wqpmb_css_row' );
                    
                    /**
                     * @Hook Action: wqpmb_form_row
                     * To add New any Row, use following Hook
                     */
                    do_action( 'wqpmb_form_row' );
                    ?>
                </table>
                
            </div>
            <?php
            } //End of Default Form Validation
            /**
             * To add New Form Panel, We will use this Action
             */
            do_action( 'wqpmb_form_panel', $our_data, $datas );
            ?>
            <div class="section ultraaddons-button-wrapper ultraaddons-panel no-background wqpmb-wubmit-button">
                <button name="configure_submit" class="button-primary button-primary primary button">Save Change</button>
                <button name="reset_button" class="button button-default" onclick="return confirm('If you continue with this action, you will reset all options in this page.\nAre you sure?');">Reset Default</button>
            </div>
        </form>
        <div class="wqpmb-after-form">
            <?php do_action( 'wqpmb_after_form' ); ?>
        </div>
        <?php wqpmb_social_links(); ?>
    </div>
</div>
<?php
    }
}

if( !function_exists( 'wqpmb_tawkto_code_header' ) ){
    /**
     * set class for Admin Body tag
     * 
     * @param type $classes
     * @return String
     */
    function wqpmb_tawkto_code_header( $class_string ){
        global $current_screen;
        $s_id = isset( $current_screen->id ) ? $current_screen->id : '';

        if( strpos( $s_id, 'quanity-plus-minus-button') !== false ){
        ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/628f5d4f7b967b1179915ad7/1g4009033';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->      
        <?php
        }
        
    }
}
add_filter( 'admin_head', 'wqpmb_tawkto_code_header', 999 );

function wqpmb_social_links(){
?>
<div class="codeastrogy-social-area-wrapper">
    <?php
    $img_folder = WQPMB_BASE_URL . 'assets/images/social/';
    $codeastrology = [
        'web'   => ['url' => 'https://codeastrology.com/?utm=Plugin_Social', 'title' => 'CodeAstrology'],
        'wpt'   => ['url' => 'https://wooproducttable.com/?utm=Plugin_Social', 'title' => 'Woo Product Table'],
        'min-max'   => ['url' => 'https://codeastrology.com/min-max-quantity/?utm=Plugin_Social', 'title' => 'CodeAstrology Min Max Step'],
        'linkedin'   => ['url' => 'https://www.linkedin.com/company/codeastrology'],
        'youtube'   => ['url' => 'https://www.youtube.com/c/codeastrology'],
        'facebook'   => ['url' => 'https://www.facebook.com/codeAstrology'],
        'twitter'   => ['url' => 'https://www.twitter.com/codeAstrology'],
        'skype'   => ['url' => '#codersaiful', 'title' => 'codersaiful'],
    ];
    foreach($codeastrology as $key=>$cLogy){
        $image_name = $key . '.png';
        $image_file = $img_folder . $image_name;
        $url = $cLogy['url'] ?? '#';
        $title = $cLogy['title'] ?? false;
        $alt = ! empty( $title ) ? $title : $key;
        $title_available = ! empty( $title ) ? 'title-available' : '';
        
    ?>
    <a class="ca-social-link ca-social-<?php echo esc_attr( $key ); ?> ca-<?php echo esc_attr( $title_available ); ?>" href="<?php echo esc_url( $url ); ?>" target="_blank">
        <img src="<?php echo esc_url( $image_file ); ?>" alt="<?php echo esc_attr( $alt ); ?>"> 
        <span><?php echo esc_html( $title ); ?></span>
    </a>
    <?php 
        

    }
    ?>
    <!-- css code at assets/css/admin-style.css file -->
</div>

<?php
}