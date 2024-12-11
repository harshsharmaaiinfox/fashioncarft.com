<?php

if ( ! function_exists( 'dunker_core_add_banner_variation_link_overlay' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_banner_variation_link_overlay( $variations ) {
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_banner_layouts', 'dunker_core_add_banner_variation_link_overlay' );
}
