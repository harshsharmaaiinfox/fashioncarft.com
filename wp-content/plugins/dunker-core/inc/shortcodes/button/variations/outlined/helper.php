<?php

if ( ! function_exists( 'dunker_core_add_button_variation_outlined' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_button_variation_outlined( $variations ) {
		$variations['outlined'] = esc_html__( 'Outlined', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_button_layouts', 'dunker_core_add_button_variation_outlined' );
}
