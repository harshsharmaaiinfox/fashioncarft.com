<?php

if ( ! function_exists( 'dunker_core_add_top_area_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_header_tab
	 */
	function dunker_core_add_top_area_options( $page, $general_header_tab ) {

		$top_area_section = $general_header_tab->add_section_element(
			array(
				'name'        => 'qodef_top_area_section',
				'title'       => esc_html__( 'Top Area', 'dunker-core' ),
				'description' => esc_html__( 'Options related to top area', 'dunker-core' ),
				'dependency'  => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => dunker_core_dependency_for_top_area_options(),
							'default_value' => apply_filters( 'dunker_core_filter_header_layout_default_option_value', '' ),
						),
					),
				),
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'default_value' => 'no',
				'name'          => 'qodef_top_area_message_header',
				'title'         => esc_html__( 'Top Area Message', 'dunker-core' ),
				'description'   => esc_html__( 'Enable top area message', 'dunker-core' ),
			)
		);

		$top_area_message_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_message_options_section',
				'title'       => esc_html__( 'Top Area Message Options', 'dunker-core' ),
				'description' => esc_html__( 'Set desired values for top area message', 'dunker-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_message_header' => array(
							'values'        => 'yes',
							'default_value' => 'no',
						),
					),
				),
			)
		);

		$top_area_message_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_message_skin',
				'title'       => esc_html__( 'Top Area Message Skin', 'dunker-core' ),
				'description' => esc_html__( 'Choose a predefined color scheme for top area message elements', 'dunker-core' ),
				'options'     => dunker_core_get_select_type_options_pool( 'header_skin' ),
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_message',
				'title'      => esc_html__( 'Top Area Message Text', 'dunker-core' ),
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_message_link',
				'title'      => esc_html__( 'Top Area Message Link', 'dunker-core' ),
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'default_value' => 'no',
				'name'          => 'qodef_top_area_header',
				'title'         => esc_html__( 'Top Area', 'dunker-core' ),
				'description'   => esc_html__( 'Enable top area', 'dunker-core' ),
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'dunker-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'dunker-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no',
						),
					),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_top_area_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'dunker-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'dunker-core' ),
				'default_value' => 'no',
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'dunker-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'dunker-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'dunker-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'dunker-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'dunker-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_set_top_area_header_content_alignment',
				'title'       => esc_html__( 'Content Alignment', 'dunker-core' ),
				'description' => esc_html__( 'Set widgets content alignment inside top header area', 'dunker-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'dunker-core' ),
					'center' => esc_html__( 'Center', 'dunker-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_skin',
				'title'       => esc_html__( 'Top Area Skin', 'dunker-core' ),
				'description' => esc_html__( 'Choose a predefined color scheme for top area elements', 'dunker-core' ),
				'options'     => dunker_core_get_select_type_options_pool( 'header_skin' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'dunker-core' ),
				'description' => esc_html__( 'Choose top area background color', 'dunker-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_border_color',
				'title'       => esc_html__( 'Top Area Border Color', 'dunker-core' ),
				'description' => esc_html__( 'Enter top area border color', 'dunker-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_border_width',
				'title'       => esc_html__( 'Top Area Border Width', 'dunker-core' ),
				'description' => esc_html__( 'Enter top area border width size', 'dunker-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'dunker-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header_border_style',
				'title'       => esc_html__( 'Top Area Border Style', 'dunker-core' ),
				'description' => esc_html__( 'Choose top area border style', 'dunker-core' ),
				'options'     => dunker_core_get_select_type_options_pool( 'border_style' ),
			)
		);
	}

	add_action( 'dunker_core_action_after_header_options_map', 'dunker_core_add_top_area_options', 20, 2 );
}
