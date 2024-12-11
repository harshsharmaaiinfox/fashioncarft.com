<?php

if ( ! function_exists( 'dunker_core_add_social_share_variation_dropdown' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_social_share_variation_dropdown( $variations ) {
		$variations['dropdown'] = esc_html__( 'Dropdown', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_social_share_layouts', 'dunker_core_add_social_share_variation_dropdown' );
	add_filter( 'dunker_core_filter_social_share_layout_options', 'dunker_core_add_social_share_variation_dropdown' );
}

if ( ! function_exists( 'dunker_core_set_default_social_share_variation_dropdown' ) ) {
	/**
	 * Function that set default variation layout for this module
	 *
	 * @return string
	 */
	function dunker_core_set_default_social_share_variation_dropdown() {
		return 'dropdown';
	}

	add_filter( 'dunker_core_filter_social_share_layout_default_value', 'dunker_core_set_default_social_share_variation_dropdown' );
}
