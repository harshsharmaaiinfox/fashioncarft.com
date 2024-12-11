<?php

class DunkerCore_Crossfade_Images_Shortcode_Elementor extends DunkerCore_Elementor_Widget_Base {

	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'dunker_core_crossfade_images' );

		parent::__construct( $data, $args );
	}
}

dunker_core_register_new_elementor_widget( new DunkerCore_Crossfade_Images_Shortcode_Elementor() );
