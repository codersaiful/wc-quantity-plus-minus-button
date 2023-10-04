<table class="wqpmb-table universal-setting">
    <thead>
        <tr>
            <th class="wqpmb-inside">
                <div class="wqpmb-table-header-inside">
                    <h3><?php echo esc_html__( 'Button Settings', 'wqpmb' ); ?></h3>
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
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-enable-quantity-button">Quantity Box</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <?php
                        $checkbox = isset( $our_data['on_off'] ) ? 'checked' : '';
                        ?>
                        <label class="switch">
                            <input  name="on_off" type="checkbox" id="wqpmb-enable-quantity-button" <?php echo esc_attr( $checkbox ); ?>>
                            <div class="slider round"><!--ADDED HTML -->
                                <span class="on">ON</span><span class="off">OFF</span><!--END-->
                            </div>
                        </label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>It's main setting. If set off, Our plus minus button will disable from Everywhere.</p>
                </div> 
            </td>
        </tr>


        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-enable-quantity-archive">Quantiy box in Archive</label>
                    </div>
                    <div class="form-field col-lg-6">
                    <?php
                    $checkbox = isset( $our_data['quantiy_box_archive'] ) ? 'checked' : '';
                    ?>
                    <label class="switch">
                        <input  name="quantiy_box_archive" type="checkbox" id="wqpmb-enable-quantity-archive" <?php echo esc_attr( $checkbox ); ?>>
                        <div class="slider round"><!--ADDED HTML -->
                            <span class="on">ON</span><span class="off">OFF</span><!--END-->
                        </div>
                    </label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>It's main setting. If set off, Our plus minus button will disable from Everywhere.</p>
                </div> 
            </td>
        </tr>
        <?php 

        do_action( 'wqpmb_checkbox_row', $our_data, $datas );

        $css_for_row = apply_filters( 'wqpmb_css_row_validation', true, $our_data, $datas );
        if( $css_for_row ){

        $css = isset( $our_data['css'] ) && is_array( $our_data['css'] ) ? $our_data['css'] : array();
        $css_hover = isset( $our_data['css_hover'] ) && is_array( $our_data['css_hover'] ) ? $our_data['css_hover'] : array();
        $css_input = isset( $our_data['css_input'] ) && is_array( $our_data['css_input'] ) ? $our_data['css_input'] : array();
        ?>


        <tr class="divider-row">
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <h4 class="section-divider-title">Button Color</h4>
                    </div>
                    <div class="form-field col-lg-6">
                        
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    
                </div> 
            </td>
        </tr>

        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-btn-bg-color">Background</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmb-btn-bg-color" name="css[background-color]" 
                            value="<?php echo isset( $css['background-color'] ) ? $css['background-color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Default background-color of plus minus button. set background color of button. it's default style.</p>
                </div> 
            </td>
        </tr>
            
        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                    <label for="wqpmb-btn-border-color">Border</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmb-btn-border-color" name="css[border-color]" 
                            value="<?php echo isset( $css['border-color'] ) ? $css['border-color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Default border-color of plus minus button. set background color of button. it's default style.</p>
                </div> 
            </td>
        </tr>
        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-btn-font-color">Font</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmb-btn-font-color" name="css[color]" 
                            value="<?php echo isset( $css['color'] ) ? $css['color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Default font-color or text of plus minus button.</p>
                </div> 
            </td>
        </tr>


        <!-- ----------------------- --> 

        <tr class="divider-row">
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <h4 class="section-divider-title">Button Hover Color</h4>
                    </div>
                    <div class="form-field col-lg-6">
                        
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    
                </div> 
            </td>
        </tr>

        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-btn-bg-color-hover">Background</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmb-btn-bg-color-hover" name="css_hover[background-color]" 
                            value="<?php echo isset( $css_hover['background-color'] ) ? $css_hover['background-color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Hover background-color of plus minus button. it's a mouse hover style.</p>
                </div> 
            </td>
        </tr>
            
        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-btn-border-colorcss_hover">Border</label>
                    </div>
                        <input type="text" id="wqpmb-btn-border-colorcss_hover" name="css_hover[border-color]" 
                            value="<?php echo isset( $css_hover['border-color'] ) ? $css_hover['border-color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Hover border-color of plus minus button.</p>
                </div> 
            </td>
        </tr>
        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-btn-font-colorcss_hover">Font</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmb-btn-font-colorcss_hover" name="css_hover[color]" 
                            value="<?php echo isset( $css_hover['color'] ) ? $css_hover['color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Mouse hover font-color or text of plus minus button.</p>
                </div> 
            </td>
        </tr>


        <!-- ----------------------- --> 

        <tr class="divider-row">
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <h4 class="section-divider-title">Button Border Style</h4>
                    </div>
                    <div class="form-field col-lg-6">
                        
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    
                </div> 
            </td>
        </tr>

        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmn-border-width">Width</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmn-border-width" name="css[border-width]" 
                            value="<?php echo isset( $css['border-width'] ) ? $css['border-width'] : '' ?>" 
                            placeholder="eg: 1px"
                            class="ua_input" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Plus minus button's border width. you can set 0 for none border.</p>
                </div> 
            </td>
        </tr>

        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmn-border-radius">Radius</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmn-border-radius" name="css[border-radius]" 
                            value="<?php echo isset( $css['border-radius'] ) ? $css['border-radius'] : '' ?>" 
                            placeholder="eg: 4px"
                            class="ua_input" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>Radius of plus minus button. set 0 for no radius on button.</p>
                </div> 
            </td>
        </tr>


        <!-- ----------------------- --> 
        

        <!-- ----------------------- --> 
        
        

        
        <?php 
        } //end of $css_for_row

        /**
         * @Hook Action: wqpmb_css_row
         * To add New CSS row, use following @Hook 
         */
        do_action( 'wqpmb_css_row' );
        ?>

    </tbody>
</table>