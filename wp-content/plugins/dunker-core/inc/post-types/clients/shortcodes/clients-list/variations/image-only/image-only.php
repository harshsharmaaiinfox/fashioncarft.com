<?php

if ( ! function_exists( 'dunker_core_add_clients_list_variation_image_only' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_clients_list_variation_image_only( $variations ) {
		$variations['image-only'] = esc_html__( 'Image Only', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_clients_list_layouts', 'dunker_core_add_clients_list_variation_image_only' );
}
