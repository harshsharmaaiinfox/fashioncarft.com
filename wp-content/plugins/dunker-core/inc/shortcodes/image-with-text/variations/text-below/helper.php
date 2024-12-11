<?php

if ( ! function_exists( 'dunker_core_add_image_with_text_variation_text_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_image_with_text_variation_text_below( $variations ) {
		$variations['text-below'] = esc_html__( 'Text Below', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_image_with_text_layouts', 'dunker_core_add_image_with_text_variation_text_below' );
}
