<?php

if ( ! function_exists( 'dunker_core_add_fullscreen_menu_opener_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function dunker_core_add_fullscreen_menu_opener_widget( $widgets ) {
		$widgets[] = 'DunkerCore_Fullscreen_Menu_Opener_Widget';

		return $widgets;
	}

	add_filter( 'dunker_core_filter_register_widgets', 'dunker_core_add_fullscreen_menu_opener_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class DunkerCore_Fullscreen_Menu_Opener_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'dunker_core_fullscreen_menu_opener' );
			$this->set_name( esc_html__( 'Dunker Fullscreen Menu Opener', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Display a "hamburger" icon that opens the fullscreen menu', 'dunker-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'fullscreen_menu_opener_margin',
					'title'       => esc_html__( 'Opener Margin', 'dunker-core' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'fullscreen_menu_opener_padding',
					'title'       => esc_html__( 'Opener Padding', 'dunker-core' ),
					'description' => esc_html__( 'Insert padding in format: top right bottom left', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'widget_skin',
					'title'      => esc_html__( 'Widget Skin', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'header_skin', false ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'fullscreen_menu_opener_color',
					'title'      => esc_html__( 'Opener Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'fullscreen_menu_opener_hover_color',
					'title'      => esc_html__( 'Opener Hover Color', 'dunker-core' ),
				)
			);
		}

		public function render( $atts ) {
			$styles = array();

			if ( ! empty( $atts['fullscreen_menu_opener_color'] ) ) {
				$styles[] = 'color: ' . $atts['fullscreen_menu_opener_color'] . ';';
			}

			if ( ! empty( $atts['fullscreen_menu_opener_margin'] ) ) {
				$styles[] = 'margin: ' . $atts['fullscreen_menu_opener_margin'];
			}

			if ( ! empty( $atts['fullscreen_menu_opener_padding'] ) ) {
				$styles[] = 'padding: ' . $atts['fullscreen_menu_opener_padding'];
			}

			dunker_core_get_opener_icon_html(
				array(
					'option_name'  => 'fullscreen_menu',
					'custom_class' => 'qodef-fullscreen-menu-opener  qodef-skin--' . esc_attr( $atts['widget_skin'] ),
					'inline_style' => $styles,
					'inline_attr'  => qode_framework_get_inline_attr( $atts['fullscreen_menu_opener_hover_color'], 'data-hover-color' ),
				),
				true
			);
		}
	}
}
