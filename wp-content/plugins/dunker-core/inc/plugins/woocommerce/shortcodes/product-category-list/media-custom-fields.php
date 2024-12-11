<?php

if ( ! function_exists( 'dunker_core_add_product_category_options' ) ) {
	/**
	 * Function that add global taxonomy options for current module
	 */
	function dunker_core_add_product_category_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'product_cat' ),
				'type'  => 'taxonomy',
				'slug'  => 'product_cat',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_product_category_masonry_size',
					'title'       => esc_html__( 'Image Size', 'dunker-core' ),
					'description' => esc_html__( 'Choose image size for list shortcode item if masonry layout > fixed image size is selected in product category list shortcode', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'masonry_image_dimension' ),
				)
			);
		}
	}

	add_action( 'dunker_core_action_register_cpt_tax_fields', 'dunker_core_add_product_category_options' );
}

if ( ! function_exists( 'dunker_core_add_product_tag_options' ) ) {
	/**
	 * Function that add global taxonomy options for current module
	 */
	function dunker_core_add_product_tag_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'product_tag' ),
				'type'  => 'taxonomy',
				'slug'  => 'product_tag',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_product_tag_image',
					'title'      => esc_html__( 'Product Tag Image', 'dunker-core' ),
				)
			);
		}
	}

	add_action( 'dunker_core_action_register_cpt_tax_fields', 'dunker_core_add_product_tag_options' );
}

if ( ! function_exists( 'dunker_core_add_product_brand_options' ) ) {
	/**
	 * Function that add global taxonomy options for current module
	 */
	function dunker_core_add_product_brand_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'product_brand' ),
				'type'  => 'taxonomy',
				'slug'  => 'product_brand',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_product_brand_image',
					'title'      => esc_html__( 'Product Brand Image', 'dunker-core' ),
				)
			);
		}
	}

	add_action( 'dunker_core_action_register_cpt_tax_fields', 'dunker_core_add_product_brand_options' );
}