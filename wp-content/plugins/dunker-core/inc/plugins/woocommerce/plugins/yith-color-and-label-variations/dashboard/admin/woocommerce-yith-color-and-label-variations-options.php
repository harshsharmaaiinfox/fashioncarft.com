<?php

if ( ! function_exists( 'dunker_core_add_yith_color_and_label_variations_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function dunker_core_add_yith_color_and_label_variations_options( $page ) {

		if ( $page ) {

			if ( qode_framework_is_installed( 'yith-color-and-label-variations' ) ) {

				$yith_color_and_label_variations_tab = $page->add_tab_element(
					array(
						'name'        => 'tab-yith-color-and-label-variations',
						'icon'        => 'fa fa-cog',
						'title'       => esc_html__( 'YITH Color and Label Variations', 'dunker-core' ),
						'description' => esc_html__( 'Settings related to YITH Color and Label Variations', 'dunker-core' ),
					)
				);

				$yith_color_and_label_variations_tab->add_field_element(
					array(
						'field_type'    => 'yesno',
						'name'          => 'qodef_enable_woo_yith_color_and_label_variations_predefined_style',
						'title'         => esc_html__( 'Enable Predefined Style', 'dunker-core' ),
						'description'   => esc_html__( 'Enabling this option will set predefined style for YITH Color and Label Variations plugin', 'dunker-core' ),
						'options'       => dunker_core_get_select_type_options_pool( 'no_yes', false ),
						'default_value' => 'yes',
					)
				);
			}
		}
	}

	add_action( 'dunker_core_action_after_woo_options_map', 'dunker_core_add_yith_color_and_label_variations_options' );
}
