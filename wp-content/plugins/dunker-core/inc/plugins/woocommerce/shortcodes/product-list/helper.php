<?php

if ( ! function_exists( 'dunker_core_get_product_list_sorting_filter' ) ) {
	function dunker_core_get_product_list_sorting_filter() {
		$sorting_list_html = '';

		$include_order_by = apply_filters(
			'woocommerce_catalog_orderby',
			array(
				''                 => esc_html__( 'Default sorting', 'dunker-core' ),
				'popularity'       => esc_html__( 'Sort by popularity', 'dunker-core' ),
				'newness'          => esc_html__( 'Sort by latest', 'dunker-core' ),
				'price-range-high' => esc_html__( 'Sort by price high to low', 'dunker-core' ),
				'price-range-low'  => esc_html__( 'Sort by price low to high', 'dunker-core' ),
			)
		);

		foreach ( $include_order_by as $key => $value ) {
			$sorting_list_html .= '<li class="qodef-m-orderby-item"><a href="#" class="qodef-m-orderby" data-orderby="' . $key . '">' . $value . '</a></li>';
		}

		return $sorting_list_html;
	}
}

if ( ! function_exists( 'dunker_core_product_list_filter_query' ) ) {
	/**
	 * Function to adjust query for listing list parameters
	 */
	function dunker_core_product_list_filter_query( $args, $params ) {

		switch ( $params['orderby'] ) {

			case 'menu_order':
				$args['order']   = 'asc';
				$args['orderby'] = 'menu_order title';
				break;
			case 'popularity':
				$args['meta_key'] = 'total_sales';
				$args['order']    = 'desc';
				$args['orderby']  = 'meta_value_num';
				break;
			case 'newness':
				$args['order']   = 'desc';
				$args['orderby'] = 'date';
				break;
			case 'price-range-high':
				$args['meta_key'] = '_price';
				$args['order']    = 'DESC';
				$args['orderby']  = 'meta_value_num';
				break;

			case 'price-range-low':
				$args['meta_key'] = '_price';
				$args['order']    = 'ASC';
				$args['orderby']  = 'meta_value_num';
				break;
		}

		return $args;
	}

	add_filter( 'dunker_filter_query_params', 'dunker_core_product_list_filter_query', 10, 2 );
}

if ( ! function_exists( 'dunker_add_product_list_widget_area' ) ) {
	function dunker_add_product_list_widget_area() {
		register_sidebar(
			array(
				'id'            => 'qodef-product-list-sidebar-widget-area',
				'name'          => esc_html__( 'Product List Sidebar Widget Area', 'dunker-core' ),
				'description'   => esc_html__( 'Widgets added here will appear in product list advanced filter with sidebar type', 'dunker-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-product-list-sidebar-widget-area" data-area="product-list-widget">',
				'after_widget'  => '</div>',
			)
		);
	}

	add_action( 'widgets_init', 'dunker_add_product_list_widget_area' );
}

if ( ! function_exists( 'dunker_core_add_product_list_item_qode_woo_plugins' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function dunker_core_add_product_list_item_qode_woo_plugins() {
		do_action( 'dunker_core_action_product_list_item_qode_woo_plugins' );
	}
}
