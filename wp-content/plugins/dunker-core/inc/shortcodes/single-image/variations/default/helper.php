<?php

if ( ! function_exists( 'dunker_core_add_single_image_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_single_image_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_single_image_layouts', 'dunker_core_add_single_image_variation_default' );
}
