<?php

class DunkerCore_Section_Title_Shortcode_Elementor extends DunkerCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'dunker_core_section_title' );

		parent::__construct( $data, $args );
	}
}

dunker_core_register_new_elementor_widget( new DunkerCore_Section_Title_Shortcode_Elementor() );
