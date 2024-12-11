<?php

if ( ! function_exists( 'dunker_core_add_custom_font_variation_simple' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_custom_font_variation_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_custom_font_layouts', 'dunker_core_add_custom_font_variation_simple' );
}
