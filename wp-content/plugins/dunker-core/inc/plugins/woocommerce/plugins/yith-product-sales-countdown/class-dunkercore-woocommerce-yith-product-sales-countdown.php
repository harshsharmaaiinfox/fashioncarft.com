<?php

if ( ! class_exists( 'DunkerCore_WooCommerce_YITH_Countdown' ) ) {
	class DunkerCore_WooCommerce_YITH_Countdown {
		private static $instance;

		public function __construct() {

			if ( qode_framework_is_installed( 'yith-countdown' ) ) {
				// Init
				add_action( 'after_setup_theme', array( $this, 'init' ) );
			}
		}

		/**
		 * @return DunkerCore_WooCommerce_YITH_Countdown
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function init() {

			// Unset default templates modules
			$this->unset_templates_modules();

			// Change default templates position
			$this->change_templates_position();

			// Override default templates
			$this->override_templates();
		}

		function unset_templates_modules() {

			if ( dunker_core_check_yith_countdown_position() ) {
				// Remove all instances of product countdown injected by plugin on product single, we will add it as function where we need it...
				remove_action( 'woocommerce_before_single_product', array( YITH_WC_Product_Countdown::get_instance(), 'check_show_ywpc_product' ), 5 );

				// Remove all instances of product countdown injected by plugin on shop archive, we will add it as function where we need it...
				remove_action( 'woocommerce_before_shop_loop_item', array( YITH_WC_Product_Countdown::get_instance(), 'check_show_ywpc_category' ) );
			}
		}

		function change_templates_position() {

			if ( dunker_core_check_yith_countdown_position() ) {
				add_action( 'woocommerce_before_add_to_cart_form', 'dunker_core_print_yith_countdown' );
			}
		}

		function override_templates() {
		}
	}

	DunkerCore_WooCommerce_YITH_Countdown::get_instance();
}
