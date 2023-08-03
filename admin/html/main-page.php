<?php
$datas = filter_input_array(INPUT_POST);
/**
 * I have used this Action hook for saving form's data
 * when click on submit button.
 */
do_action( 'wqpmb_save_data', $datas );

$our_data = $this->data;
?>
<div class="wrap wqpmb_wrap wqpmb-content">
    <h1 class="wp-heading "></h1>
    <div class="fieldwrap">
        <form action="" method="POST">
            <div class="wqpmb-section-panel no-background wqpmb-full-form-submit-wrapper">
                
                <button name="configure_submit" type="submit"
                    class="wqpmb-btn wqpmb-has-icon configure_submit">
                    <span><i class="wqpmb_icon-floppy"></i></span>
                    <strong class="form-submit-text">
                    <?php echo esc_html__('Save Change','wqpmb');?>
                    </strong>
                </button>
            </div>

            <div class="wqpmb-section-panel button-settings" id="wqpmb-button-settings">
                <?php include 'button-settings.php'; ?>
            </div><!-- /#wqpmb-button-settings -->

            
            <div class="wqpmb-section-panel inputbox-settings" id="wqpmb-inputbox-settings">
                <?php include 'inputbox-settings.php'; ?>
            </div><!-- /#wqpmb-button-settings -->



        </form>
    </div><!-- ./fieldwrap -->
</div> <!-- ./wrap wqpmb_wrap wqpmb-content -->

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
            
            <?php
            } //End of Checkbox Row Validation
            do_action( 'wqpmb_checkbox_row', $our_data, $datas );
            
            
            $css_for_row = apply_filters( 'wqpmb_css_row_validation', true, $our_data, $datas );
            if( $css_for_row ){

            $css = isset( $our_data['css'] ) && is_array( $our_data['css'] ) ? $our_data['css'] : array();
            $css_hover = isset( $our_data['css_hover'] ) && is_array( $our_data['css_hover'] ) ? $our_data['css_hover'] : array();
            $css_input = isset( $our_data['css_input'] ) && is_array( $our_data['css_input'] ) ? $our_data['css_input'] : array();
            ?>
            
        
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