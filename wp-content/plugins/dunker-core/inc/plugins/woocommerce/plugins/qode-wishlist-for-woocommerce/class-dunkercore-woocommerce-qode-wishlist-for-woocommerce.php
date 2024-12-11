<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'DunkerCore_WooCommerce_Qode_Wishlist_For_WooCommerce' ) ) {
	class DunkerCore_WooCommerce_Qode_Wishlist_For_WooCommerce {
		private static $instance;

		public function __construct() {

			// Init, permission 20 is set in order to be after the plugin initialization.
			add_action( 'plugins_loaded', array( $this, 'init' ), 20 );
		}

		/**
		 * @return DunkerCore_WooCommerce_Qode_Wishlist_For_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function init() {

			if ( qode_framework_is_installed( 'qode-wishlist-for-woocommerce' ) ) {

				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_behavior_default_value', array( $this, 'set_default_add_to_wishlist_behavior' ) );

				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_type_default_value', array( $this, 'set_default_add_to_wishlist_type' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_loop_type_default_value', array( $this, 'set_default_add_to_wishlist_type' ) );

				add_filter( 'qode_wishlist_for_woocommerce_filter_svg_icon', array( $this, 'set_add_to_wishlist_heart_icon' ), 10, 3 );

				add_filter( 'qode_wishlist_for_woocommerce_filter_button_loop_position_default_value', array( $this, 'set_default_button_loop_position' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_thumbnail_loop_position_default_value', array( $this, 'set_default_button_thumbnail_loop_position' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_button_loop_position', array( $this, 'set_add_to_wishlist_button_loop_position' ), 10, 3 );

				add_filter( 'qode_wishlist_for_woocommerce_filter_show_table_title_default_value', array( $this, 'disable_wishlist_page_title' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_enable_share_default_value', array( $this, 'disable_wishlist_page_social_share' ) );

				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_wrapper_classes', array( $this, 'set_add_to_wishlist_theme_class' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_wishlist_table_holder_classes', array( $this, 'set_add_to_wishlist_theme_class' ) );
			}
		}

		public function set_default_add_to_wishlist_behavior() {
			return 'view';
		}

		public function set_default_add_to_wishlist_type() {
			return 'icon';
		}

		public function set_add_to_wishlist_heart_icon( $icon_html, $name, $class_name ) {

			if ( 'heart' === $name || 'heart-o' === $name ) {
				$icon_html = '<svg ' . esc_attr( $class_name ) . ' xmlns="http://www.w3.org/2000/svg" width="16.932" height="16" viewBox="0 0 16.932 16"><path d="M8.467 16a1.756 1.756 0 0 1-.94-.273c-.67-.422-6.576-4.254-7.425-8.776a6.154 6.154 0 0 1 1.27-4.977A5.177 5.177 0 0 1 5.356 0a4.369 4.369 0 0 1 3.111 1.086A4.185 4.185 0 0 1 11.577 0a5.18 5.18 0 0 1 3.983 1.973 6.157 6.157 0 0 1 1.269 4.977c-.849 4.522-6.755 8.354-7.426 8.777a1.753 1.753 0 0 1-.936.273ZM5.356 2A3.186 3.186 0 0 0 2.92 3.241a4.133 4.133 0 0 0-.853 3.341c.646 3.439 5.543 6.806 6.4 7.371.857-.565 5.754-3.932 6.4-7.371a4.136 4.136 0 0 0-.851-3.341A3.192 3.192 0 0 0 11.577 2a3.021 3.021 0 0 0-2.354 1.122 1 1 0 0 1-.756.346 1 1 0 0 1-.756-.345A3.024 3.024 0 0 0 5.356 2Z"/></svg>';
			}

			return $icon_html;
		}

		public function set_default_button_loop_position() {
			return 'on-thumbnail';
		}

		public function set_default_button_thumbnail_loop_position() {
			return 'top-right';
		}

		public function set_add_to_wishlist_button_loop_position( $button_position_map, $button_position, $is_block_template ) {

			if ( 'on-thumbnail' === $button_position && ! $is_block_template ) {
				$button_position_map[ $button_position ] = array(
					'hook'     => array( 'dunker_core_action_product_list_item_qode_woo_plugins' ),
					'priority' => array( 10 ),
				);
			}

			return $button_position_map;
		}

		public function disable_wishlist_page_title() {
			return 'no';
		}

		public function disable_wishlist_page_social_share() {
			return 'no';
		}

		public function set_add_to_wishlist_theme_class( $classes ) {
			$classes[] = 'qodef-dunker-theme';

			return $classes;
		}
	}

	DunkerCore_WooCommerce_Qode_Wishlist_For_WooCommerce::get_instance();
}
