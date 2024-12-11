<div class="qodef-product-list-filter-holder qodef-filter-top-bar">
	<?php
	// Include result count info
	dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/result-count', '', $params );
	?>
	<div class="qodef-e-info-right qodef--active">
		<?php
		// Include sort by dropdown
		dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/sort-by', '', $params );
		?>
	</div>
</div>
<div class="qodef-product-list-filter-holder qodef-filter-content">
	<?php
	// Include active filters
	dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/content-vertical', '', $params );
	?>
	<div class="qodef-e-widget-area">
		<?php
		// Include widgets
		dynamic_sidebar( 'qodef-product-list-sidebar-widget-area' );
		?>
	</div>
</div>
<?php
// Include loading spinner
if ( ! isset( $pagination_type ) || 'no-pagination' === $pagination_type ) {
	dunker_render_svg_icon( 'spinner', 'qodef-filter-spinner' );
}
?>
