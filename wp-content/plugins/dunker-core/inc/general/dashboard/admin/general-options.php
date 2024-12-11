<?php

if ( ! function_exists( 'dunker_core_add_general_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_general_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_main_color',
					'title'       => esc_html__( 'Main Color', 'dunker-core' ),
					'description' => esc_html__( 'Choose the most dominant theme color', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_background_color',
					'title'       => esc_html__( 'Page Background Color', 'dunker-core' ),
					'description' => esc_html__( 'Set background color', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_background_image',
					'title'       => esc_html__( 'Page Background Image', 'dunker-core' ),
					'description' => esc_html__( 'Set background image', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_background_repeat',
					'title'       => esc_html__( 'Page Background Image Repeat', 'dunker-core' ),
					'description' => esc_html__( 'Set background image repeat', 'dunker-core' ),
					'options'     => array(
						''          => esc_html__( 'Default', 'dunker-core' ),
						'no-repeat' => esc_html__( 'No Repeat', 'dunker-core' ),
						'repeat'    => esc_html__( 'Repeat', 'dunker-core' ),
						'repeat-x'  => esc_html__( 'Repeat-x', 'dunker-core' ),
						'repeat-y'  => esc_html__( 'Repeat-y', 'dunker-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_background_size',
					'title'       => esc_html__( 'Page Background Image Size', 'dunker-core' ),
					'description' => esc_html__( 'Set background image size', 'dunker-core' ),
					'options'     => array(
						''        => esc_html__( 'Default', 'dunker-core' ),
						'contain' => esc_html__( 'Contain', 'dunker-core' ),
						'cover'   => esc_html__( 'Cover', 'dunker-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_background_attachment',
					'title'       => esc_html__( 'Page Background Image Attachment', 'dunker-core' ),
					'description' => esc_html__( 'Set background image attachment', 'dunker-core' ),
					'options'     => array(
						''       => esc_html__( 'Default', 'dunker-core' ),
						'fixed'  => esc_html__( 'Fixed', 'dunker-core' ),
						'scroll' => esc_html__( 'Scroll', 'dunker-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding',
					'title'       => esc_html__( 'Page Content Padding', 'dunker-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding_mobile',
					'title'       => esc_html__( 'Page Content Padding Mobile', 'dunker-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_boxed',
					'title'         => esc_html__( 'Boxed Layout', 'dunker-core' ),
					'description'   => esc_html__( 'Set boxed layout', 'dunker-core' ),
					'default_value' => 'no',
				)
			);

			$boxed_section = $page->add_section_element(
				array(
					'name'       => 'qodef_boxed_section',
					'title'      => esc_html__( 'Boxed Layout Section', 'dunker-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_boxed' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$boxed_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_boxed_background_color',
					'title'       => esc_html__( 'Boxed Background Color', 'dunker-core' ),
					'description' => esc_html__( 'Set boxed background color', 'dunker-core' ),
				)
			);

			$boxed_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_boxed_background_pattern',
					'title'       => esc_html__( 'Boxed Background Pattern', 'dunker-core' ),
					'description' => esc_html__( 'Set boxed background pattern', 'dunker-core' ),
				)
			);

			$boxed_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_boxed_background_pattern_behavior',
					'title'       => esc_html__( 'Boxed Background Pattern Behavior', 'dunker-core' ),
					'description' => esc_html__( 'Set boxed background pattern behavior', 'dunker-core' ),
					'options'     => array(
						'fixed'  => esc_html__( 'Fixed', 'dunker-core' ),
						'scroll' => esc_html__( 'Scroll', 'dunker-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_passepartout',
					'title'         => esc_html__( 'Passepartout', 'dunker-core' ),
					'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'dunker-core' ),
					'default_value' => 'no',
				)
			);

			$passepartout_section = $page->add_section_element(
				array(
					'name'       => 'qodef_passepartout_section',
					'title'      => esc_html__( 'Passepartout Section', 'dunker-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_passepartout' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$passepartout_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_passepartout_color',
					'title'       => esc_html__( 'Passepartout Color', 'dunker-core' ),
					'description' => esc_html__( 'Choose background color for passepartout', 'dunker-core' ),
				)
			);

			$passepartout_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_passepartout_image',
					'title'       => esc_html__( 'Passepartout Background Image', 'dunker-core' ),
					'description' => esc_html__( 'Set background image for passepartout', 'dunker-core' ),
				)
			);

			$passepartout_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_passepartout_size',
					'title'       => esc_html__( 'Passepartout Size', 'dunker-core' ),
					'description' => esc_html__( 'Enter size amount for passepartout', 'dunker-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px or %', 'dunker-core' ),
					),
				)
			);

			$passepartout_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_passepartout_size_responsive',
					'title'       => esc_html__( 'Passepartout Responsive Size', 'dunker-core' ),
					'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1024px and below)', 'dunker-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px or %', 'dunker-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_content_width',
					'title'         => esc_html__( 'Initial Width of Content', 'dunker-core' ),
					'description'   => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'content_width', false ),
					'default_value' => '1400',
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_general_options_map', $page );

			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_custom_js',
					'title'       => esc_html__( 'Custom JS', 'dunker-core' ),
					'description' => esc_html__( 'Enter your custom JavaScript here', 'dunker-core' ),
				)
			);
		}
	}

	add_action( 'dunker_core_action_default_options_init', 'dunker_core_add_general_options', dunker_core_get_admin_options_map_position( 'general' ) );
}
