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
        
        $our_data = get_option( 'wqpmb_configs');
        var_dump($our_data);

        ?>
<div class="wqpmb wqpmb-wrapper ultraaddons ultraaddons-wrapper">
    
    
    
    

    
    
    
    
    
    <h1 class="wp-heading-inline"></h1>
    <div class="wqpmb-fields-wrapper">
        <form action="" method="POST">
            
            <div class="section ultraaddons-panel">
                <h2 class="with-background"><?php echo WQPMB_NAME; ?></h2>
                <table class="ultraaddons-table">
                    <tr>
                        <th><label for="wqpmb-enable-quantity-button">Enable Quantity Button</label></th>
                        <td>
                            <?php
                            $checkbox = isset( $our_data['data']['on_off'] ) ? 'checked' : '';
                            ?>
                            <label class="switch">
                                <input  name="data[on_off]" type="checkbox" id="wqpmb-enable-quantity-button" <?php echo esc_attr( $checkbox ); ?>>
                                <div class="slider round"><!--ADDED HTML -->
                                    <span class="on">ON</span><span class="off">OFF</span><!--END-->
                                </div>
                            </label>
                            
                        </td>
                    </tr>
                    
                    <?php
                    $css = isset( $our_data['data']['css'] ) && is_array( $our_data['data']['css'] ) ? $our_data['data']['css'] : array();
                    ?>
                    <tr>
                        <th><label for="wqpmb-btn-bg-color">Button Background Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-bg-color" name="data[css][background-color]" 
                                   value="<?php echo isset( $css['background-color'] ) ? $css['background-color'] : '' ?>" 
                                   class="ua_color_picker" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="wqpmb-btn-border-color">Button Border Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-border-color" name="data[css][border-color]" 
                                   value="<?php echo isset( $css['border-color'] ) ? $css['border-color'] : '' ?>" 
                                   class="ua_color_picker" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="wqpmb-btn-font-color">Button Font Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-font-color" name="data[css][color]" 
                                   value="<?php echo isset( $css['color'] ) ? $css['color'] : '' ?>" 
                                   class="ua_color_picker" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="">Border Width</label></th>
                        <td>
                            <input type="text" id="" name="data[css][border-width]" 
                                   value="<?php echo isset( $css['border-width'] ) ? $css['border-width'] : '1px' ?>" 
                                   class="ua_input" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="">Border Radious</label></th>
                        <td>
                            <input type="text" id="" name="data[css][border-radious]" 
                                   value="<?php echo isset( $css['border-radious'] ) ? $css['border-radious'] : 'unset' ?>" 
                                   class="ua_input" />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="section ultraaddons-button-wrapper ultraaddons-panel no-background">
                <button name="configure_submit" class=".button-primary button-primary primary button">Save Change</button>
                <button name="reset_button" class="button button-default" onclick="return confirm('If you continue with this action, you will reset all options in this page.\nAre you sure?');">Reset Default</button>
            </div>
        </form>
    </div>
</div>
<?php
    }
}
