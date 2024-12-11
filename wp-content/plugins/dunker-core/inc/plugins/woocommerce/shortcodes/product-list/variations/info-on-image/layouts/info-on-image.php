<?php
$bg_color = get_post_meta( get_the_ID(), 'qodef_product_background_color', true );
if ( ! empty( $bg_color ) ) {
	$bg_color = 'background-color: ' . $bg_color;
}
?>
<div <?php wc_product_class( apply_filters( 'dunker_core_filter_product_list_item_classes', $item_classes ) ); ?> <?php qode_framework_inline_style( $bg_color ); ?>>
	<div class="qodef-e-inner">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="qodef-e-media">
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
			</div>
		<?php } ?>
		<div class="qodef-e-media-inner">
			<div class="qodef-e-content">
				<div class="qodef-e-text-wrapper">
					<?php do_action( 'dunker_core_action_product_list_item_qode_woo_plugins' ); ?>
					<div class="qodef-e-top-holder">
						<div class="qodef-e-info">
							<?php
							// Include post brands info
							dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/brands' );
							?>
						</div>
					</div>
					<?php
					$params['title_tag_default'] = 'h2';
					dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params );
					?>
					<div class="qodef-e-bottom-holder">
						<div class="qodef-e-info">
							<?php
							// Include post category info
							dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/categories', '', $params );
							?>
						</div>
					</div>
				</div>
			</div>
			<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/link', 'button' ); ?>
		</div>
	</div>
</div>
