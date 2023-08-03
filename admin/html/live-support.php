<?php
$extra_info = $our_data['extra'] ?? [];
?>
<table class="wqpmb-table universal-setting">
    <thead>
        <tr>
            <th class="wqpmb-inside">
                <div class="wqpmb-table-header-inside">
                    <h3><?php echo esc_html__( 'Support & Tracker', 'wqpmb' ); ?></h3>
                </div>
                
            </th>
            <th>
            <div class="wqpmb-table-header-right-side"></div>
                <p class="live-support">Customer live support system - on or off.</p>
            </th>
        </tr>
    </thead>

    <tbody>
        
        

        <!-- 
        * Will add quantity box on archive pages
        * @ since 3.6.0
        * @ Author Fazle Bari 
        -->
        <?php $live_support = isset( $extra_info['disable_live_support' ] ) && $extra_info['disable_live_support' ] == '1' ? 'checked' : false; ?>
        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="_disable_live_support"><?php echo esc_html__('Live Support','wqpmb');?></label>
                    </div>
                    <div class="form-field col-lg-6">
                        <label class="switch reverse">
                            <input value="1" name="extra[disable_live_support]"
                                <?php echo $live_support; /* finding checked or null */ ?> type="checkbox" id="_disable_live_support">
                            <div class="slider round"><!--ADDED HTML -->
                                <span class="on"><?php echo esc_html__('ON','wqpmb');?></span><span class="off"> <?php echo esc_html__('OFF','wqpmb');?></span><!--END-->
                            </div>
                        </label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Here can need Reload,after change.</p>
                    <?php wqpmb_doc_link('https://codeastrology.com/my-support', 'Customer Support'); ?>
                    
                </div> 
            </td>
        </tr>
        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="_disable_live_support"><?php echo esc_html__('Important Link','wqpmb');?></label>
                    </div>
                    <div class="form-field col-lg-6">
                        <div class="wqpmb-important-link-area">
                            <a class="wqpmb-btn reset wqpmb-has-icon wqpmb-btn-tiny" 
                              href="https://codeastrology.com/downloads/quick-cart-and-plus-minus/"
                              title="Pro Feature and Min Max Control Home Page"
                              target="_blank">
                                <span><i class="wqpmb_icon-globe-inv"></i></span>    
                                Web                       
                            </a>
                            <a class="wqpmb-btn wqpmb-has-icon wqpmb-btn-tiny" 
                              href="https://github.com/codersaiful/wc-quantity-plus-minus-button"
                              title="Github Repository of Min Man Control Free version"
                              target="_blank">
                                <span><i class="wqpmb_icon-github-circled"></i></span>    
                                Github Repo                       
                            </a>
                            <a class="wqpmb-btn wqpmb-has-icon wqpmb-btn-tiny"
                              href="https://github.com/codersaiful/wc-quantity-plus-minus-button/issues/new"
                              title="Submit your issue and you can request for a feature"
                              target="_blank">
                                <span><i class="wqpmb_icon-github"></i></span>    
                                Submit Issue                       
                            </a>
                            <a class="wqpmb-btn wqpmb-has-icon wqpmb-btn-tiny"
                              href="https://www.trustpilot.com/review/codeastrology.com"
                              target="_blank">
                                <span><i class="wqpmb_icon-star-filled"></i></span>    
                                Review                       
                            </a>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">

                </div> 
            </td>
        </tr>
        
        <?php $tracker = isset( $extra_info['tracker' ] ) && $extra_info['tracker' ] == '1' ? 'checked' : false; ?>
        <tr style="display: none !important;">
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="_tracker" title="Help Us to Improve plugin based on user data."><?php echo esc_html__('Tracker','wqpmb');?><i class="wqpmb-optional">Optional</i></label>
                    </div>
                    <div class="form-field col-lg-6">
                        
                        <label class="switch">
                            <input value="1" name="extra[tracker]"
                                <?php echo $tracker; /* finding checked or null */ ?> type="checkbox" id="_tracker">
                            <div class="slider round"><!--ADDED HTML -->
                                <span class="on"><?php echo esc_html__('ON','wqpmb');?></span><span class="off"> <?php echo esc_html__('OFF','wqpmb');?></span><!--END-->
                            </div>
                        </label>
                        <p class="warning-alert">
                            Tracker will send some basic date to Plugin Author. such as: WordPress Version, MySQL Version,WooCommerce Version, site title, Min Max Plugin version, Theme Name etc.
                            <i>If you don't want to share these info, Off this option.</i> We don't sale your data, We use your data as servey for our plugin improve and update. 
                        </p>
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>
                        <b>Help us</b> to improve our plugin by proding your basic data. 
                    </p>
                    
                </div> 
            </td>
        </tr>
        
    </tbody>

    
</table>