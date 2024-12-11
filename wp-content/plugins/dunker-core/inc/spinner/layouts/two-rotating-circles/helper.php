<?php

if ( ! function_exists( 'dunker_core_add_two_rotating_circles_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts - module layouts
	 *
	 * @return array
	 */
	function dunker_core_add_two_rotating_circles_spinner_layout_option( $layouts ) {
		$layouts['two-rotating-circles'] = esc_html__( '2 Rotating Circles', 'dunker-core' );

		return $layouts;
	}

	add_filter( 'dunker_core_filter_page_spinner_layout_options', 'dunker_core_add_two_rotating_circles_spinner_layout_option' );
}
