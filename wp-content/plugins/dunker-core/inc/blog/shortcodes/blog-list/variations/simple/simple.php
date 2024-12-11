<?php

if ( ! function_exists( 'dunker_core_add_blog_list_variation_simple' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_blog_list_variation_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_blog_list_layouts', 'dunker_core_add_blog_list_variation_simple' );
}

if ( ! function_exists( 'dunker_core_blog_list_hide_excerpt_length_option' ) ) {
	function dunker_core_blog_list_hide_excerpt_length_option( $layouts ) {
		$layouts[] = 'simple';

		return $layouts;
	}

	add_filter( 'dunker_core_filter_blog_list_hide_excerpt_length_option', 'dunker_core_blog_list_hide_excerpt_length_option' );
}
