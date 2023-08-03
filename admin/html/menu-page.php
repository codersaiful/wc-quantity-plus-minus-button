<?php
$datas = filter_input_array(INPUT_POST);
/**
 * I have used this Action hook for saving form's data
 * when click on submit button.
 */
do_action( 'wqpmb_save_data', $datas );

$our_data = $this->data;
?>
<div class="wqpmb wqpmb-wrapper ultraaddons ultraaddons-wrapper">

<h1 class="wp-heading-inline ca-main-header-title"><?php echo esc_html( WQPMB_NAME ); ?></h1>
<?php
wqpmb_social_links(); 
?>
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
            $css_hover = isset( $our_data['css_hover'] ) && is_array( $our_data['css_hover'] ) ? $our_data['css_hover'] : array();
            $css_input = isset( $our_data['css_input'] ) && is_array( $our_data['css_input'] ) ? $our_data['css_input'] : array();
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
            
            <tr class="wqpmb-title-row">
                <th colspan="2"><h3>Button Hover Color</h3></th>
            </tr>
            <tr>
                <th><label for="wqpmb-btn-bg-color-hover">Button Background Color Hover</label></th>
                <td>
                    <input type="text" id="wqpmb-btn-bg-color-hover" name="css_hover[background-color]" 
                           value="<?php echo isset( $css_hover['background-color'] ) ? $css_hover['background-color'] : '' ?>" 
                           class="ua_color_picker" />
                </td>
            </tr>
            <tr>
                <th><label for="wqpmb-btn-border-colorcss_hover">Button Border Color Hover</label></th>
                <td>
                    <input type="text" id="wqpmb-btn-border-colorcss_hover" name="css_hover[border-color]" 
                           value="<?php echo isset( $css_hover['border-color'] ) ? $css_hover['border-color'] : '' ?>" 
                           class="ua_color_picker" />
                </td>
            </tr>
            <tr>
                <th><label for="wqpmb-btn-font-colorcss_hover">Button Font Color Hover</label></th>
                <td>
                    <input type="text" id="wqpmb-btn-font-colorcss_hover" name="css_hover[color]" 
                           value="<?php echo isset( $css_hover['color'] ) ? $css_hover['color'] : '' ?>" 
                           class="ua_color_picker" />
                </td>
            </tr>
            <tr class="wqpmb-title-row">
                <th colspan="2"><h3>Button Border Style</h3></th>
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

            
            <tr class="wqpmb-title-row">
                <th colspan="2"><h3>Input Box Style</h3></th>
            </tr>
            <tr>
                <th><label for="wqpmb-btn-bg-color-input">Input Box Background Color</label></th>
                <td>
                    <input type="text" id="wqpmb-btn-bg-color-input" name="css_input[background-color]" 
                           value="<?php echo isset( $css_input['background-color'] ) ? $css_input['background-color'] : '' ?>" 
                           class="ua_color_picker" />
                </td>
            </tr>
            <tr>
                <th><label for="wqpmb-btn-border-color-input">Input Box Border Color</label></th>
                <td>
                    <input type="text" id="wqpmb-btn-border-color-input" name="css_input[border-color]" 
                           value="<?php echo isset( $css_input['border-color'] ) ? $css_input['border-color'] : '' ?>" 
                           class="ua_color_picker" />
                </td>
            </tr>
            <tr>
                <th><label for="wqpmb-btn-font-color-input">Input Box Font Color</label></th>
                <td>
                    <input type="text" id="wqpmb-btn-font-color-input" name="css_input[color]" 
                           value="<?php echo isset( $css_input['color'] ) ? $css_input['color'] : '' ?>" 
                           class="ua_color_picker" />
                </td>
            </tr>
            <?php                     
            } //End of CSS Row Validation
            
            /**
             * @Hook Action: wqpmb_css_row
             * To add New CSS row, use following @Hook 
             */
            do_action( 'wqpmb_css_row' );
            ?>
        </table>
        
     </div>
    <div class="section ultraaddons-panel">
        <h2 class="with-background light-background ca-branding-header">Configuration and Other Setting</h2>
        <table class="ultraaddons-table">
            <tr>
                <th><label for="wqpmb-enable-quantity-archive">Quantiy box in Archive</label></th>
                <td>
                    <?php
                    $checkbox = isset( $our_data['quantiy_box_archive'] ) ? 'checked' : '';
                    ?>
                    <label class="switch">
                        <input  name="quantiy_box_archive" type="checkbox" id="wqpmb-enable-quantity-archive" <?php echo esc_attr( $checkbox ); ?>>
                        <div class="slider round"><!--ADDED HTML -->
                            <span class="on">ON</span><span class="off">OFF</span><!--END-->
                        </div>
                    </label>
                    
                </td>
            </tr>
            <?php 
            $available_pro = apply_filters( 'wqpmb_available_pro', false );
            if( ! $available_pro ){ ?>
            <tr class="wqpmb_offer_row_pro">
                <th>Offer</th>
                <td>
                    <div class="wqpmb_offer_area_for_pro">
                    <p>If you want <b>Quick Cart</b> Feature and <b>Quantity box in Archive for Variable</b> product.</p>
                    <p>NEED PREMIUM VERSION</p>
                    <p>Purchase <a href="https://codeastrology.com/downloads/quick-cart-and-plus-minus/?campain=PlusMinuPlugin">Quick Cart and Plus Minus Button Everywhere</a> Plugin in low Price.</p>
                    </div>
                </td>
            </tr>
            <?php } ?>
            <?php 
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

    
    <a class="sort-time-offer-wqpmb" href="https://codeastrology.com/coupons/" target="_blank">
            
    <?php
    $time = time();
    $tar_time = strtotime('11/25/2022');
    if($time < $tar_time){
    $img = WQPMB_BASE_URL . 'assets/images/offer/black-friday-notice.png';
    ?>
        <img src="<?php echo esc_attr( $img ); ?>" style="max-width: 100%;height:auto;width:auto;">
    <?php } ?>
        <span>CodeAstrology All Products OFFER</span>click Here
    </a>
        
</form>
<div class="wqpmb-after-form">
    <?php do_action( 'wqpmb_after_form' ); ?>
</div>
<?php 
    wqpmb_social_links();
    wqpmb_submit_issue_link();
?>
</div>
</div>