<?php

if ( ! function_exists( 'dunker_core_add_team_list_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function dunker_core_add_team_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'DunkerCore_Team_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'dunker_core_filter_register_shortcodes', 'dunker_core_add_team_list_shortcode' );
}

if ( class_exists( 'DunkerCore_List_Shortcode' ) ) {
	class DunkerCore_Team_List_Shortcode extends DunkerCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'team' );
			$this->set_post_type_taxonomy( 'team-category' );
			$this->set_layouts( apply_filters( 'dunker_core_filter_team_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'dunker_core_filter_team_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( DUNKER_CORE_CPT_URL_PATH . '/team/shortcodes/team-list' );
			$this->set_base( 'dunker_core_team_list' );
			$this->set_name( esc_html__( 'Team List', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of teams', 'dunker-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'dunker-core' ),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior' => array( 'masonry', 'justified-gallery' ),
				)
			);
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
			$this->set_option(
			    array(
                    'field_type'    => 'select',
                    'name'          => 'enable_border',
                    'title'         => esc_html__('Enable Border', 'dunker-core'),
                    'options'       => dunker_core_get_select_type_options_pool('yes_no', false),
                    'dependency'    => array(
                        'show' => array(
                            'layout' => array(
                                'values'        => 'info-below',
                                'default_value' => 'default',
                            ),
                        ),
                    ),
                    'group'         => esc_html__( 'Layout', 'dunker-core' ),
                )
            );
			$this->set_option(
			    array(
                    'field_type'    => 'color',
                    'name'          => 'border_color',
                    'title'         => esc_html__('Border Color', 'dunker-core'),
                    'dependency'    => array(
                        'show' => array(
                            'enable_border' => array(
                                'values'        => 'yes',
                                'default_value' => '',
                            ),
                        ),
                    ),
                    'group'         => esc_html__( 'Layout', 'dunker-core' ),
                )
            );
			$this->map_additional_options();
			$this->map_extra_options();
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'dunker_core_team_list', $params );
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
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['query_result']   = new \WP_Query( dunker_core_get_query_params( $atts ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			$atts['has_single']     = dunker_core_team_has_single();
			$atts['data_attr']      = dunker_core_get_pagination_data( DUNKER_CORE_REL_PATH, 'post-types/team/shortcodes', 'team-list', 'team', $atts );

			$atts['this_shortcode'] = $this;

			return dunker_core_get_template_part( 'post-types/team/shortcodes/team-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-team-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['enable_border'] ? 'qodef-item-border' : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		private function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();

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

		public function get_border_styles( $atts ) {
		    $styles = array();

		    if ( ! empty ( $atts['border_color'] ) ) {
		        $styles[] = 'border-color: ' . $atts['border_color'];
            }

            return $styles;
        }
	}
}
