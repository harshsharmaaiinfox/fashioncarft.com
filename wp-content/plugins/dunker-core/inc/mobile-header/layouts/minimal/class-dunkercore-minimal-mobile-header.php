<?php

class DunkerCore_Minimal_Mobile_Header extends DunkerCore_Mobile_Header {
	private static $instance;

	public function __construct() {
		$this->set_layout( 'minimal' );
		$this->default_header_height = 70;

		add_action( 'dunker_action_before_wrapper_close_tag', array( $this, 'fullscreen_menu_template' ) );

		add_filter( 'dunker_core_filter_available_mobile_header_logo_images', array( $this, 'set_logo_image' ) );

		parent::__construct();
	}

	/**
	 * @return DunkerCore_Minimal_Mobile_Header
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	function fullscreen_menu_template() {
		$header = dunker_core_get_post_value_through_levels( 'qodef_header_layout' );

		if ( 'minimal' !== $header ) {
			$parameters = array(
				'fullscreen_menu_in_grid' => 'yes' === dunker_core_get_post_value_through_levels( 'qodef_fullscreen_menu_in_grid' ),
			);

			dunker_core_template_part( 'fullscreen-menu', 'templates/full-screen-menu', '', $parameters );
		}
	}

	function set_logo_image( $available_logo_images ) {
		$available_logo_images = array_merge(
			$available_logo_images,
			array(
				'dark'  => 'dark',
				'light' => 'dark',
			)
		);

		return $available_logo_images;
	}
}
