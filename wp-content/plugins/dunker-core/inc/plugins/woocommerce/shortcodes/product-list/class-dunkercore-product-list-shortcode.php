<?php

if ( ! function_exists( 'dunker_core_add_product_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_product_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Product_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_product_list_shortcode' );
}

if ( class_exists( 'DunkerCore_List_Shortcode' ) ) {
	class DunkerCore_Product_List_Shortcode extends DunkerCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_cat' );
			$this->set_post_type_additional_taxonomies( array( 'product_tag', 'product_type' ) );
			$this->set_layouts( apply_filters( 'dunker_core_filter_product_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'dunker_core_filter_product_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-list' );
			$this->set_base( 'dunker_core_product_list' );
			$this->set_name( esc_html__( 'Product List', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of products', 'dunker-core' ) );
			$this->set_scripts(
				array(
					'jquery-ui-slider' => array(
						'registered' => true,
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'dunker-core' ),
				)
			);
			$this->map_list_options(
				array( 'space_between_default' => 'no' )
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_custom_span',
					'title'         => esc_html__( 'Enable Custom Column Span', 'dunker-core' ),
					'description'   => esc_html__( 'If you set this option to “Yes”, the column span values selected in the Product List Column Span field will be applied', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'behavior' => array(
								'values'        => 'columns',
								'default_value' => 'columns',
							),
						),
					),
				)
			);
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'filterby',
					'title'         => esc_html__( 'Filter By', 'dunker-core' ),
					'options'       => array(
						''             => esc_html__( 'Default', 'dunker-core' ),
						'on_sale'      => esc_html__( 'On Sale', 'dunker-core' ),
						'featured'     => esc_html__( 'Featured', 'dunker-core' ),
						'top_rated'    => esc_html__( 'Top Rated', 'dunker-core' ),
						'best_selling' => esc_html__( 'Best Selling', 'dunker-core' ),
					),
					'default_value' => '',
					'group'         => esc_html__( 'Query', 'dunker-core' ),
				)
			);
			$this->map_layout_options(
				array(
					'layouts'                 => $this->get_layouts(),
					'default_value_title_tag' => '',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'hover_type',
					'title'         => esc_html__( 'Hover Type', 'dunker-core' ),
					'options'       => array(
						'slider'  => esc_html__( 'Slider', 'dunker-core' ),
						'none'    => esc_html__( 'Zoom In', 'dunker-core' ),
						'default' => esc_html__( 'None', 'dunker-core' ),
					),
					'default_value' => 'slider',
					'dependency'    => array(
						'show' => array(
							'layout' => array(
								'values'        => 'info-below',
								'default_value' => 'info-below',
							),
						),
					),
					'group'         => esc_html__( 'Layout', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_wishlist',
					'title'         => esc_html__( 'Enable Wishlist Button', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'yes_no', false ),
					'default_value' => 'yes',
					'dependency'    => array(
						'show' => array(
							'layout' => array(
								'values'        => 'info-below',
								'default_value' => 'info-below',
							),
						),
					),
					'group'         => esc_html__( 'Layout', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_image_border',
					'title'         => esc_html__( 'Enable Image Border', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'yes_no' ),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'layout' => array(
								'values'        => 'info-below',
								'default_value' => 'info-below',
							),
						),
					),
					'group'         => esc_html__( 'Layout', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_item_border',
					'title'         => esc_html__( 'Enable Item Border', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'yes_no' ),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'layout' => array(
								'values'        => 'info-below',
								'default_value' => 'info-below',
							),
						),
					),

					'group'         => esc_html__( 'Layout', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'use_background_image',
					'title'         => esc_html__( 'Use Background Image', 'dunker-core' ),
					'description'   => esc_html__( 'Uses background image if one is uploaded for the list product item.', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
					'dependency'    => array(
						'show' => array(
							'layout' => array(
								'values'        => 'info-below',
								'default_value' => 'info-below',
							),
						),
					),

					'group'         => esc_html__( 'Layout', 'dunker-core' ),
				)
			);
			$this->map_additional_options( array( 'exclude_filter' ) );
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_filter',
					'title'         => esc_html__( 'Enable Filter', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'yes_no', false ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Filter', 'dunker-core' ),
					'dependency'    => array(
						'hide' => array(
							'behavior' => array(
								'values'        => 'slider',
								'default_value' => 'columns',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'filter_type',
					'title'         => esc_html__( 'Filter Type', 'dunker-core' ),
					'options'       => array(
						'simple'   => esc_html__( 'Simple', 'dunker-core' ),
						'advanced' => esc_html__( 'Advanced', 'dunker-core' ),
					),
					'default_value' => 'simple',
					'group'         => esc_html__( 'Filter', 'dunker-core' ),
					'dependency'    => array(
						'show' => array(
							'enable_filter' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'simple_filter_term',
					'title'      => esc_html__( 'Simple Filter Term', 'dunker-core' ),
					'options'    => array(
						'product_cat'  => esc_html__( 'Product Category', 'dunker-core' ),
						'product_tag'  => esc_html__( 'Product Tag', 'dunker-core' ),
						'product_type' => esc_html__( 'Product Type', 'dunker-core' ),
					),
					'group'      => esc_html__( 'Filter', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'filter_type' => array(
								'values'        => 'simple',
								'default_value' => 'simple',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'advanced_filter_type',
					'title'         => esc_html__( 'Advanced Filter Type', 'dunker-core' ),
					'options'       => array(
						''             => esc_html__( 'None', 'dunker-core' ),
						'sidebar'      => esc_html__( 'Sidebar', 'dunker-core' ),
						'top'          => esc_html__( 'Top', 'dunker-core' ),
						'top-category' => esc_html__( 'Top Category', 'dunker-core' ),
					),
					'default_value' => '',
					'group'         => esc_html__( 'Filter', 'dunker-core' ),
					'dependency'    => array(
						'show' => array(
							'filter_type' => array(
								'values'        => 'advanced',
								'default_value' => 'simple',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'category_filter_type',
					'title'      => esc_html__( 'Category Filter Type', 'dunker-core' ),
					'options'    => array(
						'standard' => esc_html__( 'Standard', 'dunker-core' ),
						'image'    => esc_html__( 'With Image', 'dunker-core' ),
					),
					'group'      => esc_html__( 'Filter', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'advanced_filter_type' => array(
								'values'        => 'top-category',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'remove_side_padding',
					'title'      => esc_html__( 'Remove Filter Holder Side Padding', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'no_yes', false ),
					'default'    => 'no',
					'group'      => esc_html__( 'Filter', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'advanced_filter_type' => array(
								'values'        => 'top-category',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'first_attribute_filter',
					'title'      => esc_html__( 'First Attribute Filter', 'dunker-core' ),
					'options'    => $this->get_product_attributes(),
					'group'      => esc_html__( 'Filter', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'advanced_filter_type' => array(
								'values'        => array( 'top', 'sidebar' ),
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'second_attribute_filter',
					'title'      => esc_html__( 'Second Attribute Filter', 'dunker-core' ),
					'options'    => $this->get_product_attributes(),
					'group'      => esc_html__( 'Filter', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'advanced_filter_type' => array(
								'values'        => array( 'top', 'sidebar' ),
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'select',
					'name'        => 'hide_children_filter_terms',
					'title'       => esc_html__( 'Hide Children Filter Terms', 'dunker-core' ),
					'description' => esc_html__( 'Only top level parents for secondary terms will be displayed.', 'dunker-core' ),
					'options'     => dunker_core_get_select_type_options_pool( 'no_yes', false ),
					'default'     => 'no',
					'group'       => esc_html__( 'Filter', 'dunker-core' ),
					'dependency'  => array(
						'show' => array(
							'advanced_filter_type' => array(
								'values'        => 'top',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'content_padding',
					'title'       => esc_html__( 'Content Padding', 'dunker-core' ),
					'description' => esc_html__( 'Set padding that will be applied for content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'dunker-core' ),
					'group'       => esc_html__( 'Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'image_margin_bottom',
					'title'      => esc_html__( 'Image Bottom Margin', 'dunker-core' ),
					'group'      => esc_html__( 'Style', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        => 'info-below',
								'default_value' => 'info-below',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'filter_top_padding',
					'title'      => esc_html__( 'Filter Holder Side Padding', 'dunker-core' ),
					'group'      => esc_html__( 'Style', 'dunker-core' ),
					'dependency' => array(
						'show' => array(
							'advanced_filter_type' => array(
								'values'        => 'top',
								'default_value' => 'sidebar',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'content_padding1440',
					'title'       => esc_html__( 'Content Padding 1440', 'dunker-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1440', 'dunker-core' ),
					'group'       => esc_html__( 'Responsive Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'content_padding1366',
					'title'       => esc_html__( 'Content Padding 1366', 'dunker-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1366', 'dunker-core' ),
					'group'       => esc_html__( 'Responsive Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'content_padding1280',
					'title'       => esc_html__( 'Content Padding 1280', 'dunker-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1280', 'dunker-core' ),
					'group'       => esc_html__( 'Responsive Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'content_padding1024',
					'title'       => esc_html__( 'Content Padding 1024', 'dunker-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 1024', 'dunker-core' ),
					'group'       => esc_html__( 'Responsive Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'content_padding680',
					'title'       => esc_html__( 'Content Padding 680', 'dunker-core' ),
					'description' => esc_html__( 'Set responsive style value for screen size 680', 'dunker-core' ),
					'group'       => esc_html__( 'Responsive Style', 'dunker-core' ),
				)
			);
			$this->map_extra_options();
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'dunker_core_product_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']       = $this->get_post_type();
			$atts['taxonomy_filter'] = $this->get_post_type_filter_taxonomy( $atts );

			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['query_result']   = new \WP_Query( dunker_core_get_query_params( $atts ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			$atts['data_attr']      = dunker_core_get_pagination_data( DUNKER_CORE_REL_PATH, 'plugins/woocommerce/shortcodes', 'product-list', 'product', $atts );
			if ( 'yes' === $atts['enable_filter'] ) {
				$filter_items = dunker_get_filter_items( $atts );
				if ( isset( $atts['tax'] ) && ! empty( $atts['tax'] ) ) {
					$primary_tax_ids = dunker_get_filter_items( array_merge( $atts, array( 'fields' => 'ids' ) ) );
					if ( 'simple' === $atts['filter_type'] ) {
						$taxonomy             = $atts['simple_filter_term'];
						$atts['filter_items'] = ( $taxonomy === $atts['tax'] ) ? $filter_items : $this->get_secondary_taxonomy_terms( $primary_tax_ids, $taxonomy, $atts );
					} else {
						if ( 'product_cat' === $atts['tax'] ) {
							$atts['product_categories'] = $filter_items;
							$atts['product_tags']       = $this->get_secondary_taxonomy_terms( $primary_tax_ids, 'product_tag', $atts );
						} elseif ( 'product_tag' === $atts['tax'] ) {
							$atts['product_tags']       = $filter_items;
							$atts['product_categories'] = $this->get_secondary_taxonomy_terms( $primary_tax_ids, 'product_cat', $atts );
						} elseif ( 'product_type' === $atts['tax'] ) {
							$atts['product_categories'] = $this->get_secondary_taxonomy_terms( $primary_tax_ids, 'product_cat', $atts );
							$atts['product_tags']       = $this->get_secondary_taxonomy_terms( $primary_tax_ids, 'product_tag', $atts );
						}
						if ( in_array( $atts['advanced_filter_type'], array( 'sidebar', 'top' ), true ) ) {
							$atts['product_brands'] = $this->get_secondary_taxonomy_terms( $primary_tax_ids, 'product_brand', $atts );
						}
					}
				} else {
					if ( 'simple' === $atts['filter_type'] ) {
						$atts['filter_items'] = $filter_items;
					} else {
						$atts['product_categories'] = $this->get_all_terms( 'product_cat' );
						$atts['product_tags']       = $this->get_all_terms( 'product_tag' );
						$atts['product_brands']     = $this->get_all_terms( 'product_brand' );
					}
				}
			}
			$atts['this_shortcode'] = $this;

			return dunker_core_get_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_secondary_taxonomy_terms( $primary_taxonomy_ids, $secondary_tax, $atts ) {
			$secondary_terms = array();
			$term_args       = array();

			if ( isset( $atts['hide_children_filter_terms'] ) && 'no' !== $atts['hide_children_filter_terms'] ) {
				$term_args = array( 'parent' => 0 );
			}

			if ( ! empty( $primary_taxonomy_ids ) ) {
				$args            = array(
					'post_type'      => 'product',
					'posts_per_page' => -1,
					'fields'         => 'ids',
					'tax_query'      => array(
						array(
							'taxonomy' => $atts['tax'],
							'field'    => 'id',
							'terms'    => $primary_taxonomy_ids,
						),
					),
				);
				$products_in_tax = get_posts( $args );
				$secondary_terms = wp_get_object_terms( $products_in_tax, $secondary_tax, $term_args );
			}

			return $secondary_terms;
		}

		private function get_all_terms( $taxonomy ) {
			return get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => true,
					'orderby'    => 'name',
				)
			);
		}

		public function get_additional_query_args( $atts ) {
			$args = parent::get_additional_query_args( $atts );

			if ( ! empty( $atts['filterby'] ) ) {
				switch ( $atts['filterby'] ) {
					case 'on_sale':
						$sale_products         = wc_get_product_ids_on_sale();
						$args['no_found_rows'] = 1;
						$args['post__in']      = array_merge( array( 0 ), $sale_products );

						if ( ! empty( $atts['additional_params'] ) && 'id' === $atts['additional_params'] && ! empty( $atts['post_ids'] ) ) {
							$post_ids          = array_map( 'intval', explode( ',', $atts['post_ids'] ) );
							$new_sale_products = array();

							foreach ( $post_ids as $post_id ) {
								if ( in_array( $post_id, $sale_products, true ) ) {
									$new_sale_products[] = $post_id;
								}
							}

							if ( ! empty( $new_sale_products ) ) {
								$args['post__in'] = $new_sale_products;
							}
						}

						break;
					case 'featured':
						$featured_tax_query   = WC()->query->get_tax_query();
						$featured_tax_query[] = array(
							'taxonomy'         => 'product_visibility',
							'terms'            => 'featured',
							'field'            => 'name',
							'operator'         => 'IN',
							'include_children' => false,
						);

						if ( isset( $args['tax_query'] ) && ! empty( $args['tax_query'] ) ) {
							$args['tax_query'] = array_merge( $args['tax_query'], $featured_tax_query );
						} else {
							$args['tax_query'] = $featured_tax_query;
						}

						break;
					case 'top_rated':
						$args['meta_key'] = '_wc_average_rating';
						$args['order']    = 'DESC';
						$args['orderby']  = 'meta_value_num';
						break;
					case 'best_selling':
						$args['meta_key'] = 'total_sales';
						$args['order']    = 'DESC';
						$args['orderby']  = 'meta_value_num';
						break;
				}
			}

			return $args;
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			$holder_classes[] = isset( $atts['hover_type'] ) ? 'qodef-hover-type--' . $atts['hover_type'] : '';
			$holder_classes[] = isset( $atts['enable_item_border'] ) && '' !== $atts['enable_item_border'] ? 'qodef-item-border--' . $atts['enable_item_border'] : '';
			$holder_classes[] = isset( $atts['enable_image_border'] ) && '' !== $atts['enable_image_border'] ? 'qodef-image-border--' . $atts['enable_image_border'] : '';
			$holder_classes[] = isset( $atts['enable_wishlist'] ) && '' !== $atts['enable_wishlist'] ? 'qodef-wishlist--' . $atts['enable_wishlist'] : '';
			$holder_classes[] = ! empty( $atts['advanced_filter_type'] ) ? 'qodef-filter-type--' . $atts['advanced_filter_type'] : '';
			$holder_classes[] = ! empty( $atts['category_filter_type'] ) ? 'qodef-category-filter-type--' . $atts['category_filter_type'] : '';
			$holder_classes[] = isset( $atts['enable_custom_span'] ) && 'yes' === $atts['enable_custom_span'] ? 'qodef-grid-custom-span' : '';
			$holder_classes[] = isset( $atts['use_background_image'] ) && 'yes' === $atts['use_background_image'] ? 'qodef-has-background-image' : '';
			$holder_classes[] = isset( $atts['remove_side_padding'] ) && 'yes' === $atts['remove_side_padding'] ? 'qodef-filter-holder--no-side-padding' : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$styles = array();

			if ( isset( $atts['filter_top_padding'] ) && '' !== $atts['filter_top_padding'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['filter_top_padding'] ) ) {
					$styles[] = '--filter-top-side-padding: ' . $atts['filter_top_padding'];
				} else {
					$styles[] = '--filter-top-side-padding: ' . intval( $atts['filter_top_padding'] ) . 'px';
				}
			}
			if ( isset( $atts['image_margin_bottom'] ) && '' !== $atts['image_margin_bottom'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['image_margin_bottom'] ) ) {
					$styles[] = '--qode-image-margin: ' . $atts['image_margin_bottom'];
				} else {
					$styles[] = '--qode-image-margin: ' . intval( $atts['image_margin_bottom'] ) . 'px';
				}
			}

			$screen_sizes = array( '', '1440', '1366', '1280', '1024', '680' );

			foreach ( $screen_sizes as $screen_size ) {
				if ( isset( $atts[ 'content_padding' . $screen_size ] ) && '' !== $atts[ 'content_padding' . $screen_size ] ) {
					$styles[] = '--qode-pl-padding' . $screen_size . ': ' . $atts[ 'content_padding' . $screen_size ];
				}
			}

			return $styles;
		}

		public function get_item_classes( $atts ) {
			$item_classes      = $this->init_item_classes();
			$list_item_classes = $this->get_list_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $list_item_classes );

			if ( isset( $atts['enable_custom_span'] ) && 'yes' === $atts['enable_custom_span'] ) {
				$item_classes[] = 'qodef-column-span--' . get_post_meta( get_the_ID(), 'qodef_product_column_span', true );
			}

			$bg_image_id = get_post_meta( get_the_ID(), 'qodef_product_list_background_image', true );
			if ( ! empty( $bg_image_id ) ) {
				$item_classes[] = 'qodef-item-has-background';
			}

			return implode( ' ', $item_classes );
		}

		public function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}

			return $styles;
		}

		private function get_product_attributes() {
			global $wpdb;

			$attribute_array      = array();
			$attribute_taxonomies = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'woocommerce_attribute_taxonomies order by attribute_name ASC;' );
			if ( ! empty( $attribute_taxonomies ) ) {
				foreach ( $attribute_taxonomies as $tax ) {
					$attribute_array[ $tax->attribute_name ] = $tax->attribute_label;
				}
			} else {
				$attribute_array[''] = esc_html__( 'No available attributes', 'dunker-core' );
			}

			return $attribute_array;
		}
	}
}
