<?php

if ( ! function_exists( 'dunker_core_add_portfolio_list_variation_info_follow' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_portfolio_list_variation_info_follow( $variations ) {
		$variations['info-follow'] = esc_html__( 'Info Follow', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_portfolio_list_layouts', 'dunker_core_add_portfolio_list_variation_info_follow' );
}
