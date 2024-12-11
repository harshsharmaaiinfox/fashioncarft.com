<div <?php wc_product_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<span class="qodef-e-letter"><?php echo esc_html( $params['key'] ); ?></span>
		<div class="qodef-e-brands">
		<?php
		foreach ( $taxonomy_items as $taxonomy_item ) {
			$title   = $taxonomy_item->name;
			$slug    = $taxonomy_item->slug;
			$initial = strtoupper( substr( $title, 0, 1 ) );

			$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'p';

			if ( $initial === $key ) {
				?>
			<a href="<?php echo get_term_link( $slug, 'product_brand' ); ?>" class="qodef-e-brand-link">
				<<?php echo esc_attr( $title_tag ); ?> class="qodef-brand-name" <?php qode_framework_inline_style( $this_shortcode->get_title_styles( $params ) ); ?>>
				<?php echo esc_html( $title ); ?>
				</<?php echo esc_attr( $title_tag ); ?>>
			</a>
				<?php
			}
		}
		?>
		</div>
	</div>
</div>
