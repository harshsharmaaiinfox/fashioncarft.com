<?php

if ( ! function_exists( 'dunker_core_add_vertical_split_slider_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_vertical_split_slider_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Vertical_Split_Slider_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_vertical_split_slider_shortcode' );
}

if ( class_exists( 'DunkerCore_Shortcode' ) ) {
	class DunkerCore_Vertical_Split_Slider_Shortcode extends DunkerCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'dunker_core_filter_vertical_split_slider_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_SHORTCODES_URL_PATH . '/vertical-split-slider' );
			$this->set_base( 'dunker_vertical_split_slider' );
			$this->set_name( esc_html__( 'Vertical Split Slider', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds vertical split slider holder', 'dunker-core' ) );
			$this->set_scripts(
				array(
					'jquery-effects-core' => array(
						'registered' => true,
					),
					'multiscroll'         => array(
						'registered' => false,
						'url'        => DUNKER_CORE_SHORTCODES_URL_PATH . '/vertical-split-slider/assets/js/plugins/jquery.multiscroll.min.js',
						'dependency' => array( 'jquery', 'jquery-effects-core' ),
					),
				)
			);
			$this->set_necessary_styles(
				array(
					'multiscroll' => array(
						'registered' => false,
						'url'        => DUNKER_CORE_SHORTCODES_URL_PATH . '/vertical-split-slider/assets/css/plugins/jquery.multiscroll.css',
					),
				)
			);
			$options_map = dunker_core_get_variations_options_map( $this->get_layouts() );
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
					'name'          => 'disable_breakpoint',
					'title'         => esc_html__( 'Disable on smaller screens', 'dunker-core' ),
					'options'       => array(
						'1024' => esc_html__( 'Below 1024px', 'dunker-core' ),
						'768'  => esc_html__( 'Below 768px', 'dunker-core' ),
					),
					'default_value' => '1024',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Slide Items', 'dunker-core' ),
					'items'      => array_merge(
						array(
							array(
								'field_type' => 'select',
								'name'       => 'slide_header_style',
								'title'      => esc_html__( 'Header And Pagination Style', 'dunker-core' ),
								'options'    => array(
									''      => esc_html__( 'Default', 'dunker-core' ),
									'light' => esc_html__( 'Light', 'dunker-core' ),
									'dark'  => esc_html__( 'Dark', 'dunker-core' ),
								),
							),
							array(
								'field_type'    => 'select',
								'name'          => 'slide_layout',
								'title'         => esc_html__( 'Slide Layout', 'dunker-core' ),
								'options'       => array(
									'image-left'  => esc_html__( 'Image On Left', 'dunker-core' ),
									'image-right' => esc_html__( 'Image On Right', 'dunker-core' ),
								),
								'default_value' => 'image-left',
							),
							array(
								'field_type' => 'image',
								'name'       => 'slide_image_background_image',
								'title'      => esc_html__( 'Large Image', 'dunker-core' ),
							),
							array(
								'field_type' => 'text',
								'name'       => 'slide_content_label',
								'title'      => esc_html__( 'Label', 'dunker-core' ),
							),
							array(
								'field_type' => 'color',
								'name'       => 'slide_content_background_color',
								'title'      => esc_html__( 'Content Background Color', 'dunker-core' ),
							),
							array(
								'field_type' => 'image',
								'name'       => 'slide_content_image',
								'title'      => esc_html__( 'Small Image', 'dunker-core' ),
							),
							array(
								'field_type'    => 'select',
								'name'          => 'slide_content_layout',
								'title'         => esc_html__( 'Content Layout', 'dunker-core' ),
								'options'       => $this->get_layouts(),
								'default_value' => $options_map['default_value'],
								'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] ),
							),
						),
						apply_filters( 'dunker_core_filter_vertical_split_slider_extra_repeater_options', array() )
					),
				)
			);
		}

		public function load_assets() {
			wp_enqueue_script( 'jquery-effects-core' );
			wp_enqueue_script( 'multiscroll' );
			wp_enqueue_style( 'multiscroll' );
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts                   = $this->get_atts();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['this_object']    = $this;
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );

			return dunker_core_get_template_part( 'shortcodes/vertical-split-slider', 'templates/vertical-split-slider', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-vertical-split-slider';
			$holder_classes[] = ! empty( $atts['disable_breakpoint'] ) ? 'qodef-disable-below--' . $atts['disable_breakpoint'] : '';

			return implode( ' ', $holder_classes );
		}

		public function get_slide_classes( $multiscroll, $type, $slide_atts ) {
			$slide_classes = array();

			if ( $multiscroll ) {
				$slide_classes[] = 'ms-section';
				$slide_classes[] = 'ms-table';
			}

			$slide_classes[] = 'qodef-m-slide-' . $type;
			$slide_classes[] = 'content' === $type ? 'qodef-content-layout--' . $slide_atts['slide_content_layout'] : '';
			$slide_classes[] = 'qodef-slide-layout--' . $slide_atts['slide_layout'];

			return implode( ' ', $slide_classes );
		}

		public function get_slide_image_styles( $slide_atts ) {
			$styles = array();

			$styles[] = ! empty( $slide_atts['slide_image_background_image'] ) ? 'background-image: url(' . wp_get_attachment_url( $slide_atts['slide_image_background_image'] ) . ')' : '';

			return $styles;
		}

		public function get_slide_content_styles( $slide_atts ) {
			$styles = array();

			$styles[] = ! empty( $slide_atts['slide_content_background_color'] ) ? 'background-color: ' . $slide_atts['slide_content_background_color'] : '';

			return $styles;
		}

		public function get_slide_data( $slide_atts ) {
			$data = array();

			$data['data-header-skin'] = ! empty( $slide_atts['slide_header_style'] ) ? $slide_atts['slide_header_style'] : '';

			return $data;
		}
	}
}
