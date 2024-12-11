<?php

class DunkerCore_Interactive_Product_Categories_Shortcode_Elementor extends DunkerCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'dunker_core_interactive_product_categories' );

		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'woocommerce' ) ) {
	dunker_core_register_new_elementor_widget( new DunkerCore_Interactive_Product_Categories_Shortcode_Elementor() );
}
