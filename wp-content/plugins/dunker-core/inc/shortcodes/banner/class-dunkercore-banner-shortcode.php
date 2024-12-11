<?php

if ( ! function_exists( 'dunker_core_add_banner_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_banner_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Banner_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_banner_shortcode' );
}

if ( class_exists( 'DunkerCore_Shortcode' ) ) {
	class DunkerCore_Banner_Shortcode extends DunkerCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'dunker_core_filter_banner_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'dunker_core_filter_banner_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_SHORTCODES_URL_PATH . '/banner' );
			$this->set_base( 'dunker_core_banner' );
			$this->set_name( esc_html__( 'Banner', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds banner element', 'dunker-core' ) );
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
					'field_type' => 'image',
					'name'       => 'image',
					'title'      => esc_html__( 'Image', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link_url',
					'title'      => esc_html__( 'Link', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'title',
					'title'         => esc_html__( 'Title', 'dunker-core' ),
					'default_value' => esc_html__( 'Title Text', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h3',
					'group'         => esc_html__( 'Title Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'dunker-core' ),
					'group'      => esc_html__( 'Title Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_margin_top',
					'title'      => esc_html__( 'Title Margin Top', 'dunker-core' ),
					'group'      => esc_html__( 'Title Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'subtitle',
					'title'      => esc_html__( 'Subtitle', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'subtitle_tag',
					'title'         => esc_html__( 'Subtitle Tag', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h5',
					'group'         => esc_html__( 'Subtitle Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'subtitle_color',
					'title'      => esc_html__( 'Subtitle Color', 'dunker-core' ),
					'group'      => esc_html__( 'Subtitle Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'subtitle_margin_top',
					'title'      => esc_html__( 'Subtitle Margin Top', 'dunker-core' ),
					'group'      => esc_html__( 'Subtitle Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'textarea',
					'name'       => 'text_field',
					'title'      => esc_html__( 'Text', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'text_tag',
					'title'         => esc_html__( 'Text Tag', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'p',
					'group'         => esc_html__( 'Text Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'dunker-core' ),
					'group'      => esc_html__( 'Text Style', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_margin_top',
					'title'      => esc_html__( 'Text Margin Top', 'dunker-core' ),
					'group'      => esc_html__( 'Text Style', 'dunker-core' ),
				)
			);
			$this->set_option(
			    array(
                    'field_type' => 'select',
                    'name'       => 'content_alignment',
                    'title'      => esc_html__( 'Content Alignment', 'dunker-core' ),
                    'options'    => array(
                        ''       => esc_html__( 'Default', 'dunker-core' ),
                        'top'   => esc_html__( 'Top', 'dunker-core' ),
                        'center' => esc_html__( 'Center', 'dunker-core' ),
                        'bottom'  => esc_html__( 'Bottom', 'dunker-core' ),
                    ),
                    'dependency' => array(
                        'show' => array(
                            'layout' => array(
                                'values' => 'link-button',
                                'default_value' => ''
                            )
                        )
                    )
                )
            );
			$this->set_option(
			    array(
			        'field_type'    => 'select',
                    'name'          => 'center_content',
                    'title'         => esc_html__('Center Content in the middle of the box', 'dunker-core'),
                    'options'       => dunker_core_get_select_type_options_pool('yes_no'),
                    'default_value' => 'no',
                    'dependency'   => array(
                        'show' => array(
                            'content_alignment' => array(
                                'values'        => 'center',
                                'default_value' => '',
                            ),
                        ),
                    ),
                )
            );
            $this->set_option(
                array(
                    'field_type' => 'select',
                    'name'       => 'enable_border',
                    'title'      => esc_html__( 'Enable Border Around Banner', 'dunker-core' ),
                    'options'    => dunker_core_get_select_type_options_pool('yes_no'),
                    'default_value' => 'no',
                    'dependency' => array(
                        'show' => array(
                            'layout' => array(
                                'values' => 'link-overlay',
                                'default_value' => ''
                            )
                        )
                    )
                )
            );
			$this->import_shortcode_options(
				array(
					'shortcode_base'    => 'dunker_core_button',
					'exclude'           => array( 'custom_class', 'link', 'target' ),
					'additional_params' => array(
						'nested_group' => esc_html__( 'Button', 'dunker-core' ),
						'dependency'   => array(
							'show' => array(
								'layout' => array(
									'values'        => 'link-button',
									'default_value' => '',
								),
							),
						),
					),
				)
			);

			$this->map_extra_options();

			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'image_min_height_1024',
					'title'       => esc_html__( 'Image Min Height 1024', 'dunker-core' ),
					'group'       => esc_html__( 'Responsive Styles', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'image_min_height_768',
					'title'       => esc_html__( 'Image Min Height 768', 'dunker-core' ),
					'group'       => esc_html__( 'Responsive Styles', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'image_min_height_680',
					'title'       => esc_html__( 'Image Min Height 680', 'dunker-core' ),
					'group'       => esc_html__( 'Responsive Styles', 'dunker-core' ),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['unique_class']   = 'qodef-banner-' . rand( 0, 1000 );

			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['title_styles']    = $this->get_title_styles( $atts );
			$atts['subtitle_styles'] = $this->get_subtitle_styles( $atts );
			$atts['text_styles']     = $this->get_text_styles( $atts );
			$atts['button_params']   = $this->generate_button_params( $atts );
			$this->set_image_responsive_styles( $atts );

			return dunker_core_get_template_part( 'shortcodes/banner', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-banner';
			$holder_classes[] = $atts['unique_class'];
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
            $holder_classes[] = ! empty( $atts['content_alignment'] ) ? 'qodef-alignment--' . $atts['content_alignment'] : 'qodef-alignment--center';
            $holder_classes[] = isset( $atts['center_content'] ) && 'yes' === $atts['center_content'] ? 'qodef-center-content' : '';
            $holder_classes[] = isset( $atts['enable_border'] ) && 'yes' === $atts['enable_border'] ? 'qodef-border-enabled' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['title_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			return $styles;
		}

		private function get_subtitle_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['subtitle_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['subtitle_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['subtitle_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['subtitle_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['subtitle_color'] ) ) {
				$styles[] = 'color: ' . $atts['subtitle_color'];
			}

			return $styles;
		}

		private function get_text_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['text_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['text_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['text_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}

			return $styles;
		}

		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts(
				array(
					'shortcode_base' => 'dunker_core_button',
					'exclude'        => array( 'custom_class', 'link', 'target' ),
					'atts'           => $atts,
				)
			);

			$params['link']   = ! empty( $atts['link_url'] ) ? $atts['link_url'] : '';
			$params['target'] = ! empty( $atts['link_target'] ) ? $atts['link_target'] : '';

			return $params;
		}

		private function set_image_responsive_styles( $atts ) {
			$unique_class = '.' . $atts['unique_class'];
			$screen_sizes = array( '1024', '768', '680' );

			foreach ( $screen_sizes as $screen_size ) {
				$styles = array();

				$option_value = $atts[ 'image_min_height_' . $screen_size ];

				if ( '' !== $option_value ) {
					if ( qode_framework_string_ends_with_typography_units( $option_value ) ) {
						$styles[ 'min-height' ] = $option_value . '!important';
					} else {
						$styles[ 'min-height' ] = intval( $option_value ) . 'px !important';
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
