<?php

if ( ! function_exists( 'dunker_core_add_yith_countdown_plugin_predefined_style' ) ) {
	/**
	 * Function that add additional class name into global class list for body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function dunker_core_add_yith_countdown_plugin_predefined_style( $classes ) {

		$option = dunker_core_get_post_value_through_levels( 'qodef_enable_woo_yith_countdown_predefined_style' );

		if ( 'yes' === $option ) {
			$classes[] = 'qodef-yith-wcpc--predefined';
		}

		return $classes;
	}

	add_filter( 'body_class', 'dunker_core_add_yith_countdown_plugin_predefined_style' );
}
