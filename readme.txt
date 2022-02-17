=== Quantity Plus Minus Button for WooCommerce ===

Contributors: codersaiful, codeastrology
Tags: woocommerce quantity, plus minus button, quantity, qty button
Requires at least: 4.0.0
Tested up to: 5.9
Requires PHP: 5.6
WC requires at least: 3.7
WC tested up to: 6.1.1
License: GPL3+
License URI: http://www.gnu.org/licenses/gpl.html

Easily add plus, minus button for WooCommerce Quantity Input box in everywhere. Quantity button design features available. Such: Single Page, In Loop Quantity input, Cart page etc with custom design. 

== Description ==

*Quantity Plus/Minus Button for WooCommerce* plugin add beautifully designed quantity buttons for WooCommerce quantity input box on the  product page which also support for decimal quantity. Easily add plus, minus button for WooCommerce Quantity Input box in everywhere. Such: Single Page, In Loop Quantity input, Cart page etc with custom design. User able to get custom/own color for his plus or minus button.

**Features**

* Quantity step supported
* Decimal quantity supported
* Customizable button design
* You can customize button background color
* You can customize button text color
* You can customize border color
* You can customize border width
* You can set custom border radius
* Well documented
* Well commented
* Clean code
* Compatible with all themes
* Compatible with all plugins
* Compatible with Woo Product Table
* Compatible with the latest version of WordPress
* Compatible with the latest version of WooCommerce

**[Plugin's Home Page](https://wcquantity.com/wc-quantity-plus-minus-button/)**
**[Demo Link](https://wcquantity.com/product/head-phone/)**

== Frequently Asked Questions ==

= Does this plugin support StoreFront theme? =

Yes this plugin is supports all themes.

= Where is the settings page? =

You can find it under UltraAddons -> Plus Minus Button

= Does this plugin supports decimal value as quantity? =

Yes, this plugin supports decimal value as product quantity.


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

Hide on product page
`
add_filter('wqpmb_on_product_page', '__return_false');
`

Hide on cart page
`
add_filter('wqpmb_on_cart_page', '__return_false');
`

Hide on Mini Cart page
`
add_filter('wqpmb_on_mini_cart_page', '__return_false');
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

1. Quantity button in WooCommerce cart page
2. Quantity button setting page with custom color selection
3. Quantity button in single product page
4. Quantity button in WooCommerce cart page
5. Quantity button in single product page
6. Quantity button in WooCommerce cart page
7. Quantity button in single product page
8. Quantity button in WooCommerce cart page
9. Quantity button setting page with custom color selection
10. Quantity button in WooCommerce cart page

== Change log ==

= 1.0.6 =

* Hide on Mini Cart page
* Bug fixed

= 1.0.5 =

* Setting link fixed
* name fixed
* Bug fixed

= 1.0 =

* Initial release
