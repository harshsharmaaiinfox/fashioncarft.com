<?php

if ( ! function_exists( 'dunker_core_add_text_marquee_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_text_marquee_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_text_marquee_layouts', 'dunker_core_add_text_marquee_variation_default' );
}
