<?php

if ( ! function_exists( 'dunker_core_add_page_social_share_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_page_social_share_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => DUNKER_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'social-share',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Social Share', 'dunker-core' ),
				'description' => esc_html__( 'Global Social Share Options', 'dunker-core' ),
				'layout'      => 'tabbed',
			)
		);

		if ( $page ) {
			$social_networks_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-social-networks',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Social Networks Settings', 'dunker-core' ),
					'description' => esc_html__( 'Social networks settings', 'dunker-core' ),
				)
			);

			$social_networks = dunker_core_social_networks_list();

			foreach ( $social_networks as $network => $params ) {
				$social_networks_tab->add_field_element(
					array(
						'field_type'    => 'yesno',
						'name'          => 'qodef_enable_share_' . $network,
						'title'         => sprintf( esc_html__( 'Enable %s Share', 'dunker-core' ), $params['label'] ),
						'default_value' => 'yes',
					)
				);

				if ( 'twitter' === $network ) {
					$social_networks_tab->add_field_element(
						array(
							'field_type'    => 'text',
							'name'          => 'qodef_twitter_via',
							'title'         => esc_html__( 'Twitter Via Text', 'dunker-core' ),
							'default_value' => esc_html__( '@QodeInteractive', 'dunker-core' ),
							'dependency'    => array(
								'show' => array(
									'qodef_enable_share_twitter' => array(
										'values'        => 'yes',
										'default_value' => 'yes',
									),
								),
							),
						)
					);
				}
			}

			$layout_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-social-layout',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Layout Settings', 'dunker-core' ),
					'description' => esc_html__( 'Social share layout settings', 'dunker-core' ),
				)
			);

			$layout_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_social_share_layout',
					'title'         => esc_html__( 'Social Share Layout', 'dunker-core' ),
					'description'   => esc_html__( 'Choose default layout for social share', 'dunker-core' ),
					'default_value' => apply_filters( 'dunker_core_filter_social_share_layout_default_value', '' ),
					'options'       => apply_filters( 'dunker_core_filter_social_share_layout_options', array() ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_social_share_layout_options_map', $layout_tab );

			$cpt_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-social-cpt',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'CPT Settings', 'dunker-core' ),
					'description' => esc_html__( 'Social share CPT settings', 'dunker-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_social_share_cpt_options_map', $cpt_tab );

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_social_share_options_map', $page );
		}
	}

	add_action( 'dunker_core_action_default_options_init', 'dunker_core_add_page_social_share_options', dunker_core_get_admin_options_map_position( 'social-share' ) );
}
