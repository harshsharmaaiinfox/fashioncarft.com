<?php

if ( ! function_exists( 'dunker_core_add_vertical_split_slider_variation_type_2' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_vertical_split_slider_variation_type_2( $variations ) {
		$variations['type-2'] = esc_html__( 'Type 2', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_vertical_split_slider_layouts', 'dunker_core_add_vertical_split_slider_variation_type_2' );
}

if ( ! function_exists( 'dunker_core_add_vertical_split_slider_options_type_2' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function dunker_core_add_vertical_split_slider_options_type_2( $options ) {
		$type_2_options            = array();
		$type_2_options_dependency = array(
			'show' => array(
				'slide_content_layout' => array(
					'values'        => 'type-2',
					'default_value' => '',
				),
			),
		);

		$type_2_title     = array(
			'field_type' => 'text',
			'name'       => 'type_2_title',
			'title'      => esc_html__( 'Title', 'dunker-core' ),
			'dependency' => $type_2_options_dependency,
		);
		$type_2_options[] = $type_2_title;

		$type_2_title_tag = array(
			'field_type' => 'select',
			'name'       => 'type_2_title_tag',
			'title'      => esc_html__( 'Title Tag', 'dunker-core' ),
			'options'    => dunker_core_get_select_type_options_pool( 'title_tag' ),
			'dependency' => $type_2_options_dependency,
		);
		$type_2_options[] = $type_2_title_tag;

		$type_2_list_item_1 = array(
			'field_type' => 'textarea',
			'name'       => 'type_2_list_item_1',
			'title'      => esc_html__( 'List Item 1', 'dunker-core' ),
			'dependency' => $type_2_options_dependency,
		);
		$type_2_options[]   = $type_2_list_item_1;

		$type_2_list_item_2 = array(
			'field_type' => 'textarea',
			'name'       => 'type_2_list_item_2',
			'title'      => esc_html__( 'List Item 2', 'dunker-core' ),
			'dependency' => $type_2_options_dependency,
		);
		$type_2_options[]   = $type_2_list_item_2;

		return array_merge( $options, $type_2_options );
	}

	add_filter( 'dunker_core_filter_vertical_split_slider_extra_repeater_options', 'dunker_core_add_vertical_split_slider_options_type_2' );
}
