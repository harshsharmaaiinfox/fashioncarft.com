<?php

if ( ! function_exists( 'dunker_core_add_import_sub_page_to_list' ) ) {
	/**
	 * Function that add additional sub-page item into welcome page list
	 *
	 * @param array $sub_pages
	 *
	 * @return array
	 */
	function dunker_core_add_import_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'DunkerCore_Dashboard_Import_Page';

		return $sub_pages;
	}

	add_filter( 'dunker_core_filter_add_welcome_sub_page', 'dunker_core_add_import_sub_page_to_list', 11 );
}

if ( class_exists( 'DunkerCore_Dashboard_Sub_Page' ) ) {
	class DunkerCore_Dashboard_Import_Page extends DunkerCore_Dashboard_Sub_Page {

		public function __construct() {
			parent::__construct();
		}

		public function add_sub_page() {
			$this->set_base( 'import' );
			$this->set_title( esc_html__( 'Import', 'dunker-core' ) );
			$this->set_atts( $this->set_atributtes() );
		}

		public function set_atributtes() {
			$params = array();

			$iparams = DunkerCore_Dashboard::get_instance()->get_import_params();
			if ( is_array( $iparams ) && isset( $iparams['submit'] ) ) {
				$params['submit'] = $iparams['submit'];
			}

			return $params;
		}
	}
}
