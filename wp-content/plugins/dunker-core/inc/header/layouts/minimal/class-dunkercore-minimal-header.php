<?php

class DunkerCore_Minimal_Header extends DunkerCore_Header {
	private static $instance;

	public function __construct() {
		$this->set_layout( 'minimal' );
		$this->set_search_layout( 'covers-header' );
		$this->default_header_height = 100;

		parent::__construct();
	}

	/**
	 * @return DunkerCore_Minimal_Header
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
