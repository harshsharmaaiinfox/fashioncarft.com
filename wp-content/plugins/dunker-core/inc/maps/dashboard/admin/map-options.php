<?php

if ( ! function_exists( 'dunker_core_add_map_options' ) ) {
	/**
	 * Function that add map options
	 */
	function dunker_core_add_map_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => DUNKER_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'map',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Maps', 'dunker-core' ),
				'description' => esc_html__( 'Global Maps Options', 'dunker-core' ),
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_maps_api_key',
					'title'       => esc_html__( 'Maps API Key', 'dunker-core' ),
					'description' => esc_html__( 'Enter Google Maps API key', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_map_style',
					'title'       => esc_html__( 'Map Style', 'dunker-core' ),
					'description' => esc_html__( 'Enter Snazzy Map style JSON code', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_map_zoom',
					'title'       => esc_html__( 'Map Zoom', 'dunker-core' ),
					'description' => esc_html__( 'Input the default zoom value for the map. Note that this value applies in the event that the map contains a single address only. In the event of multiple addresses being shown, Google Map reverts to its own zoom values in order to fit all the addresses on the screen. ', 'dunker-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_scroll',
					'title'         => esc_html__( 'Enable Map Scroll', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable map scrolling', 'dunker-core' ),
					'default_value' => 'no',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_drag',
					'title'         => esc_html__( 'Enable Map Dragging', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable map dragging', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_street_view_control',
					'title'         => esc_html__( 'Enable Map Street View Control', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable street view control on map', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_zoom_control',
					'title'         => esc_html__( 'Enable Map Zoom Control', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable zoom control on map', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_type_control',
					'title'         => esc_html__( 'Enable Map Type Control', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable type control on map', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_full_screen_control',
					'title'         => esc_html__( 'Enable Map Full Screen Control', 'dunker-core' ),
					'description'   => esc_html__( 'Use this option to enable full screen control on map', 'dunker-core' ),
					'default_value' => 'yes',
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_map_options_map', $page );
		}
	}

	add_action( 'dunker_core_action_default_options_init', 'dunker_core_add_map_options', dunker_core_get_admin_options_map_position( 'maps' ) );
}
