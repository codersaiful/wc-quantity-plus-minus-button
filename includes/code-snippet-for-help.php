<?php
###### Some helping code snippet available here #### 
### not included in plugin actually ##### 


/**
 * Disable Plus minus button for specific page
 * such: cart page, checkout page,
 * using filter hook: 'wqpmb_show_validation'
 * 
 * There are few filter hook
 * wqpmb_show_validation bool filter hook
 * wqpmb_on_product_page bool filter hook 
 * wqpmb_on_cart_page bool filter hook
 * wqpmb_on_mini_cart_page bool filter hook
 * wqpmb_template_on_off bool filter hook
 * 
 * wqpmb_template
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 *
 * @return bool
 */
function ca_custom_off_plus_minus_specific($validation, $datas){
	if( is_cart() ){ //you can use any other page condition.
		return false;
	}
	return $validation;
}
add_filter('wqpmb_show_validation', 'ca_custom_off_plus_minus_specific', 10, 2);


