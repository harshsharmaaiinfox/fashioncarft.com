<?php

if ( ! function_exists( 'dunker_core_add_interactive_link_showcase_variation_list' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_interactive_link_showcase_variation_list( $variations ) {
		$variations['list'] = esc_html__( 'List', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_interactive_link_showcase_layouts', 'dunker_core_add_interactive_link_showcase_variation_list' );
}
