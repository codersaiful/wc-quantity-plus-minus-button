<?php
namespace WQPMB\Includes\Features;

/**
 * SIMILAR LIKE min max step control plugin.
 * 
 * 
 * Displaying Quantity Box inside Any type Archive
 * it can shop page, category page, Any taxonomy page 
 * 
 * Or even can be relate product area
 * 
 * @since 3.6.0
 * @author Saiful Islam <codersaiful@gmail.com>
 * 
 * @link https://quadmenu.com/add-to-cart-with-woocommerce-and-ajax-step-by-step/
 */
class Quantiy_Archive
{
    public $dissupport_arr = [];
    /**
     * Enable Quantiy_Archive or not
     *
     * @return void
     */
    public function run(){
        $this->dissupport_arr = apply_filters( 'wqpmb_archive_qty_dissupport_arr', ['variable','grouped', 'external'] );
        // var_dump(get_option('woocommerce_cart_redirect_after_add'));
        add_action( 'woocommerce_before_shop_loop', [$this, 'customize_shop_loop'] );
        if ( 'yes' === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ){
            add_action( 'wp_enqueue_scripts', [$this, 'wp_enqueue_scripts'], 99 ); 

            add_action('wp_ajax_woocommerce_ajax_add_to_cart', [$this, 'ajax_add_to_cart']);
            add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', [$this, 'ajax_add_to_cart']);
        }
        
    }

    /**
     * First fucomozed for Shop Loop
     *
     * @return void
     */
    public function customize_shop_loop()
    {
        $link_priority = apply_filters( 'wqpmn_archive_qty_priority', 11 );
        add_filter( 'woocommerce_loop_add_to_cart_link', [$this, 'custom_add_to_cart'], 11, 3 );
    }

    public function custom_add_to_cart( $button, $product, $link )
    {
        $product_type = $product->get_type();

        // not for variable, grouped or external products
        if (! in_array($product_type, $this->dissupport_arr)) {
            // only if can be purchased
            if ($product->is_purchasable()) {
                // show qty +/- with button
                ob_start();
                woocommerce_template_single_add_to_cart();
                $button = ob_get_clean();
            }
        }
        

        return $button;
    }

    public function wp_enqueue_scripts()
    {
        $ajax_cart = apply_filters('wqpmn_ajax_cart_single_page', false);
        if(!$ajax_cart) return;
        wp_register_script( 'wqpmb-ajax-add-to-cart', WQPMB_BASE_URL . 'assets/js/ajax-add-to-cart.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'wqpmb-ajax-add-to-cart' );
    }

    public function ajax_add_to_cart(){
        $ajax_cart = apply_filters('wqpmn_ajax_cart_single_page', false);
        if(!$ajax_cart) return;
        $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
        $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
        $variation_id = absint($_POST['variation_id']);
        $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
        $product_status = get_post_status($product_id);

        if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

            do_action('woocommerce_ajax_added_to_cart', $product_id);

            if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
                wc_add_to_cart_message(array($product_id => $quantity), true);
            }

            \WC_AJAX::get_refreshed_fragments();
        } else {

            $data = array(
                'error' => true,
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
            );

            echo wp_send_json($data);
        }

        wp_die();
    }
}