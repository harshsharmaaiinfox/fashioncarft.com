<?php

if ( ! function_exists( 'dunker_core_is_page_content_bottom_enabled' ) ) {
	/**
	 * function that check is module enabled
	 *
	 * @param $is_enabled bool
	 *
	 * @return bool
	 */
	function dunker_core_is_page_content_bottom_enabled( $is_enabled ) {
		$option = dunker_core_get_post_value_through_levels( 'qodef_enable_page_content_bottom' ) !== 'no';

		if ( ! $option ) {
			$is_enabled = false;
		}

		return $is_enabled;
	}

	add_filter( 'dunker_core_filter_enable_page_content_bottom', 'dunker_core_is_page_content_bottom_enabled' );
}

if ( ! function_exists( 'dunker_core_set_content_bottom_area_classes' ) ) {
	/**
	 * function that return classes for page content bottom area
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function dunker_core_set_content_bottom_area_classes( $classes ) {
		$is_grid_enabled     = dunker_core_get_post_value_through_levels( 'qodef_set_content_bottom_area_in_grid' ) !== 'no';
		$is_inline_enabled   = dunker_core_get_post_value_through_levels( 'qodef_set_content_bottom_widgets_inline' ) !== 'no';
		$content_bottom_skin = dunker_core_get_post_value_through_levels( 'qodef_content_bottom_skin' );

		if ( ! $is_grid_enabled ) {
			$classes[] = 'qodef-content-full-width';
		} else {
			$classes[] = 'qodef-content-grid';
		}

		if ( $is_grid_enabled ) {
			$classes[] = 'qodef-widgets-inline';
		}

		if ( ! empty( $content_bottom_skin ) && 'none' !== $content_bottom_skin ) {
			$classes[] = ' qodef-skin--' . $content_bottom_skin;
		}

		return $classes;
	}

	add_filter( 'dunker_core_filter_content_bottom_area_classes', 'dunker_core_set_content_bottom_area_classes' );
}

if ( ! function_exists( 'dunker_core_filter_enable_page_content_bottom' ) ) {
	/**
	 * function that check is module enabled
	 */
	function dunker_core_filter_enable_page_content_bottom() {
		$is_enabled = true;

		return apply_filters( 'dunker_core_filter_enable_page_content_bottom', $is_enabled );
	}
}

if ( ! function_exists( 'dunker_core_get_content_bottom_area_classes' ) ) {
	/**
	 * function that return classes for page content bottom area
	 *
	 * @return string
	 */
	function dunker_core_get_content_bottom_area_classes() {

		$classes = array();

		$classes = apply_filters( 'dunker_core_filter_content_bottom_area_classes', $classes );

		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'dunker_core_load_page_content_bottom' ) ) {
	/**
	 * function which loads page template module
	 */
	function dunker_core_load_page_content_bottom() {

		if ( dunker_core_filter_enable_page_content_bottom() ) {
			echo apply_filters( 'dunker_core_filter_content_bottom_template', dunker_core_get_template_part( 'content-bottom', 'templates/content-bottom' ) );
		}
	}

	add_action( 'dunker_action_page_content_bottom_template', 'dunker_core_load_page_content_bottom' );
}
