<?php
$bg_styles = array();
$bg_color  = get_post_meta( get_the_ID(), 'qodef_product_background_color', true );
if ( ! empty( $bg_color ) ) {
	$bg_styles[] = 'background-color: ' . $bg_color;
}
if ( 'yes' === $use_background_image ) {
	$backg       = array();
	$bg_image_id = get_post_meta( get_the_ID(), 'qodef_product_list_background_image', true );
	$bg_styles[] = 'background-image: url(' . esc_url( wp_get_attachment_image_url( $bg_image_id, 'full' ) ) . ')';
}
?>
<div <?php wc_product_class( apply_filters( 'dunker_core_filter_product_list_item_classes', $item_classes ) ); ?> <?php qode_framework_inline_style( $bg_styles ); ?>>
	<div class="qodef-e-inner">
		<?php
		dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/mark' );
		if ( isset( $enable_wishlist ) && 'no' !== $enable_wishlist ) {
			do_action( 'dunker_core_action_product_list_item_additional_top_content' );
		}
		?>
		<?php do_action( 'dunker_core_action_product_list_item_qode_woo_plugins' ); ?>
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="qodef-e-media">
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/slider', '', $params ); ?>
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
			</div>
		<?php } ?>
		<div class="qodef-e-content">
			<div class="qodef-e-text-wrapper">
				<div class="qodef-e-top-holder">
					<div class="qodef-e-info">
						<?php
						// Include post brands info
						dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/brands' );
						?>
					</div>
				</div>
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
				<div class="qodef-e-bottom-holder">
					<div class="qodef-e-info">
						<?php
						// Include post category info
						dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/categories', '', $params );
						?>
					</div>
				</div>
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
			</div>
		</div>
		<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' ); ?>
	</div>
</div>
