<?php

if ( ! function_exists( 'dunker_core_include_yith_countdown_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function dunker_core_include_yith_countdown_plugin_is_installed( $installed, $plugin ) {
		if ( 'yith-countdown' === $plugin ) {
			return defined( 'YWPC_INIT' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'dunker_core_include_yith_countdown_plugin_is_installed', 10, 2 );
}

if ( ! function_exists( 'dunker_core_woo_countdown_add_script_dependency' ) ) {
	/**
	 * Function that adds dependency
	 */
	function dunker_core_woo_countdown_add_script_dependency( $dep_array ) {
		if ( qode_framework_is_installed( 'yith-countdown' ) ) {
			$dep_array[] = 'ywpc-footer';
		}

		return $dep_array;
	}

	add_filter( 'dunker_core_filter_script_dependencies', 'dunker_core_woo_countdown_add_script_dependency' );
}

if ( ! function_exists( 'dunker_core_woo_countdown_add_style_dependency' ) ) {
	/**
	 * Function that adds dependency
	 */
	function dunker_core_woo_countdown_add_style_dependency( $dep_array ) {
		if ( qode_framework_is_installed( 'yith-countdown' ) ) {
			$dep_array[] = 'ywpc-frontend';
		}

		return $dep_array;
	}

	add_filter( 'dunker_core_filter_style_dependencies', 'dunker_core_woo_countdown_add_style_dependency' );
}


if ( ! function_exists( 'dunker_core_print_yith_countdown' ) ) {
	/**
	 * Function that print module shortcode
	 *
	 */
	function dunker_core_print_yith_countdown() {
		if ( qode_framework_is_installed( 'yith-countdown' ) ) {
			echo do_shortcode( '[ywpc_shortcode type="single"]' );
		}
	}
}

if ( ! function_exists( 'dunker_core_check_yith_countdown_position' ) ) {
	/**
	 * Function that print module shortcode
	 *
	 * @return bool
	 */
	function dunker_core_check_yith_countdown_position() {
		$position = get_option( 'ywpc_where_show' );

		return 'code' === $position;
	}
}
