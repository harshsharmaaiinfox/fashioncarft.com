<?php

if ( ! function_exists( 'dunker_core_filter_portfolio_list_info_on_hover_fade_in' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_filter_portfolio_list_info_on_hover_fade_in( $variations ) {
		$variations['fade-in'] = esc_html__( 'Fade In', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_portfolio_list_info_on_hover_animation_options', 'dunker_core_filter_portfolio_list_info_on_hover_fade_in' );
}
