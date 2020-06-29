=== WC Quantity Plus Minus Button ===
Contributors: codersaiful, codeastrology
Tags: woocommerce quantity, plus minus button, quantity, qty button

Version: 1.0.0
Requires at least: 4.0.0
Tested up to: 5.4.2
Requires PHP: 5.2.4
WC requires at least: 3.7
WC tested up to: 4.2.2
License: GPL3+
License URI: http://www.gnu.org/licenses/gpl.html

Replace beautifully designed quantity buttons on WooCommerce product page which also support for decimal quantity.

== Description ==
WC Quantity Plus Minus Button adds beautifully designed quantity buttons on the WooCommerce product page which also support for decimal quantity.


=== Compatible with ===

* [WooCommerce Minimum and Maximum Quantity](https://wordpress.org/plugins/woo-min-max-quantity-limit/)
* [WooCommerce Min Max Quantity & Step Control Single](https://wordpress.org/plugins/woo-min-max-quantity-step-control-single/)
* [WooCommerce Min/Max Quantities](https://woocommerce.com/products/minmax-quantities/)


== Filter ==
You can validate form data using this filter
`
add_filter( 'wqpmb_default_form_panel_validation', '__return_true' );
`

On off checkbox in admin page using filter
`
add_filter('wqpmb_checkbox_row_validation', '__return_true' );
`

CSS validation using filter
`
add_filter('wqpmb_css_row_validation', '__return_true' );
`

Use default WooCommerce template
`
add_filter('wqpmb_show_validation', '__return_true');
`

Show on product page
`
add_filter('wqpmb_on_product_page', '__return_true');
`

Show on cart page
`
add_filter('wqpmb_on_cart_page', '__return_true');
`

To Change Templae Base Directory, Use following Hook
In that directory, template files folder will be locate
`
add_filter('wqpmb_template_base_dir', $template_base_dir);
`

== Action ==
You can use this action for append something new after the checkbox
`
do_action( 'wqpmb_checkbox_row', $our_data, $datas );
`

To add New CSS row, use following action hook
`
do_action( 'wqpmb_css_row' );
`

To add any new row, use the following action hook
`
do_action( 'wqpmb_form_row' );
`



== Installation ==

1. Upload 'wc-quantity-plus-minus-button' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. WooCommerce Quantity Buttons on product page
2. WooCommerce Quantity Buttons on cart page

== Change log ==

= 1.0 =
* Initial release
