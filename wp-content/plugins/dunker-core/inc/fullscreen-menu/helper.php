<?php

if ( ! function_exists( 'dunker_core_register_fullscreen_menu' ) ) {
	/**
	 * Function which add additional main menu navigation into global list
	 *
	 * @param array $menus
	 *
	 * @return array
	 */
	function dunker_core_register_fullscreen_menu( $menus ) {
		$menus['fullscreen-menu-navigation'] = esc_html__( 'Fullscreen Navigation', 'dunker-core' );

		return $menus;
	}

	add_filter( 'dunker_filter_register_navigation_menus', 'dunker_core_register_fullscreen_menu' );
}

if ( ! function_exists( 'dunker_core_add_fullscreen_menu_body_classes' ) ) {
	/**
	 * Function that add additional class name into global class list for body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function dunker_core_add_fullscreen_menu_body_classes( $classes ) {
		$hide_logo = dunker_core_get_post_value_through_levels( 'qodef_fullscreen_menu_hide_logo' );

		if ( 'yes' === $hide_logo ) {
			$classes[] = 'qodef-fullscreen-menu--hide-logo';
		}

		return $classes;
	}

	add_filter( 'body_class', 'dunker_core_add_fullscreen_menu_body_classes' );
}

if ( ! function_exists( 'dunker_core_set_fullscreen_menu_typography_styles' ) ) {
	/**
	 * Function that generates module inline styles
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function dunker_core_set_fullscreen_menu_typography_styles( $style ) {
		$area_styles      = array();
		$background_color = dunker_core_get_post_value_through_levels( 'qodef_fullscreen_menu_background_color' );
		$background_image = dunker_core_get_post_value_through_levels( 'qodef_fullscreen_menu_background_image' );

		if ( ! empty( $background_color ) ) {
			$area_styles['background-color'] = $background_color;
		}

		if ( ! empty( $background_image ) ) {
			$area_styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) . ')';
		}

		if ( ! empty( $area_styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-fullscreen-area', $area_styles );
		}

		$first_lvl_styles        = dunker_core_get_typography_styles( 'qodef_fullscreen_1st_lvl' );
		$first_lvl_hover_styles  = dunker_core_get_typography_hover_styles( 'qodef_fullscreen_1st_lvl' );
		$second_lvl_styles       = dunker_core_get_typography_styles( 'qodef_fullscreen_2nd_lvl' );
		$second_lvl_hover_styles = dunker_core_get_typography_hover_styles( 'qodef_fullscreen_2nd_lvl' );

		if ( ! empty( $first_lvl_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-fullscreen-menu > ul > li > a', $first_lvl_styles );
		}

		if ( ! empty( $first_lvl_hover_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-fullscreen-menu > ul > li > a:hover', $first_lvl_hover_styles );
		}

		$first_lvl_active_color = dunker_core_get_option_value( 'admin', 'qodef_fullscreen_1st_lvl_active_color' );

		if ( ! empty( $first_lvl_active_color ) ) {
			$first_lvl_active_styles = array(
				'color' => $first_lvl_active_color,
			);

			$style .= qode_framework_dynamic_style(
				array(
					'.qodef-fullscreen-menu > ul >li.current-menu-ancestor > a',
					'.qodef-fullscreen-menu > ul >li.current-menu-item > a',
				),
				$first_lvl_active_styles
			);
		}

		if ( ! empty( $second_lvl_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-fullscreen-menu .qodef-drop-down-second-inner ul li > a', $second_lvl_styles );
		}

		if ( ! empty( $second_lvl_hover_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-fullscreen-menu .qodef-drop-down-second-inner ul li > a:hover', $second_lvl_hover_styles );
		}

		$second_lvl_active_color = dunker_core_get_option_value( 'admin', 'qodef_fullscreen_2nd_lvl_active_color' );

		if ( ! empty( $second_lvl_active_color ) ) {
			$second_lvl_active_styles = array(
				'color' => $second_lvl_active_color,
			);

			$style .= qode_framework_dynamic_style(
				array(
					'.qodef-fullscreen-menu .qodef-drop-down-second ul li.current-menu-ancestor > a',
					'.qodef-fullscreen-menu .qodef-drop-down-second ul li.current-menu-item > a',
				),
				$second_lvl_active_styles
			);
		}

		return $style;
	}

	add_filter( 'dunker_filter_add_inline_style', 'dunker_core_set_fullscreen_menu_typography_styles' );
}

if ( ! function_exists( 'dunker_core_include_fullscreen_menu_widget' ) ) {
	/**
	 * Function that includes widgets
	 */
	function dunker_core_include_fullscreen_menu_widget() {
		foreach ( glob( DUNKER_CORE_INC_PATH . '/fullscreen-menu/widgets/*/include.php' ) as $widget ) {
			include_once $widget;
		}
	}

	add_action( 'qode_framework_action_before_widgets_register', 'dunker_core_include_fullscreen_menu_widget' );
}