<?php
$datas = filter_input_array(INPUT_POST);
/**
 * I have used this Action hook for saving form's data
 * when click on submit button.
 */
do_action( 'wqpmb_save_data', $datas );
$this->data = get_option( $this->option_key);
$our_data = $this->data;

?>
<div class="wrap wqpmb_wrap wqpmb-content">
    <h1 class="wp-heading "></h1>
    <div class="fieldwrap">

    <?php
        $randN = rand(1,2);
        $recomm = get_option($this->plugin_prefix . '_recomm', 1);
        $recomm++;
        update_option($this->plugin_prefix . '_recomm', $recomm);
        if($recomm <= 30 && $randN == 1){
        ?>
        <div id="wqpmb-recomendation-area" class="wqpmb-section-panel">
            <?php 
            //do_action( 'wqpmb_plugin_recommend_top' );
            do_action( $this->plugin_prefix . '_plugin_recommend_top' ); 
            ?>
        </div>
        <?php } ?>

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
                <?php
                include 'button-settings.php'; 
                do_action( 'wqpmb_form_button_settings_bottom', $our_data, $datas );
                ?>
            </div><!-- /#wqpmb-button-settings -->

            
            <div class="wqpmb-section-panel inputbox-settings" id="wqpmb-inputbox-settings">
                <?php 
                include 'inputbox-settings.php';
                do_action( 'wqpmb_form_inputbox_settings_bottom', $our_data, $datas );
                ?>
            </div><!-- /#wqpmb-button-settings -->
            <?php
            //It's old action hook
            do_action( 'wqpmb_form_panel', $our_data, $datas );

            //New action hook for form
            do_action( 'wqpmb_form_bottom', $our_data, $datas );
            ?>

            <div class="wqpmb-section-panel live-support" id="wqpmb-live-support-area">
                <?php include 'live-support.php'; ?>
            </div>
            <div class="wqpmb-section-panel no-background wqpmb-full-form-submit-wrapper">
                
                <button name="configure_submit" type="submit"
                    class="wqpmb-btn wqpmb-has-icon configure_submit">
                    <span><i class="wqpmb_icon-floppy"></i></span>
                    <strong class="form-submit-text">
                    <?php echo esc_html__('Save Change','wqpmb');?>
                    </strong>
                </button>
                <button name="reset_button" 
                    class="wqpmb-btn reset wqpmb-has-icon reset_button"
                    onclick="return confirm('If you continue with this action, you will reset all options in this page.\nAre you sure?');">
                    <span><i class="wqpmb_icon-arrows-cw "></i></span>
                    <?php echo esc_html__( 'Reset Settings', 'wqpmb' ); ?>
                </button>
                
            </div>

        </form>
        <div class="wqpmb-section-panel wqpmb-bottom-area wqpmb-recomendation-area" id="wqpmb-recomendation-area">
            <table class="wqpmb-table universal-setting">
                <thead>
                    <tr>
                        <th class="wqpmb-inside">
                            <div class="wqpmb-table-header-inside">
                                <h3><?php echo esc_html__('Recommendation Area', 'wpt'); ?> <small class="wqpmb-small-title">To increase Sale</small></h3>
                            </div>

                        </th>
                        <th>
                            <div class="wqpmb-table-header-right-side"></div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                <tr>
                    <td>
                        <div class="wqpmb-form-control">
                            <div class="form-label col-lg-12">
                            <?php do_action( 'wqpmb_plugin_recommend_here' ); ?>
                            </div>
                            <div class="form-label col-lg-12">
                                <?php wqpmb_submit_issue_link(); ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wqpmb-form-info">
                            
                            <?php wqpmb_social_links(); ?>
                            <p>Highly Recommeded these plugin. Which will help you to increase your WooCommerce sale.</p>
                        </div> 
                    </td>
                </tr>
                </tbody>
            </table>

        </div> <!--/.wqpmb-recomendation-area -->
    </div><!-- ./fieldwrap -->
</div> <!-- ./wrap wqpmb_wrap wqpmb-content -->