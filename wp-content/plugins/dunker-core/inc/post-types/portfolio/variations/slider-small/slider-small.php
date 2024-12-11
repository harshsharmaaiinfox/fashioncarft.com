<?php

if ( ! function_exists( 'dunker_core_add_portfolio_single_variation_slider_small' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_portfolio_single_variation_slider_small( $variations ) {
		$variations['slider-small'] = esc_html__( 'Slider - Small', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_portfolio_single_layout_options', 'dunker_core_add_portfolio_single_variation_slider_small' );
}
