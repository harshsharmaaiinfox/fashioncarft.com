<?php

if ( ! function_exists( 'dunker_register_required_plugins' ) ) {
	/**
	 * Function that registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */
	function dunker_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'Qode Framework', 'dunker' ),
				'slug'               => 'qode-framework',
				'source'             => DUNKER_INC_ROOT_DIR . '/plugins/qode-framework.zip',
				'version'            => '1.2.3',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => esc_html__( 'Dunker Core', 'dunker' ),
				'slug'               => 'dunker-core',
				'source'             => DUNKER_INC_ROOT_DIR . '/plugins/dunker-core.zip',
				'version'            => '1.0.3',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => esc_html__( 'Revolution Slider', 'dunker' ),
				'slug'               => 'revslider',
				'source'             => DUNKER_INC_ROOT_DIR . '/plugins/revslider.zip',
				'version'            => '6.7.11',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'     => esc_html__( 'Elementor Page Builder', 'dunker' ),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Qi Addons for Elementor', 'dunker' ),
				'slug'     => 'qi-addons-for-elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Qi Blocks', 'dunker' ),
				'slug'     => 'qi-blocks',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'QODE Wishlist for WooCommerce', 'dunker' ),
				'slug'     => 'qode-wishlist-for-woocommerce',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'QODE Quick View for WooCommerce', 'dunker' ),
				'slug'     => 'qode-quick-view-for-woocommerce',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'WooCommerce Plugin', 'dunker' ),
				'slug'     => 'woocommerce',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'dunker' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Custom Twitter Feeds', 'dunker' ),
				'slug'     => 'custom-twitter-feeds',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Instagram Feed', 'dunker' ),
				'slug'     => 'instagram-feed',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'dunker' ),
				'slug'     => 'envato-market',
				'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'YITH Color and Label Variations', 'dunker' ),
				'slug'     => 'yith-color-and-label-variations-for-woocommerce',
				'required' => false,
			),
		);

		$config = array(
			'domain'       => 'dunker',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'dunker' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'dunker' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'dunker' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'dunker' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'dunker' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'dunker' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this website for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'dunker' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'dunker' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'dunker' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this website for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'dunker' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'dunker' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this website for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'dunker' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'dunker' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'dunker' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'dunker' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'dunker' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'dunker' ),
				'nag_type'                        => 'updated',
			),
		);

		tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'dunker_register_required_plugins' );
}
