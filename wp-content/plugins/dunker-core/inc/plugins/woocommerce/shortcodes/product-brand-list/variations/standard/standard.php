<?php

if ( ! function_exists( 'dunker_core_add_product_brand_list_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_product_brand_list_variation_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_product_brand_list_layouts', 'dunker_core_add_product_brand_list_variation_standard' );
}
