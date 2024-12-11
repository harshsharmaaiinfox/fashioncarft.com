<?php

if ( ! function_exists( 'dunker_core_add_icon_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function dunker_core_add_icon_widget( $widgets ) {
		$widgets[] = 'DunkerCore_Icon_Widget';

		return $widgets;
	}

	add_filter( 'dunker_core_filter_register_widgets', 'dunker_core_add_icon_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class DunkerCore_Icon_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'dunker_core_icon',
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'dunker_core_icon' );
				$this->set_name( esc_html__( 'Dunker Icon', 'dunker-core' ) );
				$this->set_description( esc_html__( 'Add a icon element into widget areas', 'dunker-core' ) );
			}
		}

		public function render( $atts ) {
			echo DunkerCore_Icon_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
