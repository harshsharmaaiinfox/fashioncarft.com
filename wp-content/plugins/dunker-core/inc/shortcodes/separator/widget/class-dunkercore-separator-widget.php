<?php

if ( ! function_exists( 'dunker_core_add_separator_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function dunker_core_add_separator_widget( $widgets ) {
		$widgets[] = 'DunkerCore_Separator_Widget';

		return $widgets;
	}

	add_filter( 'dunker_core_filter_register_widgets', 'dunker_core_add_separator_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class DunkerCore_Separator_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'dunker_core_separator',
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'dunker_core_separator' );
				$this->set_name( esc_html__( 'Dunker Separator', 'dunker-core' ) );
				$this->set_description( esc_html__( 'Add a separator element into widget areas', 'dunker-core' ) );
			}
		}

		public function render( $atts ) {
			echo DunkerCore_Separator_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
