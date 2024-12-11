<?php

if ( ! function_exists( 'dunker_core_add_banner_carousel_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_banner_carousel_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Banner_Carousel_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_banner_carousel_shortcode' );
}

if ( class_exists( 'DunkerCore_List_Shortcode' ) ) {
	class DunkerCore_Banner_Carousel_Shortcode extends DunkerCore_List_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_SHORTCODES_URL_PATH . '/banner-carousel' );
			$this->set_base( 'dunker_core_banner_carousel' );
			$this->set_name( esc_html__( 'Banner Carousel', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds banner carousel element', 'dunker-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'dunker-core' ),
				)
			);

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'target',
					'title'         => esc_html__( 'Custom Link Target', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Child elements', 'dunker-core' ),
					'items'      => array(
						array(
							'field_type'    => 'text',
							'name'          => 'item_link',
							'title'         => esc_html__( 'Link', 'dunker-core' ),
							'default_value' => '',
						),
						array(
							'field_type' => 'text',
							'name'       => 'item_tagline',
							'title'      => esc_html__( 'Tagline', 'dunker-core' ),
						),
						array(
							'field_type' => 'text',
							'name'       => 'item_title',
							'title'      => esc_html__( 'Title', 'dunker-core' ),
						),
						array(
							'field_type' => 'text',
							'name'       => 'item_subtitle',
							'title'      => esc_html__( 'Subtitle', 'dunker-core' ),
						),
						array(
							'field_type' => 'image',
							'name'       => 'item_image',
							'title'      => esc_html__( 'Image', 'dunker-core' ),
						),
						array(
							'field_type' => 'select',
							'name'       => 'item_skin',
							'title'      => esc_html__( 'Skin', 'dunker-core' ),
							'options'    => dunker_core_get_select_type_options_pool( 'shortcode_skin' ),
						),
					),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior'      => array( 'columns', 'masonry', 'justified-gallery' ),
					'exclude_option'        => array( 'images_proportion' ),
					'group'                 => esc_html__( 'Slider Settings', 'dunker-core' ),
					'include_slider_option' => array(
						'partial_columns',
						'slider_slide_animation',
						'slider_direction',
						'slider_hidden_slides',
						'slider_mousewheel_navigation',
						'slider_centered_slides',
						'slider_drag_cursor',
					),
					'include_custom_space'  => array(
						'custom' => esc_html__( 'Custom', 'dunker-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'image_min_height_1024',
					'title'      => esc_html__( 'Image Min Height 1024', 'dunker-core' ),
					'group'      => esc_html__( 'Responsive Styles', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'image_min_height_768',
					'title'      => esc_html__( 'Image Min Height 768', 'dunker-core' ),
					'group'      => esc_html__( 'Responsive Styles', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'image_min_height_680',
					'title'      => esc_html__( 'Image Min Height 680', 'dunker-core' ),
					'group'      => esc_html__( 'Responsive Styles', 'dunker-core' ),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'dunker_core_banner_carousel', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['unique']       = rand( 0, 1000 );
			$atts['unique_class'] = 'qodef-banner-carousel-' . $atts['unique'];

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['slider_attr']    = $this->get_slider_data( $atts, array( 'unique' => $atts['unique'] ) );
			$atts['this_shortcode'] = $this;
			$this->set_image_responsive_styles( $atts );

			return dunker_core_get_template_part( 'shortcodes/banner-carousel', 'templates/banner-carousel-slider', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-banner-carousel';
			$holder_classes[] = $atts['unique_class'];
			$holder_classes[] = ! empty( $atts['image_action'] ) && 'open-popup' === $atts['image_action'] ? 'qodef-magnific-popup qodef-popup-gallery' : '';

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
			$item_classes   = $this->init_item_classes();
			$item_classes[] = 'qodef-m-item';
			$item_classes[] = 'swiper-slide';
			$item_classes[] = ! empty( $atts['item_skin'] ) ? 'qodef-skin--' . $atts['item_skin'] : '';

			return implode( ' ', $item_classes );
		}

		public function get_image_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['item_image'] ) ) {
				$styles[] = 'background-image: url(' . esc_url( wp_get_attachment_url( $atts['item_image'] ) ) . ')';
			}

			return $styles;
		}

		private function set_image_responsive_styles( $atts ) {
			$unique_class = '.' . $atts['unique_class'];
			$screen_sizes = array( '1024', '768', '680' );

			foreach ( $screen_sizes as $screen_size ) {
				$styles = array();

				$option_value = $atts[ 'image_min_height_' . $screen_size ];

				if ( '' !== $option_value ) {
					if ( qode_framework_string_ends_with_typography_units( $option_value ) ) {
						$styles['min-height'] = $option_value . '!important';
					} else {
						$styles['min-height'] = intval( $option_value ) . 'px !important';
					}
				}

				if ( ! empty( $styles ) ) {
					add_filter(
						'dunker_core_filter_add_responsive_' . $screen_size . '_inline_style_in_footer',
						function ( $style ) use ( $unique_class, $styles ) {
							$style .= qode_framework_dynamic_style( $unique_class . ' .qodef-m-image img', $styles );

							return $style;
						}
					);
				}
			}
		}
	}
}
