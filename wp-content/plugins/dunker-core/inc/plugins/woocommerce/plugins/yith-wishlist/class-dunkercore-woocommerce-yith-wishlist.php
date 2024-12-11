<?php

if ( ! class_exists( 'DunkerCore_WooCommerce_YITH_Wishlist' ) ) {
	class DunkerCore_WooCommerce_YITH_Wishlist {
		private static $instance;

		public function __construct() {

			if ( qode_framework_is_installed( 'yith-wishlist' ) ) {
				// Init
				add_action( 'after_setup_theme', array( $this, 'init' ) );
			}
		}

		/**
		 * @return DunkerCore_WooCommerce_YITH_Wishlist
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function init() {

			// Change default templates position
			$this->change_templates_position();

			// Disable default resopnsive YITH Wishlist Page Table
			add_filter( 'yith_wcwl_is_wishlist_responsive', array( $this, 'is_responsive' ) );
		}

		function change_templates_position() {

			// Add button element for shop pages
			add_action( 'qodef_woo_product_list_additional_before_media_content', 'dunker_core_get_yith_wishlist_shortcode' );
			add_action( 'dunker_core_action_product_list_item_additional_top_content', 'dunker_core_get_yith_wishlist_shortcode' );
			add_action( 'woocommerce_after_single_variation', 'dunker_core_get_yith_wishlist_shortcode' );
			add_action( 'woocommerce_after_add_to_cart_button', array( $this, 'print_button' ) );
		}

		function is_responsive() {

			// Prevent from using wp_is_mobile and rendering responsive list instead of regular cart table
			return false;
		}

		/**
		 * Print "Add to Wishlist" shortcode
		 *
		 * @return void
		 */
		public function print_button() {
			$position     = get_option( 'yith_wcwl_button_position', 'add-to-cart' );
			$product      = dunker_woo_get_global_product();
			$product_type = ! empty( $product ) ? $product->get_type() : '';

			if ( 'shortcode' === $position && ! in_array( $product_type, array( 'grouped', 'external', 'variable' ), true ) ) {
				dunker_core_get_yith_wishlist_shortcode();
			} else if( 'add-to-cart' === $position && in_array( $product_type, array( 'variable' ), true) ) {
                remove_action( 'woocommerce_after_single_variation', 'dunker_core_get_yith_wishlist_shortcode' );
            }
		}
	}

	DunkerCore_WooCommerce_YITH_Wishlist::get_instance();
}
