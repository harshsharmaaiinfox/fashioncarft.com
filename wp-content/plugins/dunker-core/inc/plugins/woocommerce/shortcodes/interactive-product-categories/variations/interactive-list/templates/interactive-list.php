<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<div class="qodef-m-items">
		<?php
			$i = 0;

		foreach ( $items as $item ) {

			$taxonomy_image_meta = get_term_meta( $item->term_id, 'thumbnail_id', true );
			$taxonomy_image      = ! empty( $taxonomy_image_meta ) ? $taxonomy_image_meta : get_option( 'woocommerce_placeholder_image', 0 );
			$item_image          = dunker_core_get_list_shortcode_item_image( 'full', $taxonomy_image );

			?>
			<a itemprop="url" class="qodef-m-item qodef-e" href="<?php echo get_term_link( $item->slug, 'product_cat' ); ?>" target="<?php echo esc_attr( $link_target ); ?>" data-index="<?php echo intval( $i ++ ); ?>">
				<span class="qodef-e-title"><?php echo esc_html( $item->name ); ?>
					<span class="qodef-e-count">
					<?php echo '(' . esc_html( $item->count ) . ')'; ?>
					</span>
				</span>

			<?php
			if ( isset( $item_image ) && ! empty( $item_image ) ) {
				$images = explode( ',', trim( $item_image ) );
				$urls   = array();
				foreach ( $images as $image ) {
					$urls[] = wp_get_attachment_image_url( $image, 'full' );
				}
				?>
					<span class="qodef-e-follow-content">
						<span class="qodef-e-follow-image">
						<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/interactive-product-categories', 'templates/post-info/image', '', $item ); ?>
						</span>
					</span>
				<?php } ?>
			</a>
		<?php } ?>
	</div>
</div>
