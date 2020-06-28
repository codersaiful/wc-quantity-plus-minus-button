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
        
        $arr = filter_input_array(INPUT_POST);
        echo '<pre>';
        var_dump($arr);
        var_dump(filter_input(INPUT_POST, 'wqpmb-enable-quantity-button'));
        echo '</pre>';
        
        if(NULL !== filter_input(INPUT_POST, 'configure_submit')){
            echo 'true';
        }
        ?>
<div class="wqpmb wqpmb-wrapper">
    <h1 class="wp-heading-inline"><?php echo WQPMB_NAME; ?></h1>
    <div class="wqpmb-fields-wrapper">
        <form action="" method="POST">
            <div class="section section-background">
                <table>
                    <tr>
                        <th><label for="wqpmb-enable-quantity-button">Enable/Disable Quantity Button</label></th>
                        <td><input type="checkbox" name="wqpmb-enable-quantity-button" id="wqpmb-enable-quantity-button" /></td>
                    </tr>
                </table>
            </div>
            <div class="section section-button-cunsomize">
                <table>
                    <tr>
                        <th><label for="wqpmb-btn-bg-color">Button Background Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-bg-color" name="wqpmb-btn-bg-color" value="#bada55" class="autocircle-color-field" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="wqpmb-btn-border-color">Button Border Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-border-color" name="wqpmb-btn-border-color" value="#bada55" class="autocircle-color-field" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="wqpmb-btn-font-color">Button Font Color</label></th>
                        <td>
                            <input type="text" id="wqpmb-btn-font-color" name="wqpmb-btn-font-color" value="#bada55" class="autocircle-color-field" />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="section section-background">
                <button name="configure_submit" class="button-primary primary button btn-info">Submit</button>
                <button name="reset_button" class="button">Reset</button>
            </div>
        </form>
    </div>
</div>
<?php
    }
}
