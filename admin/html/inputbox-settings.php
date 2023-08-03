<table class="wqpmb-table universal-setting">
    <thead>
        <tr>
            <th class="wqpmb-inside">
                <div class="wqpmb-table-header-inside">
                    <h3><?php echo esc_html__( 'Input Box Color', 'wqpmb' ); ?></h3>
                </div>
                
            </th>
            <th>
            <div class="wqpmb-table-header-right-side"></div>
            </th>
        </tr>
    </thead>

    <tbody>

        <?php 
        $css_for_row = apply_filters( 'wqpmb_css_row_validation', true, $our_data, $datas );
        if( $css_for_row ){

        $css = isset( $our_data['css'] ) && is_array( $our_data['css'] ) ? $our_data['css'] : array();
        $css_hover = isset( $our_data['css_hover'] ) && is_array( $our_data['css_hover'] ) ? $our_data['css_hover'] : array();
        $css_input = isset( $our_data['css_input'] ) && is_array( $our_data['css_input'] ) ? $our_data['css_input'] : array();
        ?>

        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-input-bg-color-input">Background</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmb-input-bg-color-input" name="css_input[background-color]" 
                            value="<?php echo isset( $css_input['background-color'] ) ? $css_input['background-color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>WooCommerce input box's background color.</p>
                </div> 
            </td>
        </tr>
            
        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                    <label for="wqpmb-input-border-color-input">Border</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmb-input-border-color-input" name="css_input[border-color]" 
                            value="<?php echo isset( $css_input['border-color'] ) ? $css_input['border-color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>WooCommerce input box's border color.</p>
                </div> 
            </td>
        </tr>
        <tr>
            <td>
                <div class="wqpmb-form-control">
                    <div class="form-label col-lg-6">
                        <label for="wqpmb-input-font-color-input">Font</label>
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" id="wqpmb-input-font-color-input" name="css_input[color]" 
                            value="<?php echo isset( $css_input['color'] ) ? $css_input['color'] : '' ?>" 
                            class="ua_color_picker" />
                    </div>
                </div>
            </td>
            <td>
                <div class="wqpmb-form-info">
                    <p>WooCommerce input box's text/font color.</p>
                </div> 
            </td>
        </tr>


        <?php 
        } //end of $css_for_row
        ?>
    </tbody>
</table>