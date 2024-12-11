<?php

if ( ! function_exists( 'dunker_core_add_fixed_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function dunker_core_add_fixed_header_option( $options ) {
		$options['fixed'] = esc_html__( 'Fixed', 'dunker-core' );

		return $options;
	}

	add_filter( 'dunker_core_filter_header_scroll_appearance_option', 'dunker_core_add_fixed_header_option' );
}
