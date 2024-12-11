<?php
if ( ! function_exists( 'dunker_core_add_top_area_meta_options' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function dunker_core_add_top_area_meta_options( $page ) {
		$top_area_section = $page->add_section_element(
			array(
				'name'       => 'qodef_top_area_section',
				'title'      => esc_html__( 'Top Area', 'dunker-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => dunker_core_dependency_for_top_area_options(),
							'default_value' => '',
						),
					),
				),
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_message_header',
				'title'       => esc_html__( 'Top Area Message', 'dunker-core' ),
				'description' => esc_html__( 'Enable top area message', 'dunker-core' ),
				'options'     => dunker_core_get_select_type_options_pool( 'yes_no' ),
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
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_skin',
				'title'       => esc_html__( 'Top Area Skin', 'dunker-core' ),
				'description' => esc_html__( 'Choose a predefined color scheme for top area elements', 'dunker-core' ),
				'options'     => dunker_core_get_select_type_options_pool( 'header_skin' ),
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

		$top_area_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header',
				'title'       => esc_html__( 'Top Area', 'dunker-core' ),
				'description' => esc_html__( 'Enable top area', 'dunker-core' ),
				'options'     => dunker_core_get_select_type_options_pool( 'yes_no' ),
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
				'field_type'    => 'select',
				'name'          => 'qodef_top_area_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'dunker-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'dunker-core' ),
				'options'       => dunker_core_get_select_type_options_pool( 'no_yes' ),
				'default_value' => '',
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

		$custom_sidebars = dunker_core_get_custom_sidebars( true, true);
		if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
			$top_area_options_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_top_area_header_custom_widget_area_left',
					'title'       => esc_html__( 'Choose Custom Left Widget Area for Top Area Header', 'dunker-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in top area header inside left widget area', 'dunker-core' ),
					'options'     => $custom_sidebars,
				)
			);

			$top_area_options_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_top_area_header_custom_widget_area_right',
					'title'       => esc_html__( 'Choose Custom Right Widget Area for Top Area Header', 'dunker-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in top area header inside right widget area', 'dunker-core' ),
					'options'     => $custom_sidebars,
				)
			);
		}
	}

	add_action( 'dunker_core_action_after_page_header_meta_map', 'dunker_core_add_top_area_meta_options', 20 );
}
