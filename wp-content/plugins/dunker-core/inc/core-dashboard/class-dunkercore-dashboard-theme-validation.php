<?php

if ( class_exists( 'DunkerCore_Dashboard_Rest_API' ) ) {
	class DunkerCore_Dashboard_Theme_Validation extends DunkerCore_Dashboard_Rest_API {
		private static $instance;

		public function __construct() {
			parent::__construct();
			$this->set_route( 'theme-validation' );
		}

		/**
		 * @return DunkerCore_Dashboard_Rest_API|DunkerCore_Dashboard_Theme_Validation
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function localize_script( $global ) {
			$global['themeValidationRoute'] = esc_attr( $this->get_namespace() . '/' . $this->get_route() );

			return $global;
		}

		public function register_rest_api_route() {

			register_rest_route(
				$this->get_namespace(),
				$this->get_route(),
				array(
					'methods'             => WP_REST_Server::CREATABLE,
					'callback'            => array( DunkerCore_Dashboard::get_instance(), 'theme_validation' ),
					'permission_callback' => '__return_true',
					'args'                => array(
						'options' => array(
							'required'          => true,
							'validate_callback' => function ( $param, $request, $key ) {
								// Simple solution for validation can be 'is_array' value instead of callback function
								return is_array( $param ) ? $param : (array) strip_tags( $param );
							},
							'description'       => esc_html__( 'Options data is array with parameters', 'dunker-core' ),
						),
					),
				)
			);
		}
	}

	DunkerCore_Dashboard_Theme_Validation::get_instance();
}
