<?php

if ( ! function_exists( 'dunker_core_add_minimal_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function dunker_core_add_minimal_header_global_option( $header_layout_options ) {
		$header_layout_options['minimal'] = array(
			'image' => DUNKER_CORE_HEADER_LAYOUTS_URL_PATH . '/minimal/assets/img/minimal-header.png',
			'label' => esc_html__( 'Minimal', 'dunker-core' ),
		);

		return $header_layout_options;
	}

	add_filter( 'dunker_core_filter_header_layout_option', 'dunker_core_add_minimal_header_global_option' );
}

if ( ! function_exists( 'dunker_core_register_minimal_header_layout' ) ) {
	/**
	 * Function which add header layout into global list
	 *
	 * @param array $header_layouts
	 *
	 * @return array
	 */
	function dunker_core_register_minimal_header_layout( $header_layouts ) {
		$header_layouts['minimal'] = 'DunkerCore_Minimal_Header';

		return $header_layouts;
	}

	add_filter( 'dunker_core_filter_register_header_layouts', 'dunker_core_register_minimal_header_layout' );
}
