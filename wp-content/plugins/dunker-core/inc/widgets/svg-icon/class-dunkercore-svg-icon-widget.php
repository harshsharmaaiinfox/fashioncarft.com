<?php

if ( ! function_exists( 'dunker_core_add_svg_icon_widget' ) ) {
	/**
	 * function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function dunker_core_add_svg_icon_widget( $widgets ) {
		$widgets[] = 'DunkerCore_Svg_Icon_Widget';

		return $widgets;
	}

	add_filter( 'dunker_core_filter_register_widgets', 'dunker_core_add_svg_icon_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class DunkerCore_Svg_Icon_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'dunker_core_svg_icon' );
			$this->set_name( esc_html__( 'Dunker Icon Svg', 'dunker-core' ) );
			$this->set_description( esc_html__( 'Add a icon svg element into widget areas', 'dunker-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'textarea',
					'name'       => 'icon',
					'title'      => esc_html__( 'Icon Svg Code', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'text',
					'title'      => esc_html__( 'Text', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'icon_link',
					'title'      => esc_html__( 'Link', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type'    => 'select',
					'name'          => 'icon_link_target',
					'title'         => esc_html__( 'Link Target', 'dunker-core' ),
					'options'       => dunker_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'icon_margin',
					'title'       => esc_html__( 'Icon Margin', 'dunker-core' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'icon_holder_width',
					'title'      => esc_html__( 'Icon Holder Width (px)', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'icon_holder_height',
					'title'      => esc_html__( 'Icon Holder Height (px)', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'icon_stroke_color',
					'title'      => esc_html__( 'Icon Stroke Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'icon_stroke_hover_color',
					'title'      => esc_html__( 'Icon Stroke Hover Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'icon_fill_color',
					'title'      => esc_html__( 'Icon Fill Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'icon_fill_hover_color',
					'title'      => esc_html__( 'Icon Fill Hover Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'icon_background_color',
					'title'      => esc_html__( 'Icon Background Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'icon_background_hover_color',
					'title'      => esc_html__( 'Icon Background Hover Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'icon_border_radius',
					'title'       => esc_html__( 'Icon Border Radius', 'dunker-core' ),
					'description' => esc_html__( 'Insert border radius in format: top right bottom left', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'text_hover_color',
					'title'      => esc_html__( 'Text Hover Color', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'space_between_icon_text',
					'title'      => esc_html__( 'Space Between Icon and Text (px)', 'dunker-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'icon_vertical_alignment',
					'title'      => esc_html__( 'Icon Vertical Alignment', 'dunker-core' ),
					'options'    => array(
						'center'     => esc_html__( 'Center', 'dunker-core' ),
						'flex-start' => esc_html__( 'Top', 'dunker-core' ),
						'flex-end'   => esc_html__( 'Bottom', 'dunker-core' ),
						'baseline'   => esc_html__( 'Baseline', 'dunker-core' ),
					),
				)
			);
		}

		public function render( $atts ) {
			$text_styles  = array();
			$icon_styles  = array();
			$holder_style = array();

			if ( '' !== $atts['icon_margin'] ) {
				$icon_styles[] = 'margin: ' . esc_attr( $atts['icon_margin'] );
			}
			if ( '' !== $atts['icon_stroke_color'] ) {
				$icon_styles[] = '--stroke-color: ' . esc_attr( $atts['icon_stroke_color'] );
			}
			if ( '' !== $atts['icon_stroke_hover_color'] ) {
				$icon_styles[] = '--stroke-hover-color: ' . esc_attr( $atts['icon_stroke_hover_color'] );
			}
			if ( '' !== $atts['icon_fill_color'] ) {
				$icon_styles[] = '--fill-color: ' . esc_attr( $atts['icon_fill_color'] );
			}
			if ( '' !== $atts['icon_fill_hover_color'] ) {
				$icon_styles[] = '--fill-hover-color: ' . esc_attr( $atts['icon_fill_hover_color'] );
			}
			if ( '' !== $atts['icon_background_color'] ) {
				$icon_styles[] = '--background-color: ' . esc_attr( $atts['icon_background_color'] );
			}
			if ( '' !== $atts['icon_background_hover_color'] ) {
				$icon_styles[] = '--background-hover-color: ' . esc_attr( $atts['icon_background_hover_color'] );
			}
			if ( '' !== $atts['icon_holder_width'] ) {
				$icon_styles[] = 'width: ' . intval( esc_attr( $atts['icon_holder_width'] ) ) . 'px';
			}
			if ( '' !== $atts['icon_holder_height'] ) {
				$icon_styles[] = 'height: ' . intval( esc_attr( $atts['icon_holder_height'] ) ) . 'px';
			}
			if ( '' !== $atts['icon_border_radius'] ) {
				$icon_styles[] = 'border-radius: ' . esc_attr( $atts['icon_border_radius'] );
			}

			if ( '' !== $atts['text_color'] ) {
				$text_styles[] = '--text-color: ' . esc_attr( $atts['text_color'] );
			}
			if ( '' !== $atts['text_hover_color'] ) {
				$text_styles[] = '--text-hover-color: ' . esc_attr( $atts['text_hover_color'] );
			}
			if ( '' !== $atts['space_between_icon_text'] ) {
				$text_styles[] = 'margin-left: ' . esc_attr( $atts['space_between_icon_text'] ) . 'px';
			}

			if ( '' !== $atts['icon_vertical_alignment'] ) {
				$holder_style[] = 'align-items:' . esc_attr( $atts['icon_vertical_alignment'] );
			}

			if ( ! empty( $atts['icon'] ) ) { ?>
				<div class="qodef-svg-icon-widget">
					<?php if ( ! empty( $atts['icon_link'] ) ) { ?>
						<a href="<?php echo esc_url( $atts['icon_link'] ); ?>" target="<?php echo esc_attr( $atts['icon_link_target'] ); ?>">
					<?php } ?>
					<div class="qodef-m-holder" <?php qode_framework_inline_style( $holder_style ); ?>>
						<div class="qodef-m-icon" <?php qode_framework_inline_style( $icon_styles ); ?>>
							<?php echo qode_framework_wp_kses_html( 'svg', $atts['icon'] ); ?>
						</div>
						<?php if ( isset( $atts['text'] ) && ! empty( $atts['text'] ) ) { ?>
							<span class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>><?php echo esc_html( $atts['text'] ); ?></span>
						<?php } ?>
					</div>
					<?php if ( ! empty( $atts['icon_link'] ) ) { ?>
						</a>
					<?php } ?>
				</div>
				<?php
			}
		}
	}
}
