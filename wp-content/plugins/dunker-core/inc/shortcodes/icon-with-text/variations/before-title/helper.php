<?php

if ( ! function_exists( 'dunker_core_add_icon_with_text_variation_before_title' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_icon_with_text_variation_before_title( $variations ) {
		$variations['before-title'] = esc_html__( 'Before Title', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_icon_with_text_layouts', 'dunker_core_add_icon_with_text_variation_before_title' );
}
