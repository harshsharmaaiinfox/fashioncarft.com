<?php

if ( ! function_exists( 'dunker_core_add_standard_mobile_header_meta' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function dunker_core_add_standard_mobile_header_meta( $page ) {

		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_standard_mobile_header_section',
				'title'      => esc_html__( 'Standard Mobile Header', 'dunker-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_mobile_header_layout' => array(
							'values'        => array( '', 'standard' ),
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_mobile_header_height',
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
				'name'        => 'qodef_standard_mobile_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'dunker-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'dunker-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'dunker-core' ),
				),
				'dependency'  => array(
					'show' => array(
						'qodef_mobile_header_in_grid' => array(
							'values'        => 'no',
							'default_value' => 'no',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_mobile_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'dunker-core' ),
				'description' => esc_html__( 'Enter header background color', 'dunker-core' ),
			)
		);

        $section->add_field_element(
            array(
                'field_type'  => 'color',
                'name'        => 'qodef_standard_mobile_header_border_color',
                'title'       => esc_html__( 'Mobile Header Border Color', 'dunker-core' ),
                'description' => esc_html__( 'Enter header border color', 'dunker-core' ),
            )
        );

        $section->add_field_element(
            array(
                'field_type'  => 'text',
                'name'        => 'qodef_standard_mobile_header_border_width',
                'title'       => esc_html__( 'Mobile Header Border Width', 'dunker-core' ),
                'description' => esc_html__( 'Enter header border width size', 'dunker-core' ),
                'args'        => array(
                    'suffix' => esc_html__( 'px', 'dunker-core' ),
                ),
            )
        );

        $section->add_field_element(
            array(
                'field_type'  => 'select',
                'name'        => 'qodef_standard_mobile_header_border_style',
                'title'       => esc_html__( 'Mobile Header Border Style', 'dunker-core' ),
                'description' => esc_html__( 'Choose header border style', 'dunker-core' ),
                'options'     => dunker_core_get_select_type_options_pool( 'border_style' ),
            )
        );
	}

	add_action( 'dunker_core_action_after_page_mobile_header_meta_map', 'dunker_core_add_standard_mobile_header_meta', 10, 2 );
}
