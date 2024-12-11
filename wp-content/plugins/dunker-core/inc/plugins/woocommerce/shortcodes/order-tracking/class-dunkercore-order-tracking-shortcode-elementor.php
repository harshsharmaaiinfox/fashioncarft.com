<?php

class DunkerCore_Order_Tracking_Shortcode_Elementor extends DunkerCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'dunker_core_order_tracking' );

		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'woocommerce' ) ) {
	dunker_core_register_new_elementor_widget( new DunkerCore_Order_Tracking_Shortcode_Elementor() );
}
