<?php

if ( ! function_exists( 'dunker_core_add_product_brand_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_product_brand_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Product_Brand_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_product_brand_list_shortcode' );
}

if ( class_exists( 'DunkerCore_List_Shortcode' ) ) {
	class DunkerCore_Product_Brand_List_Shortcode extends DunkerCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_brand' );
			$this->set_layouts( apply_filters( 'dunker_core_filter_product_brand_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'dunker_core_filter_product_brand_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-brand-list' );
			$this->set_base( 'dunker_core_product_brand_list' );
			$this->set_name( esc_html__( 'Brand Product List', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of product brands', 'dunker-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'dunker-core' ),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior' => array( 'justified-gallery', 'masonry', 'slider' ),
					'exclude_option'   => array( 'images_proportion' ),
				)
			);
			$this->map_query_options(
				array(
					'exclude_option' => array( 'additional_params', 'orderby', 'order', 'posts_per_page' ),
				)
			);
			$this->map_layout_options( array( 'layouts' => $this->get_layouts(), 'default_value_title_tag' => 'p' ) );
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'dunker_core_product_brand_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['order']          = 'ASC';
			$atts['post_type']      = $this->get_post_type();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['taxonomy_items'] = get_terms( dunker_core_get_custom_post_type_taxonomy_query_args( $atts, array( 'taxonomy' => $this->get_post_type_taxonomy() ) ) );

			$atts['this_shortcode'] = $this;

			return dunker_core_get_template_part( 'plugins/woocommerce/shortcodes/product-brand-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-brand-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts ) {
			$item_classes      = $this->init_item_classes();
			$list_item_classes = $this->get_list_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}

		public function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}

			return $styles;
		}
	}
}
