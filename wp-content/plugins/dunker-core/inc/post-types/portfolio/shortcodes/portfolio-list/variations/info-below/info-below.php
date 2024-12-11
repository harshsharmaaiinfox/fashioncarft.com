<?php

if ( ! function_exists( 'dunker_core_add_portfolio_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_portfolio_list_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_portfolio_list_layouts', 'dunker_core_add_portfolio_list_variation_info_below' );
}

if ( ! function_exists( 'dunker_core_add_portfolio_list_options_info_below' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function dunker_core_add_portfolio_list_options_info_below( $options ) {
		$info_below_options   = array();
		$margin_option        = array(
			'field_type' => 'text',
			'name'       => 'info_below_content_margin_top',
			'title'      => esc_html__( 'Content Top Margin', 'dunker-core' ),
			'dependency' => array(
				'show' => array(
					'layout' => array(
						'values'        => 'info-below',
						'default_value' => '',
					),
				),
			),
			'group'      => esc_html__( 'Layout', 'dunker-core' ),
		);
		$info_below_options[] = $margin_option;
        $margin_bottom_option = array(
            'field_type' => 'text',
            'name'       => 'info_below_content_margin_bottom',
            'title'      => esc_html__( 'Content Bottom Margin', 'dunker-core' ),
            'dependency' => array(
                'show' => array(
                    'layout' => array(
                        'values'        => 'info-below',
                        'default_value' => '',
                    ),
                ),
            ),
            'group'      => esc_html__( 'Layout', 'dunker-core' ),
        );
        $info_below_options[] = $margin_bottom_option;

		return array_merge( $options, $info_below_options );
	}

	add_filter( 'dunker_core_filter_portfolio_list_extra_options', 'dunker_core_add_portfolio_list_options_info_below' );
}
