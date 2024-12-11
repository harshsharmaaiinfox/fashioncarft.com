<?php

if ( ! function_exists( 'dunker_core_add_social_share_variation_list' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_social_share_variation_list( $variations ) {
		$variations['list'] = esc_html__( 'List', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_social_share_layouts', 'dunker_core_add_social_share_variation_list' );
	add_filter( 'dunker_core_filter_social_share_layout_options', 'dunker_core_add_social_share_variation_list' );
}
