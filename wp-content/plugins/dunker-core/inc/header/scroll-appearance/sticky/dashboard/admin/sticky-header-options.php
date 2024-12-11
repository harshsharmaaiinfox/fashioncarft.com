<?php

if ( ! function_exists( 'dunker_core_add_sticky_header_options' ) ) {
	/**
	 * Function that add additional header layout global options
	 *
	 * @param object $page
	 * @param object $section
	 */
	function dunker_core_add_sticky_header_options( $page, $section ) {

		$sticky_section = $section->add_section_element(
			array(
				'name'       => 'qodef_sticky_header_section',
				'dependency' => array(
					'show' => array(
						'qodef_header_scroll_appearance' => array(
							'values'        => 'sticky',
							'default_value' => '',
						),
					),
				),
			)
		);

		$sticky_section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_sticky_header_appearance',
				'title'         => esc_html__( 'Sticky Header Appearance', 'dunker-core' ),
				'description'   => esc_html__( 'Select the appearance of sticky header when you scrolling the page', 'dunker-core' ),
				'options'       => array(
					'down' => esc_html__( 'Show Sticky on Scroll Down/Up', 'dunker-core' ),
					'up'   => esc_html__( 'Show Sticky on Scroll Up', 'dunker-core' ),
				),
				'default_value' => 'down',
			)
		);

		$sticky_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_sticky_header_skin',
				'title'       => esc_html__( 'Sticky Header Skin', 'dunker-core' ),
				'description' => esc_html__( 'Choose a predefined sticky header style for header elements', 'dunker-core' ),
				'options'     => dunker_core_get_select_type_options_pool( 'header_skin', false ),
			)
		);

		$sticky_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_sticky_header_scroll_amount',
				'title'       => esc_html__( 'Sticky Scroll Amount', 'dunker-core' ),
				'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'dunker-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'dunker-core' ),
				),
			)
		);

		$sticky_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_sticky_header_side_padding',
				'title'       => esc_html__( 'Sticky Header Side Padding', 'dunker-core' ),
				'description' => esc_html__( 'Enter side padding for sticky header area', 'dunker-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'dunker-core' ),
				),
			)
		);

		$sticky_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_sticky_header_background_color',
				'title'       => esc_html__( 'Sticky Header Background Color', 'dunker-core' ),
				'description' => esc_html__( 'Enter sticky header background color', 'dunker-core' ),
			)
		);
	}

	add_action( 'dunker_core_action_after_header_scroll_appearance_options_map', 'dunker_core_add_sticky_header_options', 10, 2 );
}

if ( ! function_exists( 'dunker_core_add_sticky_header_logo_options' ) ) {
	/**
	 * Function that add additional header logo options
	 *
	 * @param object $page
	 * @param array  $header_tab
	 * @param array  $logo_image_section
	 */
	function dunker_core_add_sticky_header_logo_options( $page, $header_tab, $logo_image_section ) {

		if ( $header_tab ) {
			$logo_image_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_sticky',
					'title'       => esc_html__( 'Logo - Sticky', 'dunker-core' ),
					'description' => esc_html__( 'Choose sticky logo image', 'dunker-core' ),
					'multiple'    => 'no',
				)
			);
		}
	}

	add_action( 'dunker_core_action_after_header_logo_image_section_options_map', 'dunker_core_add_sticky_header_logo_options', 10, 3 );
}

if ( ! function_exists( 'dunker_core_add_sticky_header_logo_svg_options' ) ) {
	/**
	 * Function that add additional header logo options
	 *
	 * @param object $page
	 * @param array  $header_tab
	 * @param array  $logo_svg_path_section
	 */
	function dunker_core_add_sticky_header_logo_svg_options( $page, $header_tab, $logo_svg_path_section ) {

		if ( $header_tab ) {
			$logo_svg_path_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_logo_sticky_svg_path',
					'title'       => esc_html__( 'Logo Sticky - SVG Path', 'dunker-core' ),
					'description' => esc_html__( 'Enter your logo icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'dunker-core' ),
				)
			);
		}
	}

	add_action( 'dunker_core_action_before_header_logo_svg_path_section_options_map', 'dunker_core_add_sticky_header_logo_svg_options', 10, 3 );
}
