<?php

if ( ! function_exists( 'dunker_core_add_crossfade_images_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_crossfade_images_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Crossfade_Images_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_crossfade_images_shortcode' );
}

if ( class_exists( 'DunkerCore_Shortcode' ) ) {
	class DunkerCore_Crossfade_Images_Shortcode extends DunkerCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'dunker_core_filter_crossfade_images_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_SHORTCODES_URL_PATH . '/crossfade-images' );
			$this->set_base( 'dunker_core_crossfade_images' );
			$this->set_name( esc_html__( 'Crossfade Images', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds crossfade images element', 'dunker-core' ) );
			$this->set_category( esc_html__( 'Dunker Core', 'dunker-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'initial_image',
					'title'      => esc_html__( 'Initial Image', 'dunker-core' )
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'hover_image',
					'title'      => esc_html__( 'Hover Image', 'dunker-core' )
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title',
					'title'      => esc_html__( 'Title', 'dunker-core' )
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h5',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link',
					'title'      => esc_html__( 'Link', 'dunker-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_blank',
				)
			);
            $this->set_option(
                array(
                    'field_type'    => 'select',
                    'name'          => 'enable_image_border',
                    'title'         => esc_html__('Enable border on image', 'dunker-core'),
                    'options'       => dunker_core_get_select_type_options_pool('yes_no', false),
                    'default_value' => 'no'
                )
            );
            $this->set_option(
                array(
                    'field_type' => 'color',
                    'name'       => 'border_color',
                    'title'      => esc_html__( 'Border Color', 'dunker-core' ),
                    'dependency' => array(
                        'show'  => array(
                            'enable_image_border' => array(
                                'values' => 'yes',
                                'default_value' => ''
                            )
                        )
                    )
                )
            );
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']       = $this->get_holder_classes( $atts );
			$atts['initial_image_params'] = $this->generate_initial_image_params( $atts );
			$atts['hover_image_params']   = $this->generate_hover_image_params( $atts );
            $atts['border_styles']        = $this->get_image_border_styles( $atts );
            $atts['this_shortcode']       = $this;

			return dunker_core_get_template_part( 'shortcodes/crossfade-images', 'templates/crossfade-images', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-crossfade-images';
            $holder_classes[] = 'yes' === $atts['enable_image_border'] ? 'qodef-e-image-border' : '';

			return implode( ' ', $holder_classes );
		}

		private function generate_initial_image_params( $atts ) {
			$image = array();

			if ( ! empty( $atts['initial_image'] ) ) {
				$id = $atts['initial_image'];

				$image['image_id']   = intval( $id );
				$image_original      = wp_get_attachment_image_src( $id, 'full' );
				$image['url']        = $image_original[0];
				$image['alt']        = get_post_meta( $id, '_wp_attachment_image_alt', true );
				$image['image_size'] = 'full';
			}

			return $image;
		}

		private function generate_hover_image_params( $atts ) {
			$image = array();

			if ( ! empty( $atts['hover_image'] ) ) {
				$id = $atts['hover_image'];

				$image['image_id']   = intval( $id );
				$image_original      = wp_get_attachment_image_src( $id, 'full' );
				$image['url']        = $image_original[0];
				$image['alt']        = get_post_meta( $id, '_wp_attachment_image_alt', true );
				$image['image_size'] = 'full';
			}

			return $image;
		}

        public function get_image_border_styles( $atts ) {
            $styles = array();

            if ( '' !== $atts['border_color'] ) {
                $styles[] = 'color: ' . $atts['border_color'];
            }

            return $styles;
        }
	}
}