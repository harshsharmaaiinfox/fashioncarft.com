<?php

if ( ! function_exists( 'dunker_core_add_woo_side_area_cart_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function dunker_core_add_woo_side_area_cart_widget( $widgets ) {
		$widgets[] = 'DunkerCore_WooCommerce_Side_Area_Cart_Widget';

		return $widgets;
	}

	add_filter( 'dunker_core_filter_register_widgets', 'dunker_core_add_woo_side_area_cart_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class DunkerCore_WooCommerce_Side_Area_Cart_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'dunker_core_woo_side_area_cart' );
			$this->set_name( esc_html__( 'Dunker WooCommerce Side Area Cart', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Display a shop cart icon with that shows products count that are in the cart', 'dunker-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'widget_padding',
					'title'       => esc_html__( 'Widget Padding', 'dunker-core' ),
					'description' => esc_html__( 'Insert padding in format: top right bottom left', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'widget_skin',
					'title'      => esc_html__( 'Widget Skin', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'header_skin', false ),
				)
			);
		}

		public function load_assets() {
			wp_enqueue_style( 'perfect-scrollbar', DUNKER_CORE_URL_PATH . 'assets/plugins/perfect-scrollbar/perfect-scrollbar.css', array() );
			wp_enqueue_script( 'perfect-scrollbar', DUNKER_CORE_URL_PATH . 'assets/plugins/perfect-scrollbar/perfect-scrollbar.jquery.min.js', array( 'jquery' ), false, true );
		}

		public function render( $atts ) {
			$styles = array();

			if ( ! empty( $atts['widget_padding'] ) ) {
				$styles[] = 'padding: ' . $atts['widget_padding'];
			}
			?>
			<div class="qodef-widget-side-area-cart-outer qodef-skin--<?php echo esc_attr( $atts['widget_skin'] ); ?>" <?php qode_framework_inline_style( $styles ); ?>>
				<div class="qodef-widget-side-area-cart-inner">
					<?php dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/opener' ); ?>
					<?php dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/content' ); ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'dunker_core_woo_side_area_cart_add_to_cart_fragment' ) ) {
	/**
	 * Function that return|update new cart content for products which are added into the cart
	 *
	 * @param array $fragments
	 *
	 * @return array
	 */
	function dunker_core_woo_side_area_cart_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<div class="qodef-widget-side-area-cart-inner">
			<?php dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/opener' ); ?>
			<?php dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/content' ); ?>
		</div>
		<?php
		$fragments['.qodef-widget-side-area-cart-inner'] = ob_get_clean();

		return $fragments;
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'dunker_core_woo_side_area_cart_add_to_cart_fragment' );
}
