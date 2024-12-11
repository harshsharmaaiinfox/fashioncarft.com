<div class="qodef-product-list-filter-holder">
	<div class="qodef-filter-left">
		<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/tag-filter', '', $params ); ?>
	</div>
	<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/category-filter', 'top', $params ); ?>
	<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/sort-by', '', $params ); ?>
	<div class="qodef-filter-right qodef--active">
		<?php
		// Include filter opener
		dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/filter-opener', '', $params );
		// Include filter content
		dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/content-horizontal', '', $params );

		?>
	</div>
</div>
<?php
// Include loading spinner
if ( ! isset( $pagination_type ) || 'no-pagination' === $pagination_type ) {
	dunker_render_svg_icon( 'spinner', 'qodef-filter-spinner' );
}
?>
