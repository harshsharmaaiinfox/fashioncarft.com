<?php

if ( ! function_exists( 'dunker_core_add_pricing_table_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_pricing_table_variation_standard( $variations ) {

		$variations['standard'] = esc_html__( 'Standard', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_pricing_table_layouts', 'dunker_core_add_pricing_table_variation_standard' );
}
