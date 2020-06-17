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
	<div class="qib-button">
	
		<label class="screen-reader-text" for="acwcqbtn"><?php esc_html_e( 'Quantity', 'wqpmb' ); ?></label>
		
                <button type="button" class="minus qib-button">-</button>
                <div class="quantity">
                    <input type="number" id="acwcqbtn" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" 
                    <?php if ( isset( $max_value ) && 0 < $max_value ) : ?>
                            max="<?php echo esc_attr( $max_value ); ?>"
                    <?php endif; ?>
                    name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>"
                    title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'wqpmb' ); ?>"
                    class="input-text qty text" inputmode="<?php echo esc_attr( $inputmode ); ?>" />
                </div>
		
                <button type="button" class="plus qib-button">+</button>
	
	</div>
	<?php
}
