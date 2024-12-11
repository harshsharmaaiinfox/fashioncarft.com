<?php

if ( ! function_exists( 'dunker_core_filter_clients_list_image_only_fade' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_filter_clients_list_image_only_fade( $variations ) {
		$variations['fade'] = esc_html__( 'Fade', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_clients_list_image_only_animation_options', 'dunker_core_filter_clients_list_image_only_fade' );
}
