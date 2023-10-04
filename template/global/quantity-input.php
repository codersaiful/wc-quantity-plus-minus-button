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


	global $product;
	$product_id =  0;
	if( is_object( $product ) && method_exists( $product,'get_id' ) ){
		$product_id =  $product->get_id();
	}

	
	/**
	 * @Hook Filter: wqpmb_show_plus_minus
	 * To set any validation, Based on your saved data
	 * use following Filter Hook.
	 * @return bool Need True false Validation
	 */
	$plus_minus = apply_filters( 'wqpmb_show_plus_minus', true, $product_id );
	
	?>
	<div class="qib-button-wrapper qib-button-wrapper-<?php echo esc_attr( $product_id ); ?>">
	
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php esc_html_e( 'Quantity', 'wqpmb' ); ?></label>
			<?php if( $plus_minus ){ ?>
            <button type="button" class="minus qib-button">-</button>
			<?php } ?>
			<div class="quantity wqpmb_quantity">
			<?php
			/**
			 * Hook to output something before the quantity input field.
			 *
			 * @since 7.2.0
			 */
			do_action( 'woocommerce_before_quantity_input_field' );
			?>
				<input
					type="number"
					id="<?php echo esc_attr( $input_id ); ?>"
					class="wqpmb_input_text <?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
					step="<?php echo esc_attr( $step ); ?>"
					data-product_id="<?php echo esc_attr( $product_id ); ?>"
					data-variation_id=""
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

			<?php if( $plus_minus ){ ?>
            <span class="wqpmb_plain_input hidden"><?php echo esc_html( $input_value ); ?></span>
		
            <button type="button" class="plus qib-button">+</button>
			<?php } ?>
	</div>
	<?php
}
