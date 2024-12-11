<?php

if ( ! function_exists( 'dunker_core_add_button_variation_filled' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_button_variation_filled( $variations ) {
		$variations['filled'] = esc_html__( 'Filled', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_button_layouts', 'dunker_core_add_button_variation_filled' );
}
