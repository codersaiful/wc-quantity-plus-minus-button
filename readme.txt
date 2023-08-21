=== Quantity Plus Minus Button for WooCommerce by CodeAstrology ===

Contributors: codersaiful, codeastrology, unikforce, fazlebari, autocircled
Tags: woocommerce quantity, plus minus button, quantity, qty button
Requires at least: 4.0.0
Tested up to: 6.3
Stable tag: 1.1.8
Requires PHP: 7.0
WC requires at least: 4.0
WC tested up to: 7.4.0
License: GPL3+
License URI: http://www.gnu.org/licenses/gpl.html

Easily add plus, minus button for WooCommerce Quantity Input box in everywhere with custom Design functionality. Quantity button design features available. Such: Single Page, In Loop Quantity input, Cart page etc with custom design. 

== Description ==

*Quantity Plus/Minus Button for WooCommerce* plugin add beautifully designed quantity buttons for WooCommerce quantity input box on the  product page which also support for decimal quantity. Easily add plus, minus button for WooCommerce Quantity Input box in everywhere. Such: Single Page, In Loop Quantity input, Cart page etc with custom design. User able to get custom/own color for his plus or minus button.

**Features**

👉 Quantity step supported
👉 Decimal quantity supported
👉 Customizable button design
👉 You can customize button background color and hover
👉 You can customize button text color and hover
👉 You can customize border color and hover
👉 You can customize border width
👉 You can set custom border radius
👉 Live customer support for any Issue.
👉 Well documented
👉 Well commented
👉 Clean code
👉 Compatible with all themes
👉 Compatible with all plugins
👉 Compatible with Woo Product Table
👉 Compatible with the latest version of WordPress
👉 Compatible with the latest version of WooCommerce

**[Demo Link](https://demo.wooproducttable.com/product/couple-jewelry/)**

== Filter ==


Enable Ajax add to cart for Single Product Page.
`
add_filter('wqpmn_ajax_cart_single_page', '__return_true' );

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



**👷 HONORABLE CONTRIBUTOR - [GitHub](https://github.com/codersaiful/wc-quantity-plus-minus-button/graphs/contributors) 👷**<br>

* [codersaiful](https://github.com/codersaiful) (53 commits 1,965 ++ )
* [unikforceit](https://github.com/unikforceit) (1 commit 5 ++  )
* [fazlebarisn](https://github.com/fazlebarisn) (1 commit 11 ++ )
* [autocircled](https://github.com/autocircled) (1 commit 110 ++ )
* 👉 [You can join here](https://github.com/codersaiful/wc-quantity-plus-minus-button/fork)

**🥇 CONTRIBUTE 🥇**<br>
You are welcome to contribute  to this project. Join with us [Fork Github repository](https://github.com/codersaiful/wc-quantity-plus-minus-button/fork). If you contribute 1 commit, We will add your name to our plugin's Contributor table/list of WordPress Plugin too.


== Installation ==

1. Upload 'wc-quantity-plus-minus-button' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Menu Location after Install: =

🔅 Dashboard -> WooCommerce -> (+-) Plus Minus Button

= Already my theme provide Plus Minus botton, Do I need it? =

🔅 No Need, As it's already provided by your theme.

= Does this plugin support StoreFront theme? =

🔅 Yes this plugin is supports all themes.

= Can I hide plus minus button from cart page? =

🔅 Yes, you can hide it by using our filter (`wqpmb_on_cart_page`). see following code:
`add_filter('wqpmb_on_cart_page','__return_false');`

= Does this plugin supports decimal value as quantity? =

🔅 Yes, this plugin supports decimal value as product quantity.

= What is default Shortcode? =

🔅 There is no shortcode for this plugin.

= What is setting page? or Where I can change button color =

🔅Go to `Dashboard -> WooCommerce-> (+-) Plus Minus Button -> [And change/update your setting]`

= Can I set product limitation to show in one table? =

🔅 Yes. You can set the product limit to show in you able. Eg. You have 100 products in your site then you can easily show 50 of them.

= How to use? =

🔅 Install and activate. Then go to ( Dashboard->WooCommerce->Plus Minus Button -> [And change/update your setting] ).  And enjoy it.
That's it. So easy, Right !!!

= Is it suitable for any theme ? =

🔅 Yes, But if already available plus minus button on your theme, you should not use any plus minus button plugin.

= Is it suitable with (Woo Product Table) Plugin ? =

🔅 Yes. *Product Table for WooCommerce by CodeAstrology* or *Woo Product Table* will adapt with your design.

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

= 1.1.8 =
* Live support Disable Option 
* Backend Design update
* Divi theme's quantity box issue has been solved
* Bug Fix 
* Code Optimized

= 1.1.7 =
* input box right margin issue has been solved.

= 1.1.6 =
* Added: Quantity box for Shop Page
* Added: Quantity box for All Archive/Tag/Category/Taxonomy Page
* Bug Fix 
* Code Optimized

= 1.1.5 =

* Little CSS issue fixed for Cart page.
* Bug Fix 

= 1.1.4 =

* More Setting added.
* Input box style added.
* Added Hover background color.
* Added Hover border color.
* Added Hover font color.
* Bug Fix 

= 1.1.3 =

* Live support from CodeAstrology button Added
* Spelling fix on html markup
* Bug Fix 

= 1.1.2 =

* Minor Error fixed 
* Tested with Latest WordPress and Updated
* Tested with Latest WooCommerce and Updated
* Compatibility Check with More Theme And Plugin 
* Compatible with [Woo Product Table (Poduct Table Plugin for WooCommerce by CodeAstrology)](https://github.com/autocircled)
* Bug Fixed

= 1.0.6 =

* Change demo link
* Bug fixed

= 1.0.6 =

* Hide on Mini Cart page
* Bug fixed

= 1.0.5 =

* Setting link fixed
* name fixed
* Bug fixed

= 1.0 =

* Initial release
