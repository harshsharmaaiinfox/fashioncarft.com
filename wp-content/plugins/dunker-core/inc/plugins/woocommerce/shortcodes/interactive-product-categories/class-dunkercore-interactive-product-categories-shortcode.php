<?php

if ( ! function_exists( 'dunker_core_add_interactive_product_categories_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_interactive_product_categories_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Interactive_Product_Categories_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_interactive_product_categories_shortcode' );
}

if ( class_exists( 'DunkerCore_Shortcode' ) ) {
	class DunkerCore_Interactive_Product_Categories_Shortcode extends DunkerCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_cat' );
			$this->set_layouts( apply_filters( 'dunker_core_filter_interactive_product_categories_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'dunker_core_filter_interactive_product_categories_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_SHORTCODES_URL_PATH . '/interactive-product-categories' );
			$this->set_base( 'dunker_core_interactive_product_categories' );
			$this->set_name( esc_html__( 'Interactive Product Categories', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds interactive product categories holder', 'dunker-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'dunker-core' ),
				)
			);

			$options_map = dunker_core_get_variations_options_map( $this->get_layouts() );

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'layout',
					'title'         => esc_html__( 'Layout', 'dunker-core' ),
					'options'       => $this->get_layouts(),
					'default_value' => $options_map['default_value'],
					'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'skin',
					'title'      => esc_html__( 'Link Skin', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'shortcode_skin' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'background_color',
					'title'      => esc_html__( 'Background Color', 'dunker-core' ),
				)
			);
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'dunker-core' ),
				'options'       => dunker_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h1',
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'link_target',
				'title'         => esc_html__( 'Link Target', 'dunker-core' ),
				'options'       => dunker_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
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
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['post_type']      = $this->get_post_type();
			$atts['items'] = get_terms( dunker_core_get_custom_post_type_taxonomy_query_args( $atts, array( 'taxonomy' => $this->get_post_type_taxonomy() ) ) );

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['this_shortcode'] = $this;

			return dunker_core_get_template_part( 'plugins/woocommerce/shortcodes/interactive-product-categories', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-interactive-product-categories';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['skin'] ) ? 'qodef-skin--' . $atts['skin'] : '';

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['background_color'];
			}

			return $styles;
		}

		public function get_image_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['item_image'] ) ) {
				$styles[] = 'background-image: url(' . esc_url( wp_get_attachment_url( $atts['item_image'] ) ) . ')';
			}

			return $styles;
		}

		public function get_secondary_taxonomy_terms( $primary_taxonomy_ids, $atts ) {
			$secondary_terms = array();
			$term_args       = array();

			if ( ! empty( $primary_taxonomy_ids ) ) {
				$args            = array(
					'post_type'      => 'product',
					'posts_per_page' => -1,
					'fields'         => 'ids',
					'tax_query'      => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'id',
							'terms'    => $primary_taxonomy_ids,
						),
					),
				);
				$products_in_tax = get_posts( $args );
				$secondary_terms = wp_get_object_terms( $products_in_tax, 'product_brand', $term_args );
			}

			return $secondary_terms;
		}
	}
}
