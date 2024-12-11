<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'DunkerCore_WooCommerce_Qode_Quick_View_For_WooCommerce' ) ) {
	class DunkerCore_WooCommerce_Qode_Quick_View_For_WooCommerce {
		private static $instance;

		public function __construct() {

			// Init, permission 20 is set in order to be after the plugin initialization.
			add_action( 'plugins_loaded', array( $this, 'init' ), 20 );
		}

		/**
		 * @return DunkerCore_WooCommerce_Qode_Quick_View_For_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function init() {

			if ( qode_framework_is_installed( 'qode-quick-view-for-woocommerce' ) ) {
				add_action( 'qode_quick_view_for_woocommerce_filter_quick_view_button_loop_position', array( $this, 'set_button_loop_position' ), 10, 3 );

				add_filter( 'qode_quick_view_for_woocommerce_filter_quick_view_button_wrapper_classes', array( $this, 'set_theme_class' ) );
			}
		}

		public function set_button_loop_position( $button_position_map, $button_position, $is_block_template ) {

			if ( 'after-add-to-cart' === $button_position && ! $is_block_template ) {
				$button_position_map[ $button_position ] = array(
					'hook'     => array( 'dunker_core_action_product_list_item_qode_woo_plugins' ),
					'priority' => array( 10 ),
				);
			}

			return $button_position_map;
		}

		public function set_theme_class( $classes ) {
			$classes[] = 'qodef-dunker-theme';

			return $classes;
		}
	}

	DunkerCore_WooCommerce_Qode_Quick_View_For_WooCommerce::get_instance();
}
