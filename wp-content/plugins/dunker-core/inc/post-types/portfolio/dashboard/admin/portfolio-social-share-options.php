<?php

if ( ! function_exists( 'dunker_core_add_portfolio_social_share_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_portfolio_social_share_options( $cpt_tab ) {

		if ( $cpt_tab ) {
			$cpt_tab->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_portfolio_enable_social_share',
					'title'         => esc_html__( 'Enable Social Share For Portfolio', 'dunker-core' ),
					'description'   => esc_html__( 'Enable this option to display social share sections on Portfolio singles and certain lists by default', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);
		}
	}

	add_action( 'dunker_core_action_after_social_share_cpt_options_map', 'dunker_core_add_portfolio_social_share_options' );
}
