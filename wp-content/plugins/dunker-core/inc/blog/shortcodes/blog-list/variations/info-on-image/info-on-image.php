<?php

if ( ! function_exists( 'dunker_core_add_blog_list_variation_info_on_image' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_blog_list_variation_info_on_image( $variations ) {
		$variations['info-on-image'] = esc_html__( 'Info On Image', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_blog_list_layouts', 'dunker_core_add_blog_list_variation_info_on_image' );
}
