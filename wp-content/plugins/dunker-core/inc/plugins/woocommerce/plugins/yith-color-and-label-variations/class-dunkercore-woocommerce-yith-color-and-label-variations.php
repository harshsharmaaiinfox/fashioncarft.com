<?php

if ( ! class_exists( 'DunkerCore_WooCommerce_YITH_Color_and_Label_Variations' ) ) {
	class DunkerCore_WooCommerce_YITH_Color_and_Label_Variations {
		private static $instance;

		public function __construct() {

			if ( qode_framework_is_installed( 'yith-color-and-label-variations' ) ) {
				// Init
				add_action( 'after_setup_theme', array( $this, 'init' ) );
			}
		}

		/**
		 * @return DunkerCore_WooCommerce_YITH_Color_and_Label_Variations
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function init() {

			if ( ! is_admin() && function_exists( 'YITH_WCCL_Frontend' ) ) {
				// Unset default templates modules
				$this->unset_templates_modules();

				// Add new WooCommerce templates
				$this->add_templates();
			}
		}

		function unset_templates_modules() {

			// remove Variations on shop page
			remove_action( 'woocommerce_loop_add_to_cart_link', array( YITH_WCCL_Frontend(), 'add_select_options' ), 100 );
		}

		function add_templates() {

		}
	}

	DunkerCore_WooCommerce_YITH_Color_and_Label_Variations::get_instance();
}
