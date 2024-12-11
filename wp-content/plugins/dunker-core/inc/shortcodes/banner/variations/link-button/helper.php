<?php

if ( ! function_exists( 'dunker_core_add_banner_variation_link_button' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_banner_variation_link_button( $variations ) {
		$variations['link-button'] = esc_html__( 'Link Button', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_banner_layouts', 'dunker_core_add_banner_variation_link_button' );
}
