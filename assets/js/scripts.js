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
            var static = 8;
            
            var qtyObj = $(this).siblings(".quantity");
            var last_step = qtyObj.attr('data-last_step');

            // Change input field value if result is in min and max range.
            // If the result is above max then change to max and alert user about exceeding max stock.
            // If the field is empty, fill with min for "-" (0 possible) and step for "+".
            if ($(this).is(".plus")) {
                if (val === max){
                    console.log(555);
                    return false;
                }
                    
                if (isNaN(val)) {
                    console.log(666);
                    qty.val(step);
                    return false;
                }
                if (val + step > max) {
                    qtyObj.attr('data-last_step', ( max-val ) );
                    qty.val(max);
                } else {
                    console.log(888);
                    qty.val(val + step);
                }
            } else {

                if (last_step) {
                    
                    qty.val(max - static);
                    qtyObj.removeAttr('data-last_step');
                    return false;
                }
                if (val === min){
                    console.log(1111);
                    return false;
                }
                    
                if (isNaN(val)) {
                    console.log(2222);
                    qty.val(min);
                    return false;
                }
                if (val - step < min) {
                    console.log(3333);
                    qty.val(min);
                } else {
                    console.log(4444);
                    qty.val(val - step);
                }
            }

            qty.val(Math.round(qty.val() * 100) / 100);
            qty.trigger("change");
            $("body").removeClass("sf-input-focused");
        });
    }

});