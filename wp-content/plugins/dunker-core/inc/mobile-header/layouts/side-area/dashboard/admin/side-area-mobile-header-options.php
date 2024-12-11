<?php

if ( ! function_exists( 'dunker_core_add_side_area_mobile_header_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array  $general_tab
	 */
	function dunker_core_add_side_area_mobile_header_options( $page, $general_tab ) {

		$section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_side_area_mobile_header_section',
				'title'      => esc_html__( 'Side Area Mobile Header', 'dunker-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_mobile_header_layout' => array(
							'values'        => 'side-area',
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_side_area_mobile_header_height',
				'title'       => esc_html__( 'Header Height', 'dunker-core' ),
				'description' => esc_html__( 'Enter header height', 'dunker-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'dunker-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_side_area_mobile_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'dunker-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'dunker-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'dunker-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_side_area_mobile_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'dunker-core' ),
				'description' => esc_html__( 'Enter header background color', 'dunker-core' ),
			)
		);
	}

	add_action( 'dunker_core_action_after_mobile_header_options_map', 'dunker_core_add_side_area_mobile_header_options', 10, 2 );
}
