<?php
// Include filter
dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter-info/category-filter', $category_filter_type, $params );
?>
<?php
// Include loading spinner
if ( ! isset( $pagination_type ) || 'no-pagination' === $pagination_type ) {
	dunker_render_svg_icon( 'spinner', 'qodef-filter-spinner' );
}
