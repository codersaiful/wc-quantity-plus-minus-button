/**
 * This file is 99.99% similar with our min max plugins js file.
 * 
 * Specially making ajax add to cart for min max plugin.
 * 
 * Taking help from https://quadmenu.com/add-to-cart-with-woocommerce-and-ajax-step-by-step/
 * 
 * @since 3.6.0
 */
(function ($) {
    $(document).ready(function () {
        
        $(document.body).on('click', '.single_add_to_cart_button', function (e) {

            /**
             * Actually if .disabled class found 
             * or .wc-variation-selection-needed class found
             * we don't do anything.
             */
            if($(this).hasClass('disabled') || $(this).hasClass('wc-variation-selection-needed')){
                return;
            }
            e.preventDefault();

            var $thisbutton = $(this),
                    $form = $thisbutton.closest('form.cart'),
                    id = $thisbutton.val(),
                    product_qty = $form.find('input[name=quantity]').val() || 1,
                    product_id = $form.find('input[name=product_id]').val() || id,
                    variation_id = $form.find('input[name=variation_id]').val() || 0;

            var data = {
                action: 'woocommerce_ajax_add_to_cart',
                product_id: product_id,
                product_sku: '',
                quantity: product_qty,
                variation_id: variation_id,
            };

            $(document.body).trigger('adding_to_cart', [$thisbutton, data]);
            console.log(wc_add_to_cart_params);
            $.ajax({
                type: 'post',
                url: wc_add_to_cart_params.ajax_url,
                data: data,
                beforeSend: function (response) {
                    $thisbutton.removeClass('added').addClass('loading');
                },
                complete: function (response) {
                    $thisbutton.addClass('added').removeClass('loading');
                },
                success: function (response) {
                    console.log(response);
                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    } else {
                        //Go to cart page, If enable from WooCommerce->Settings->Products->General->Add to cart behaviour
                        if(wc_add_to_cart_params.cart_redirect_after_add === 'yes'){
                            window.location = wc_add_to_cart_params.cart_url;
                        }
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                    }
                },
            });

            return false;
        });
    });
})(jQuery);