<?php

if ( ! function_exists( 'dunker_core_add_back_to_top_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_back_to_top_meta_box( $general_tab ) {

		if ( $general_tab ) {
			$general_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_back_to_top',
					'title'       => esc_html__( 'Enable Back to Top', 'dunker-core' ),
					'description' => esc_html__( 'Enable Back to Top element', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'yes_no' ),
				)
			);
		}
	}

	add_action( 'dunker_core_action_after_general_page_meta_box_map', 'dunker_core_add_back_to_top_meta_box' );
}
