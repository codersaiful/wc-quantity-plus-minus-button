jQuery(function ($) {

    // Make the code work after page load.
    $(document).ready(function () {
        QuantityChange();
    });

    // Make the code work after executing AJAX.
    $(document).ajaxComplete(function () {
        QuantityChange();
    });

    function QuantityChange() {
        $(document).off("click", ".qib-button").on("click", ".qib-button", function () {
            // Find quantity input field corresponding to increment button clicked.
            var qty = $(this).siblings(".quantity").find(".input-text");
            // Read value and attributes min, max, step.
            var val = parseFloat(qty.val());
            var max = parseFloat(qty.attr("max"));
            var min = parseFloat(qty.attr("min"));
            var step = parseFloat(qty.attr("step"));
            // var static = 8;
            
            var qtyObj = $(this).siblings(".quantity");
            var last_step = qtyObj.attr('data-last_step');
            last_step = parseFloat( last_step );
            var prev_step = qtyObj.attr('data-prev_step');
            prev_step = parseFloat( prev_step );
            // Change input field value if result is in min and max range.
            // If the result is above max then change to max and alert user about exceeding max stock.
            // If the field is empty, fill with min for "-" (0 possible) and step for "+".
            if ($(this).is(".plus")) {
                if (val === max){
                    return false;
                }
                    
                if (isNaN(val)) {
                    qty.val(step);
                    return false;
                }
                if (val + step > max) {
                    qtyObj.attr('data-last_step', ( max-val < 0 ? 1 : max-val ) );
                    qtyObj.attr('data-prev_step', ( step ) );
                    qtyObj.find(".input-text").removeAttr('step' );
                    qty.val(max);
                } else {
                    qty.val(val + step);
                }
            } else {

                if (last_step) {
                    
                    qty.val(max - last_step);
                    qtyObj.removeAttr('data-last_step');
                    qtyObj.find(".input-text").attr('step', prev_step );
                    qtyObj.removeAttr('data-prev_step');
                    return false;
                }
                if (val === min){
                    return false;
                }
                    
                if (isNaN(val)) {
                    qty.val(min);
                    return false;
                }
                if (val - step < min) {
                    qty.val(min);
                } else {
                    qty.val(val - step);
                }
            }

            qty.val(Math.round(qty.val() * 100) / 100);
            qty.trigger("change");
            $("body").removeClass("sf-input-focused");
        });
    }

});