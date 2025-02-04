<?php

if ( ! function_exists( 'dunker_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function dunker_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'dunker_filter_mobile_header_template', dunker_get_template_part( 'mobile-header', 'templates/mobile-header' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	add_action( 'dunker_action_page_header_template', 'dunker_load_page_mobile_header' );
}

if ( ! function_exists( 'dunker_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function dunker_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'dunker_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'dunker' ) ) );

		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}

	add_action( 'dunker_action_after_include_modules', 'dunker_register_mobile_navigation_menus' );
}
