<?php

if ( ! function_exists( 'dunker_core_add_product_category_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_product_category_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Product_Category_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_product_category_list_shortcode' );
}

if ( class_exists( 'DunkerCore_List_Shortcode' ) ) {
	class DunkerCore_Product_Category_List_Shortcode extends DunkerCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_layouts( apply_filters( 'dunker_core_filter_product_category_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'dunker_core_filter_product_category_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-category-list' );
			$this->set_base( 'dunker_core_product_category_list' );
			$this->set_name( esc_html__( 'Product Category List', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of product categories', 'dunker-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'dunker-core' ),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior'      => array( 'justified-gallery' ),
					'include_slider_option' => array(
						'slider_slide_animation',
						'slider_direction',
						'slider_hidden_slides',
						'slider_mousewheel_navigation',
						'slider_centered_slides',
						'slider_drag_cursor',
					),
					'include_custom_space'  => array(
						'custom' => esc_html__( 'Custom', 'chateau-core' ),
					),
				)
			);
			$this->map_query_options(
				array(
					'exclude_option' => array( 'additional_params' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'hide_empty',
					'title'      => esc_html__( 'Hide Empty', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'no_yes', false ),
					'group'      => esc_html__( 'Query', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'additional_params',
					'title'      => esc_html__( 'Additional Params', 'dunker-core' ),
					'options'    => array(
						''   => esc_html__( 'No', 'dunker-core' ),
						'id' => esc_html__( 'Taxonomy IDs', 'dunker-core' ),
					),
					'group'      => esc_html__( 'Query', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'taxonomy',
					'title'      => esc_html__( 'Taxonomy', 'dunker-core' ),
					'options'    => array(
						'product_cat'   => esc_html__( 'Product Categories', 'dunker-core' ),
						'product_tag'   => esc_html__( 'Product Tags', 'dunker-core' ),
						'product_brand' => esc_html__( 'Product Brands', 'dunker-core' ),
					),
					'group'      => esc_html__( 'Query', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'taxonomy_ids',
					'title'       => esc_html__( 'Taxonomy IDs', 'dunker-core' ),
					'description' => esc_html__( 'Separate taxonomy IDs with commas', 'dunker-core' ),
					'group'       => esc_html__( 'Query', 'dunker-core' ),
					'dependency'  => array(
						'show' => array(
							'additional_params' => array(
								'values'        => 'id',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'dunker_core_product_category_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']      = $this->get_post_type();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['taxonomy_items'] = get_terms( dunker_core_get_custom_post_type_taxonomy_query_args( $atts, array( 'taxonomy' => $atts['taxonomy'] ) ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );

			$atts['this_shortcode'] = $this;

			return dunker_core_get_template_part( 'plugins/woocommerce/shortcodes/product-category-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-category-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$holder_styles = array();

			$list_styles   = $this->get_list_styles( $atts );
			$holder_styles = array_merge( $holder_styles, $list_styles );

			return $holder_styles;
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

		public function get_image_dimension( $atts ) {
			$image_dimension = array();

			if ( ! empty( $atts['behavior'] ) && 'masonry' == $atts['behavior'] && ! empty( $atts['masonry_images_proportion'] ) && 'fixed' == $atts['masonry_images_proportion'] ) {
				$image_dimension = dunker_core_get_custom_image_size_meta( 'taxonomy', 'qodef_product_category_masonry_size', $atts['category_id'] );
			}

			if ( ! empty( $atts['behavior'] ) && in_array( $atts['behavior'], array( 'columns', 'slider' ), true ) ) {
				$image_dimension = array(
					'size'  => $atts['images_proportion'],
					'class' => dunker_core_get_custom_image_size_class_name( $atts['images_proportion'] ),
				);
			}

			return $image_dimension;
		}
	}
}
