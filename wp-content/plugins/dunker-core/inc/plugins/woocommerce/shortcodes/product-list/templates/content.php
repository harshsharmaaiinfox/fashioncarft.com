<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?> <?php qode_framework_inline_attr( $data_attr, 'data-options' ); ?>>
	<?php
	if ( 'yes' === $enable_filter && 'simple' === $filter_type ) {
		// Include global filter from theme
		dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter/filter', 'simple', $params );
	} elseif ( 'yes' === $enable_filter && 'advanced' === $filter_type ) {
		// Include filter from shortcode
		dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter/filter', $advanced_filter_type, $params );
	}
	?>
	<div class="qodef-grid-inner">
		<?php
		// Include global masonry template from theme
		dunker_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );

		// Include items
		dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/loop', '', $params );
		?>
	</div>
	<?php
	// Include global pagination from theme
	dunker_core_theme_template_part( 'pagination', 'templates/pagination', $params['pagination_type'], $params );
	?>
</div>
