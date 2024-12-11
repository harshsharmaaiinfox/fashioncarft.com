<?php

if ( ! function_exists( 'dunker_core_add_page_content_bottom_meta_box' ) ) {
	/**
	 * function that add general options for this module
	 */
	function dunker_core_add_page_content_bottom_meta_box( $page ) {

		if ( $page ) {
			$custom_sidebars = dunker_core_get_custom_sidebars( true, true );

			$content_bottom_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-content-bottom',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Content bottom Settings', 'dunker-core' ),
					'description' => esc_html__( 'Content bottom layout settings', 'dunker-core' )
				)
			);

			$content_bottom_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_enable_page_content_bottom',
					'title'         => esc_html__( 'Enable Page Content Bottom', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page content bottom area', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => ''
				)
			);

			$page_content_bottom_section = $content_bottom_tab->add_section_element(
				array(
					'name'       => 'qodef_page_content_bottom_section',
					'title'      => esc_html__( 'Content Bottom Area', 'dunker-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_content_bottom' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_content_bottom_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_content_bottom_area_in_grid',
					'title'       => esc_html__( 'Content Bottom Area in Grid', 'dunker-core' ),
					'description' => esc_html__( 'Enabling this option will set page content bottom area to be in grid', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'no_yes' )
				)
			);

            $page_content_bottom_section->add_field_element(
                array(
                    'field_type'  => 'color',
                    'name'        => 'qodef_content_bottom_background',
                    'title'       => esc_html__( 'Content Bottom Background Color', 'dunker-core' )
                )
            );

			$page_content_bottom_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_content_bottom_skin',
					'title'       => esc_html__( 'Content Bottom Skin', 'dunker-core' ),
					'description' => esc_html__( 'Choose a predefined style for content bottom elements', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'header_skin' ),
				)
			);

            $page_content_bottom_section->add_field_element(
                array(
                    'field_type'  => 'text',
                    'name'        => 'qodef_content_bottom_side_padding',
                    'title'       => esc_html__( 'Add Content Bottom Side Padding', 'dunker-core' )
                )
            );

			if ( ! empty( $custom_sidebars ) ) {
				$page_content_bottom_section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_content_bottom_custom_sidebar',
						'title'       => esc_html__( 'Content Bottom Sidebars', 'dunker-core' ),
						'description' => esc_html__( 'Enabling this option will set page content bottom sidebar', 'dunker-core' ),
						'options'     => $custom_sidebars
					)
				);
			}

			// hook to include additional options after module options
			do_action( 'dunker_core_action_after_page_content_bottom_meta_box_map', $content_bottom_tab );
		}
	}

	add_action( 'dunker_core_action_after_general_meta_box_map', 'dunker_core_add_page_content_bottom_meta_box', 20 );
}