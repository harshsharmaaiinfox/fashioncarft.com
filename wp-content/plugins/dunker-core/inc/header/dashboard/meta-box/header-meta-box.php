<?php

if ( ! function_exists( 'dunker_core_add_page_header_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function dunker_core_add_page_header_meta_box( $page ) {

		if ( $page ) {

			$header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Header Settings', 'dunker-core' ),
					'description' => esc_html__( 'Header layout settings', 'dunker-core' ),
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_layout',
					'title'       => esc_html__( 'Header Layout', 'dunker-core' ),
					'description' => esc_html__( 'Choose a header layout to set for your website', 'dunker-core' ),
					'args'        => array( 'images' => true ),
					'options'     => dunker_core_header_radio_to_select_options( apply_filters( 'dunker_core_filter_header_layout_option', array() ) ),
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_skin',
					'title'       => esc_html__( 'Header Skin', 'dunker-core' ),
					'description' => esc_html__( 'Choose a predefined header style for header elements', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'header_skin' ),
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_show_header_widget_areas',
					'title'         => esc_html__( 'Show Header Widget Areas', 'dunker-core' ),
					'description'   => esc_html__( 'Choose if you want to show or hide header widget areas', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$custom_sidebars = dunker_core_get_custom_sidebars( true, true);
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {

				$section = $header_tab->add_section_element(
					array(
						'name'       => 'qodef_header_custom_widget_area_section',
						'dependency' => array(
							'show' => array(
								'qodef_show_header_widget_areas' => array(
									'values'        => 'yes',
									'default_value' => 'yes',
								),
							),
						),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_header_custom_widget_area_one',
						'title'       => esc_html__( 'Choose Custom Header Widget Area One', 'dunker-core' ),
						'description' => esc_html__( 'Choose custom widget area to display in header widget area one', 'dunker-core' ),
						'options'     => $custom_sidebars,
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_header_custom_widget_area_two',
						'title'       => esc_html__( 'Choose Custom Header Widget Area Two', 'dunker-core' ),
						'description' => esc_html__( 'Choose custom widget area to display in header widget area two', 'dunker-core' ),
						'options'     => $custom_sidebars,
					)
				);

				// Hook to include additional options after module options
				do_action( 'dunker_core_action_after_custom_widget_area_header_meta_map', $section, $custom_sidebars );
			}

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_page_header_meta_map', $header_tab, $custom_sidebars );
		}
	}

	add_action( 'dunker_core_action_after_general_meta_box_map', 'dunker_core_add_page_header_meta_box' );
}

if ( ! function_exists( 'dunker_core_add_general_header_meta_box_callback' ) ) {
	/**
	 * Function that set current meta box callback as general callback functions
	 *
	 * @param array $callbacks
	 *
	 * @return array
	 */
	function dunker_core_add_general_header_meta_box_callback( $callbacks ) {
		$callbacks['header'] = 'dunker_core_add_page_header_meta_box';

		return $callbacks;
	}

	add_filter( 'dunker_core_filter_general_meta_box_callbacks', 'dunker_core_add_general_header_meta_box_callback' );
}
