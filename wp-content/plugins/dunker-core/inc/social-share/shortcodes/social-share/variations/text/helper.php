<?php

if ( ! function_exists( 'dunker_core_add_social_share_variation_text' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_social_share_variation_text( $variations ) {
		$variations['text'] = esc_html__( 'Text', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_social_share_layouts', 'dunker_core_add_social_share_variation_text' );
	add_filter( 'dunker_core_filter_social_share_layout_options', 'dunker_core_add_social_share_variation_text' );
}
