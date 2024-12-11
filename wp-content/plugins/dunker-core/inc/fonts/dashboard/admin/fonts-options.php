<?php

if ( ! function_exists( 'dunker_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function dunker_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => DUNKER_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'dunker-core' ),
				'description' => esc_html__( 'Global Fonts Options', 'dunker-core' ),
				'icon'        => 'fa fa-cog',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'dunker-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts',
					),
				)
			);

			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts to Include', 'dunker-core' ),
					'description' => esc_html__( 'Choose Google Fonts which you want to use on your website', 'dunker-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'dunker-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type'  => 'googlefont',
					'name'        => 'qodef_choose_google_font',
					'title'       => esc_html__( 'Google Font', 'dunker-core' ),
					'description' => esc_html__( 'Choose Google Font', 'dunker-core' ),
					'args'        => array(
						'include' => 'google-fonts',
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Weight', 'dunker-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts weights for your website. Impact on page load time', 'dunker-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'dunker-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'dunker-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'dunker-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'dunker-core' ),
						'300'  => esc_html__( '300 Light', 'dunker-core' ),
						'300i' => esc_html__( '300 Light Italic', 'dunker-core' ),
						'400'  => esc_html__( '400 Regular', 'dunker-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'dunker-core' ),
						'500'  => esc_html__( '500 Medium', 'dunker-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'dunker-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'dunker-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'dunker-core' ),
						'700'  => esc_html__( '700 Bold', 'dunker-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'dunker-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'dunker-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'dunker-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'dunker-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'dunker-core' ),
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style', 'dunker-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts style for your website. Impact on page load time', 'dunker-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'dunker-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'dunker-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'dunker-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'dunker-core' ),
						'greek'        => esc_html__( 'Greek', 'dunker-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'dunker-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'dunker-core' ),
					),
				)
			);

			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'dunker-core' ),
					'description' => esc_html__( 'Add custom fonts', 'dunker-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'dunker-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_ttf',
					'title'      => esc_html__( 'Custom Font TTF', 'dunker-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_otf',
					'title'      => esc_html__( 'Custom Font OTF', 'dunker-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff',
					'title'      => esc_html__( 'Custom Font WOFF', 'dunker-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff2',
					'title'      => esc_html__( 'Custom Font WOFF2', 'dunker-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_custom_font_name',
					'title'      => esc_html__( 'Custom Font Name', 'dunker-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_page_fonts_options_map', $page );
		}
	}

	add_action( 'dunker_core_action_default_options_init', 'dunker_core_add_fonts_options', dunker_core_get_admin_options_map_position( 'fonts' ) );
}
