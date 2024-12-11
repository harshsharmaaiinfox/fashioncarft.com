<?php

if ( ! function_exists( 'dunker_core_include_checkout_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function dunker_core_include_checkout_plugin_is_installed( $installed, $plugin ) {
		if ( 'checkout' === $plugin ) {
			return class_exists( 'DunkerCore_Checkout_Integration' ) && qode_framework_is_installed( 'woocommerce' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'dunker_core_include_checkout_plugin_is_installed', 10, 2 );
}

if ( ! function_exists( 'dunker_core_get_checkout_buy_item_form' ) ) {
	/**
	 * Function that loads buy item form template
	 *
	 * @return string|html
	 */
	function dunker_core_get_checkout_buy_item_form( $params = array(), $button_params = array() ) {
		$default_params = array(
			'layout'              => 'form',
			'show_quantity_field' => false,
			'quantity_value'      => 0,
		);

		$default_button_params = array(
			'input_text' => esc_html__( 'Add to cart', 'dunker-core' ),
		);

		$params                  = array_unique( array_merge( $default_params, $params ) );
		$params['button_params'] = array_unique( array_merge( $default_button_params, $button_params ) );

		ob_start();

		dunker_core_template_part( 'plugins/checkout', 'templates/' . $params['layout'], '', $params );

		$html = ob_get_clean();

		echo qode_framework_wp_kses_html( 'html', $html );
	}
}
