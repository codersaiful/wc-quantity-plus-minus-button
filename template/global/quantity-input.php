<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.3.0
 */

/**
 * This issue will be activated
 * Basically for Oceanwp theme
 * Actually in oCeanwp theme, for our product table, there are showing
 * lots of qty button.
 * 
 * Because they has generate qty button by JavaScript based on .qty of input tag of quantity.
 * In this situation, we have to remove .qty class.
 * we also can use a filter of woocommerce: woocommerce_quantity_input_classes
 * 'classes'      => apply_filters( 'woocommerce_quantity_input_classes', array( 'input-text', 'qty', 'text' ), $product ),
 * file: woocommerce/includes/wc-template-function.php
 */
//if( isset( $classes ) && is_array( $classes ) ){
//    $qty_index = array_search( 'qty', $classes );
//    unset( $classes[$qty_index] );
//}
//

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	
	if ( $min_value && ( $input_value < $min_value ) ) {
		$input_value = $min_value;
	}

	if ( $max_value && ( $input_value > $max_value ) ) {
		$input_value = $max_value;
	}

	if ( '' === $input_value ) {
		$input_value = 0;
	}

	?>
	<div class="qib-button qib-button-wrapper">
	
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php esc_html_e( 'Quantity', 'wqpmb' ); ?></label>
		
                <button type="button" class="minus qib-button">-</button>
                <div class="quantity wqpmb_quantity">
                    <input
			type="number"
			id="<?php echo esc_attr( $input_id ); ?>"
			class="wqpmb_input_text <?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
			step="<?php echo esc_attr( $step ); ?>"
			min="<?php echo esc_attr( $min_value ); ?>"
			max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			name="<?php echo esc_attr( $input_name ); ?>"
			value="<?php echo esc_attr( $input_value ); ?>"
			title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'wqpmb' ); ?>"
			size="4"
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
			inputmode="<?php echo esc_attr( $inputmode ); ?>" />
		<?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
                    
                </div>
                <span class="wqpmb_plain_input hidden"><?php echo esc_html( $input_value ); ?></span>
		
                <button type="button" class="plus qib-button">+</button>
	
	</div>
	<?php
}
