<?php

if ( ! function_exists( 'dunker_core_filter_portfolio_list_info_follow' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_filter_portfolio_list_info_follow( $variations ) {
		$variations['follow'] = esc_html__( 'Follow', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_portfolio_list_info_follow_animation_options', 'dunker_core_filter_portfolio_list_info_follow' );
}
