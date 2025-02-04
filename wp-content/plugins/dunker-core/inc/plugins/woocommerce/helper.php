<?php

if ( ! function_exists( 'dunker_core_register_product_for_meta_options' ) ) {
	/**
	 * Function that register product post type for meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function dunker_core_register_product_for_meta_options( $post_types ) {
		$post_types[] = 'product';

		return $post_types;
	}

	add_filter( 'qode_framework_filter_meta_box_save', 'dunker_core_register_product_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'dunker_core_register_product_for_meta_options' );
}

if ( ! function_exists( 'dunker_core_woo_get_global_product' ) ) {
	/**
	 * Function that return global WooCommerce object
	 *
	 * @return object
	 */
	function dunker_core_woo_get_global_product() {
		global $product;

		return $product;
	}
}

if ( ! function_exists( 'dunker_core_woo_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int    $position
	 * @param string $map
	 *
	 * @return int
	 */
	function dunker_core_woo_set_admin_options_map_position( $position, $map ) {

		if ( 'woocommerce' === $map ) {
			$position = 70;
		}

		return $position;
	}

	add_filter( 'dunker_core_filter_admin_options_map_position', 'dunker_core_woo_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'dunker_core_include_woocommerce_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function dunker_core_include_woocommerce_shortcodes() {
		foreach ( glob( DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}

	add_action( 'qode_framework_action_before_shortcodes_register', 'dunker_core_include_woocommerce_shortcodes' );
}

if ( ! function_exists( 'dunker_core_woo_product_get_rating_html' ) ) {
	/**
	 * Function that return ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float  $rating
	 * @param int    $count - total number of ratings
	 *
	 * @return string
	 */
	function dunker_core_woo_product_get_rating_html( $html, $rating, $count ) {
		return qode_framework_is_installed( 'theme' ) ? dunker_woo_product_get_rating_html( $html, $rating, $count ) : '';
	}
}

if ( ! function_exists( 'dunker_core_set_product_styles' ) ) {
	/**
	 * Function that generates module inline styles
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function dunker_core_set_product_styles( $style ) {
		$price_styles        = dunker_core_get_typography_styles( 'qodef_product_price' );
		$price_single_styles = dunker_core_get_typography_styles( 'qodef_product_single_price' );

		if ( ! empty( $price_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page .price',
					'.qodef-woo-shortcode .price',
				),
				$price_styles
			);
		}

		if ( ! empty( $price_single_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .entry-summary .price',
				),
				$price_single_styles
			);
		}

		$price_discount_styles        = array();
		$price_discount_color         = dunker_core_get_option_value( 'admin', 'qodef_product_price_discount_color' );
		$price_single_discount_styles = array();
		$price_single_discount_color  = dunker_core_get_option_value( 'admin', 'qodef_product_single_price_discount_color' );

		if ( ! empty( $price_discount_color ) ) {
			$price_discount_styles['color'] = $price_discount_color;
		}

		if ( ! empty( $price_single_discount_color ) ) {
			$price_single_discount_styles['color'] = $price_single_discount_color;
		}

		if ( ! empty( $price_discount_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page .price del',
					'.qodef-woo-shortcode .price del',
				),
				$price_discount_styles
			);
		}

		if ( ! empty( $price_single_discount_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .entry-summary .price del',
				),
				$price_single_discount_styles
			);
		}

		$label_styles      = dunker_core_get_typography_styles( 'qodef_product_label' );
		$info_styles       = dunker_core_get_typography_styles( 'qodef_product_info' );
		$info_hover_styles = dunker_core_get_typography_hover_styles( 'qodef_product_info' );

		if ( ! empty( $label_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .product_meta .qodef-woo-meta-label',
					'#qodef-woo-page.qodef--single .entry-summary .qodef-custom-label',
				),
				$label_styles
			);
		}

		if ( ! empty( $info_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .product_meta .qodef-woo-meta-value',
					'#qodef-woo-page.qodef--single .shop_attributes th',
					'#qodef-woo-page.qodef--single .woocommerce-Reviews .woocommerce-review__author',
				),
				$info_styles
			);
		}

		if ( ! empty( $info_hover_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .product_meta .qodef-woo-meta-value a:hover',
				),
				$info_hover_styles
			);
		}

		return $style;
	}

	add_filter( 'dunker_filter_add_inline_style', 'dunker_core_set_product_styles' );
}

if ( ! function_exists( 'dunker_core_register_brand_woocommerce_taxonomy' ) ) {
	/**
	 * Function for registering Brand taxonomy for WooCommerce Product
	 */
	function dunker_core_register_brand_woocommerce_taxonomy() {

		register_taxonomy(
			'product_brand',
			apply_filters( 'woocommerce_taxonomy_objects_product_brand', array( 'product' ) ),
			apply_filters(
				'woocommerce_taxonomy_args_product_brand',
				array(
					'hierarchical'          => true,
					'update_count_callback' => '_wc_term_recount',
					'label'                 => __( 'Brand', 'dunker-core' ),
					'labels'                => array(
						'name'              => __( 'Product Brand', 'dunker-core' ),
						'singular_name'     => __( 'Brand', 'dunker-core' ),
						'menu_name'         => _x( 'Brands', 'Admin menu name', 'dunker-core' ),
						'search_items'      => __( 'Search Brands', 'dunker-core' ),
						'all_items'         => __( 'All Brands', 'dunker-core' ),
						'parent_item'       => __( 'Parent Brand', 'dunker-core' ),
						'parent_item_colon' => __( 'Parent Brand:', 'dunker-core' ),
						'edit_item'         => __( 'Edit Brand', 'dunker-core' ),
						'update_item'       => __( 'Update Brand', 'dunker-core' ),
						'add_new_item'      => __( 'Add new Brand', 'dunker-core' ),
						'new_item_name'     => __( 'New Brand name', 'dunker-core' ),
						'not_found'         => __( 'No Brands found', 'dunker-core' ),
					),
					'show_ui'               => true,
					'query_var'             => true,
					'capabilities'          => array(
						'manage_terms' => 'manage_product_terms',
						'edit_terms'   => 'edit_product_terms',
						'delete_terms' => 'delete_product_terms',
						'assign_terms' => 'assign_product_terms',
					),
					'rewrite'               => array(
						'slug'         => 'product-brand',
						'with_front'   => false,
						'hierarchical' => true,
					),
					'supports'          => array( 'thumbnail' ),
				)
			)
		);
	}

	add_action( 'init', 'dunker_core_register_brand_woocommerce_taxonomy' );
}

if ( ! function_exists( 'dunker_core_woo_set_listed_product_skin' ) ) {
	/**
	 * Function that set light skin item class
	 *
	 * @param string $item_classes
	 *
	 * @return string
	 */
	function dunker_core_woo_set_listed_product_skin( $item_classes ) {
		$skin_light = get_post_meta( get_the_ID(), 'qodef_product_enable_light_skin', true );

		if ( 'yes' === $skin_light ) {
			$item_classes .= ' qodef-skin--light';
		}

		return $item_classes;
	}

	add_filter( 'dunker_core_filter_product_list_item_classes', 'dunker_core_woo_set_listed_product_skin' );
}
