<?php

class DunkerCore_Vertical_Split_Slider_Shortcode_Elementor extends DunkerCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'dunker_vertical_split_slider' );

		parent::__construct( $data, $args );
	}
}

dunker_core_register_new_elementor_widget( new DunkerCore_Vertical_Split_Slider_Shortcode_Elementor() );
