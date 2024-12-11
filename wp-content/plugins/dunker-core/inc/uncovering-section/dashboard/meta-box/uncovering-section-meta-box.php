<?php

if ( ! function_exists( 'dunker_core_add_uncovering_section_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_uncovering_section_meta_box( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_uncovering_section',
					'title'         => esc_html__( 'Uncovering Last Section', 'dunker-core' ),
					'description'   => esc_html__( 'Works only with Elementor on pages with disabled footer', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => 'no',
				)
			);
		}
	}

	add_action( 'dunker_core_action_after_general_page_meta_box_map', 'dunker_core_add_uncovering_section_meta_box', 9 );
}
