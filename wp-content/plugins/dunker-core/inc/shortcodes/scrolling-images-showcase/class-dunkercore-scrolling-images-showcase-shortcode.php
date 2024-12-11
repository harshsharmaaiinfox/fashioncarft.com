<?php

if ( ! function_exists( 'dunker_core_add_scrolling_images_showcase_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_scrolling_images_showcase_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Scrolling_Images_Showcase_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_scrolling_images_showcase_shortcode' );
}

if ( class_exists( 'DunkerCore_Shortcode' ) ) {
	class DunkerCore_Scrolling_Images_Showcase_Shortcode extends DunkerCore_Shortcode {

		public function __construct() {

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_SHORTCODES_PATH . '/scrolling-images-showcase' );
			$this->set_base( 'dunker_core_scrolling_images_showcase' );
			$this->set_name( esc_html__( 'Scrolling Images Showcase', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays scattered list of images', 'dunker-core' ) );
			$this->set_category( esc_html__( 'Dunker Core', 'dunker-core' ) );
			$this->set_scripts(
				array(
					'jquery-easing' => array(
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
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title',
					'title'      => esc_html__( 'Title Text', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Child elements', 'dunker-core' ),
					'items'      => array(
						array(
							'field_type' => 'text',
							'name'       => 'offset_top',
							'title'      => esc_html__( 'Item Top Offset', 'dunker-core' )
						),
						array(
							'field_type' => 'text',
							'name'       => 'offset_left',
							'title'      => esc_html__( 'Item Left Offset', 'dunker-core' )
						),
						array(
							'field_type' => 'image',
							'name'       => 'image',
							'title'      => esc_html__( 'Image', 'dunker-core' ),
							'multiple'   => 'no'
						),
					)
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'dunker_core_scrolling_images_showcase', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function load_assets() {
			parent::load_assets();
			do_action( 'dunker_core_action_scrolling_images_showcase_load_assets', $this->get_atts() );
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			// force atts
			$atts['behavior'] = 'columns';
			$atts['space']    = 'no'; // spacing inherited from widgets map

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );

			$atts['this_shortcode'] = $this;

			return dunker_core_get_template_part( 'shortcodes/scrolling-images-showcase', 'templates/content', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-scrolling-images-showcase';

			return implode( ' ', $holder_classes );
		}

		public function get_list_item_style( $atts ) {
			$styles = array();

			$top_offset  = $atts['offset_top'];
			$left_offset = $atts['offset_left'];

			if ( ! empty( $top_offset ) ) {
				$styles[] = 'top: ' . $top_offset;
			}
			if ( ! empty( $left_offset ) ) {
				$styles[] = 'left: ' . $left_offset;
			}

			return $styles;
		}
	}
}