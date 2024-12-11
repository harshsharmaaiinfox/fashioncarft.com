<?php

if ( ! function_exists( 'dunker_core_add_page_footer_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_page_footer_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => DUNKER_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'footer',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Footer', 'dunker-core' ),
				'description' => esc_html__( 'Global Footer Options', 'dunker-core' ),
			)
		);

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_footer',
					'title'         => esc_html__( 'Enable Page Footer', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page footer', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$page_footer_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_footer_section',
					'title'      => esc_html__( 'Footer Area', 'dunker-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_footer' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			// General Footer Area Options

			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_uncovering_footer',
					'title'         => esc_html__( 'Enable Uncovering Footer', 'dunker-core' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'dunker-core' ),
					'default_value' => 'no',
				)
			);

			// Top Footer Area Section

			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_top_footer_area',
					'title'         => esc_html__( 'Enable Top Footer Area', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable top footer area', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$top_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_top_footer_area_section',
					'title'      => esc_html__( 'Top Footer Area', 'dunker-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_top_footer_area' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_footer_top_area_in_grid',
					'title'         => esc_html__( 'Top Footer Area In Grid', 'dunker-core' ),
					'description'   => esc_html__( 'Enabling this option will set page top footer area to be in grid', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_top_area_columns',
					'title'         => esc_html__( 'Top Footer Area Columns', 'dunker-core' ),
					'description'   => esc_html__( 'Choose number of columns for top footer area', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'columns_number', true, array( '5', '6' ) ),
					'default_value' => '4',
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_top_area_grid_gutter',
					'title'       => esc_html__( 'Top Footer Area Grid Gutter', 'dunker-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between columns for top footer area', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_top_area_content_alignment',
					'title'       => esc_html__( 'Content Alignment', 'dunker-core' ),
					'description' => esc_html__( 'Set widgets content alignment inside top footer area', 'dunker-core' ),
					'options'     => array(
						''       => esc_html__( 'Default', 'dunker-core' ),
						'left'   => esc_html__( 'Left', 'dunker-core' ),
						'center' => esc_html__( 'Center', 'dunker-core' ),
						'right'  => esc_html__( 'Right', 'dunker-core' ),
					),
				)
			);

			$top_footer_area_styles_section = $top_footer_area_section->add_section_element(
				array(
					'name'  => 'qodef_top_footer_area_styles_section',
					'title' => esc_html__( 'Top Footer Area Styles', 'dunker-core' ),
				)
			);

			$top_footer_area_styles_row = $top_footer_area_styles_section->add_row_element(
				array(
					'name'  => 'qodef_top_footer_area_styles_row',
					'title' => '',
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_footer_top_skin',
					'title'       => esc_html__( 'Footer Top Skin', 'dunker-core' ),
					'description' => esc_html__( 'Choose a predefined style for footer top elements', 'dunker-core' ),
					'options'     => array(
						'none'  => esc_html__( 'None', 'dunker-core' ),
						'light' => esc_html__( 'Light', 'dunker-core' ),
						'dark'  => esc_html__( 'Dark', 'dunker-core' ),
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_padding_top',
					'title'      => esc_html__( 'Padding Top', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_padding_bottom',
					'title'      => esc_html__( 'Padding Bottom', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_side_padding',
					'title'      => esc_html__( 'Side Padding', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_top_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_top_footer_area_background_image',
					'title'      => esc_html__( 'Background Image', 'dunker-core' ),
					'args'       => array(
						'col_width' => 12,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_top_footer_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_top_footer_area_top_border_width',
					'title'      => esc_html__( 'Top Border Width', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => esc_html__( 'px', 'dunker-core' ),
					),
				)
			);

			$top_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_top_footer_area_top_border_style',
					'title'      => esc_html__( 'Top Border Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'border_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$top_footer_area_styles_row_2 = $top_footer_area_styles_section->add_row_element(
				array(
					'name'  => 'qodef_top_footer_area_styles_row_2',
					'title' => '',
				)
			);

			$top_footer_area_styles_row_2->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_top_footer_area_widgets_margin_bottom',
					'title'       => esc_html__( 'Widgets Margin Bottom', 'dunker-core' ),
					'description' => esc_html__( 'Set space value between widgets', 'dunker-core' ),
					'args'        => array(
						'col_width' => 4,
					),
				)
			);

			$top_footer_area_styles_row_2->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_top_footer_area_widgets_title_margin_bottom',
					'title'       => esc_html__( 'Widgets Title Margin Bottom', 'dunker-core' ),
					'description' => esc_html__( 'Set space value between widget title and widget content', 'dunker-core' ),
					'args'        => array(
						'col_width' => 4,
					),
				)
			);

			// Middle Footer Area Section

			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_middle_footer_area',
					'title'         => esc_html__( 'Enable Middle Footer Area', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable middle footer area', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$middle_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_middle_footer_area_section',
					'title'      => esc_html__( 'Middle Footer Area', 'dunker-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_middle_footer_area' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$middle_footer_area_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_footer_middle_area_in_grid',
					'title'         => esc_html__( 'Middle Footer Area In Grid', 'dunker-core' ),
					'description'   => esc_html__( 'Enabling this option will set page middle footer area to be in grid', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$middle_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_middle_area_columns',
					'title'         => esc_html__( 'Middle Footer Area Columns', 'dunker-core' ),
					'description'   => esc_html__( 'Choose number of columns for middle footer area', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'columns_number', true, array( '5', '6' ) ),
					'default_value' => '2',
				)
			);

			$top_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_top_area_columns_proportion',
					'title'         => esc_html__( 'Top Footer Area Columns Proportion', 'dunker-core' ),
					'options'       => array(
						'equal'  => esc_html__( '1/3 1/3 1/3', 'dunker-core' ),
						'custom'  => esc_html__( '1/4 1/4 1/2', 'dunker-core' ),
					),
					'default_value' => 'equal',
					'dependency' => array (
						'show' => array (
							'qodef_set_footer_top_area_columns' => array (
								'values'        => '3',
								'default_value' => '',
							),
						),
					),
				)
			);

            $middle_footer_area_section->add_field_element(
                array(
                    'field_type'    => 'select',
                    'name'          => 'qodef_set_footer_middle_area_columns_proportion',
                    'title'         => esc_html__( 'Middle Footer Area Columns Proportion', 'dunker-core' ),
                    'options'       => array(
                        'equal'  => esc_html__( 'Equal width', 'dunker-core' ),
                        'custom'  => esc_html__( '50% 25% 25%', 'dunker-core' ),),
                    'default_value' => 'equal',
                    'dependency' => array (
                        'show' => array (
                            'qodef_set_footer_middle_area_columns' => array (
                                'values'        => '3',
                                'default_value' => '',
                            ),
                        ),
                    ),
                )
            );

			$middle_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_middle_area_grid_gutter',
					'title'       => esc_html__( 'Middle Footer Area Grid Gutter', 'dunker-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between columns for middle footer area', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$middle_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_middle_area_content_alignment',
					'title'       => esc_html__( 'Content Alignment', 'dunker-core' ),
					'description' => esc_html__( 'Set widgets content alignment inside middle footer area', 'dunker-core' ),
					'options'     => array(
						''              => esc_html__( 'Default', 'dunker-core' ),
						'left'          => esc_html__( 'Left', 'dunker-core' ),
						'center'        => esc_html__( 'Center', 'dunker-core' ),
						'right'         => esc_html__( 'Right', 'dunker-core' ),
						'split'         => esc_html__( 'Split', 'dunker-core' ),
					),
				)
			);

			$middle_footer_area_styles_section = $middle_footer_area_section->add_section_element(
				array(
					'name'  => 'qodef_middle_footer_area_styles_section',
					'title' => esc_html__( 'Middle Footer Area Styles', 'dunker-core' ),
				)
			);

			$middle_footer_area_styles_row = $middle_footer_area_styles_section->add_row_element(
				array(
					'name'  => 'qodef_middle_footer_area_styles_row',
					'title' => '',
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_footer_middle_skin',
					'title'       => esc_html__( 'Footer Middle Skin', 'dunker-core' ),
					'description' => esc_html__( 'Choose a predefined style for footer middle elements', 'dunker-core' ),
					'options'     => array(
						'none'  => esc_html__( 'None', 'dunker-core' ),
						'light' => esc_html__( 'Light', 'dunker-core' ),
						'dark'  => esc_html__( 'Dark', 'dunker-core' ),
					),
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_middle_footer_area_padding_top',
					'title'      => esc_html__( 'Padding Top', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_middle_footer_area_padding_bottom',
					'title'      => esc_html__( 'Padding Bottom', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_middle_footer_area_side_padding',
					'title'      => esc_html__( 'Side Padding', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_middle_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_middle_footer_area_background_image',
					'title'      => esc_html__( 'Background Image', 'dunker-core' ),
					'args'       => array(
						'col_width' => 12,
					),
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_middle_footer_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_middle_footer_area_top_border_width',
					'title'      => esc_html__( 'Top Border Width', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => esc_html__( 'px', 'dunker-core' ),
					),
				)
			);

			$middle_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_middle_footer_area_top_border_style',
					'title'      => esc_html__( 'Top Border Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'border_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			// Bottom Footer Area Section

			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_bottom_footer_area',
					'title'         => esc_html__( 'Enable Bottom Footer Area', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable bottom footer area', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$bottom_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_bottom_footer_area_section',
					'title'      => esc_html__( 'Bottom Footer Area', 'dunker-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_bottom_footer_area' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_footer_bottom_area_in_grid',
					'title'         => esc_html__( 'Bottom Footer Area In Grid', 'dunker-core' ),
					'description'   => esc_html__( 'Enabling this option will set page bottom footer area to be in grid', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_bottom_area_columns',
					'title'         => esc_html__( 'Bottom Footer Area Columns', 'dunker-core' ),
					'description'   => esc_html__( 'Choose number of columns for bottom footer area', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'columns_number', true, array( '3', '4', '5', '6' ) ),
					'default_value' => '2',
				)
			);

			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_bottom_area_grid_gutter',
					'title'       => esc_html__( 'Bottom Footer Area Grid Gutter', 'dunker-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between columns for bottom footer area', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_bottom_area_content_alignment',
					'title'       => esc_html__( 'Content Alignment', 'dunker-core' ),
					'description' => esc_html__( 'Set widgets content alignment inside bottom footer area', 'dunker-core' ),
					'options'     => array(
						''              => esc_html__( 'Default', 'dunker-core' ),
						'left'          => esc_html__( 'Left', 'dunker-core' ),
						'center'        => esc_html__( 'Center', 'dunker-core' ),
						'right'         => esc_html__( 'Right', 'dunker-core' ),
						'space-between' => esc_html__( 'Space Between', 'dunker-core' ),
					),
				)
			);

			$bottom_footer_area_styles_section = $bottom_footer_area_section->add_section_element(
				array(
					'name'  => 'qodef_bottom_footer_area_styles_section',
					'title' => esc_html__( 'Bottom Footer Area Styles', 'dunker-core' ),
				)
			);

			$bottom_footer_area_styles_row = $bottom_footer_area_styles_section->add_row_element(
				array(
					'name'  => 'qodef_bottom_footer_area_styles_row',
					'title' => '',
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_footer_bottom_skin',
					'title'       => esc_html__( 'Footer Bottom Skin', 'dunker-core' ),
					'description' => esc_html__( 'Choose a predefined style for footer bottom elements', 'dunker-core' ),
					'options'     => array(
						'none'  => esc_html__( 'None', 'dunker-core' ),
						'light' => esc_html__( 'Light', 'dunker-core' ),
						'dark'  => esc_html__( 'Dark', 'dunker-core' ),
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_padding_top',
					'title'      => esc_html__( 'Padding Top', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_padding_bottom',
					'title'      => esc_html__( 'Padding Bottom', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_side_padding',
					'title'      => esc_html__( 'Side Padding', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_bottom_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_bottom_footer_area_background_image',
					'title'      => esc_html__( 'Background Image', 'dunker-core' ),
					'args'       => array(
						'col_width' => 12,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_bottom_footer_area_top_border_color',
					'title'      => esc_html__( 'Top Border Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_footer_area_top_border_width',
					'title'      => esc_html__( 'Top Border Width', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => esc_html__( 'px', 'dunker-core' ),
					),
				)
			);

			$bottom_footer_area_styles_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_bottom_footer_area_top_border_style',
					'title'      => esc_html__( 'Top Border Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'border_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_page_footer_options_map', $page );
		}
	}

	add_action( 'dunker_core_action_default_options_init', 'dunker_core_add_page_footer_options', dunker_core_get_admin_options_map_position( 'footer' ) );
}
