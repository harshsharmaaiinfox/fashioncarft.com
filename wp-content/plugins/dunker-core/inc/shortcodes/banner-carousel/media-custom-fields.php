<?php

if ( ! function_exists( 'dunker_core_add_banner_carousel_image_shortcode_media_options' ) ) {
	/**
	 * Function that add global media option for current module
	 */
	function dunker_core_add_banner_carousel_image_shortcode_media_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => 'image',
				'type'  => 'attachment',
				'slug'  => 'qodef_banner_carousel',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_banner_carousel_custom_link',
					'title'       => esc_html__( 'Custom Link URL', 'dunker-core' ),
					'description' => esc_html__( 'Enter URL where image should navigate to if custom link option is selected in banner carousel shortcode', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_banner_carousel_masonry_size',
					'title'       => esc_html__( 'Image Size', 'dunker-core' ),
					'description' => esc_html__( 'Choose image size for list shortcode item if masonry layout > fixed image size is selected in banner carousel shortcode', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'masonry_image_dimension' ),
				)
			);
		}
	}

	add_action( 'qode_framework_action_custom_media_fields', 'dunker_core_add_banner_carousel_image_shortcode_media_options', 11 );
}
