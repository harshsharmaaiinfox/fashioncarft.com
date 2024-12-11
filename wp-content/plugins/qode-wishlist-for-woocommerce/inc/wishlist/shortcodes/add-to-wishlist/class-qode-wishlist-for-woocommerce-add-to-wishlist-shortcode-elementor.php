<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qode_Wishlist_For_WooCommerce_Add_To_Wishlist_Shortcode_Elementor extends Qode_Wishlist_For_WooCommerce_Elementor_Widget_Base {

	// phpcs:ignore Generic.Arrays.DisallowShortArraySyntax
	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'qode_wishlist_for_woocommerce_add_to_wishlist' );

		parent::__construct( $data, $args );
	}
}

qode_wishlist_for_woocommerce_register_new_elementor_widget( new Qode_Wishlist_For_WooCommerce_Add_To_Wishlist_Shortcode_Elementor() );
