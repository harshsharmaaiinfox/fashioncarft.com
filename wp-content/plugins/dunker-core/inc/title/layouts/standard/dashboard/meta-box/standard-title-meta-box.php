<?php

if ( ! function_exists( 'dunker_core_add_standard_title_layout_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_standard_title_layout_meta_box( $page ) {

		if ( $page ) {
			$section = $page->add_section_element(
				array(
					'name'       => 'qodef_standard_title_section',
					'title'      => esc_html__( 'Standard Title', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_title_layout' => array(
								'values'        => array( '', 'standard' ),
								'default_value' => '',
							),
						),
					),
				)
			);

			$section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_page_title_subtitle',
					'title'      => esc_html__( 'Subtitle', 'dunker-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_subtitle_color',
					'title'      => esc_html__( 'Subtitle Color', 'dunker-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_page_title_subtitle_top_margin',
					'title'      => esc_html__( 'Subtitle Top Margin', 'dunker-core' ),
					'args'       => array(
						'suffix' => esc_html__( 'px', 'dunker-core' ),
					),
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_standard_title_layout_meta_box_map', $section );
		}
	}

	add_action( 'dunker_core_action_after_page_title_meta_box_map', 'dunker_core_add_standard_title_layout_meta_box' );
}
