<?php

if ( ! function_exists( 'dunker_core_filter_portfolio_list_info_below_image_zoom' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_filter_portfolio_list_info_below_image_zoom( $variations ) {
		$variations['image-zoom'] = esc_html__( 'Image Zoom', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_portfolio_list_info_below_animation_options', 'dunker_core_filter_portfolio_list_info_below_image_zoom' );
}
