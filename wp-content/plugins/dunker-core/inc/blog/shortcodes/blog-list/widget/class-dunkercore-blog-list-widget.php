<?php

if ( ! function_exists( 'dunker_core_add_blog_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function dunker_core_add_blog_list_widget( $widgets ) {
		$widgets[] = 'DunkerCore_Blog_List_Widget';

		return $widgets;
	}

	add_filter( 'dunker_core_filter_register_widgets', 'dunker_core_add_blog_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class DunkerCore_Blog_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'dunker-core' ),
				)
			);
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'dunker_core_blog_list',
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'dunker_core_blog_list' );
				$this->set_name( esc_html__( 'Dunker Blog List', 'dunker-core' ) );
				$this->set_description( esc_html__( 'Display a list of blog posts', 'dunker-core' ) );
			}
		}

		public function render( $atts ) {
			$atts['is_widget_element'] = 'yes';

			echo DunkerCore_Blog_List_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
