<?php

if ( ! function_exists( 'dunker_core_add_portfolio_info_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function dunker_core_add_portfolio_info_typography_options( $page ) {

		if ( $page ) {
			$portfolio_info_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-portfolio-info',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Portfolio Info', 'dunker-core' ),
					'description' => esc_html__( 'Set typography values for portfolio info elements', 'dunker-core' ),
				)
			);

			$portfolio_info_typography_section = $portfolio_info_tab->add_section_element(
				array(
					'name'  => 'qodef_general_typography_portfolio_info',
					'title' => esc_html__( 'General Typography', 'dunker-core' ),
				)
			);

			$portfolio_label_typography_row = $portfolio_info_typography_section->add_row_element(
				array(
					'name'  => 'qodef_portfolio_label_typography_row',
					'title' => esc_html__( 'Label Styles', 'dunker-core' ),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_portfolio_label_color',
					'title'      => esc_html__( 'Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_portfolio_label_font_family',
					'title'      => esc_html__( 'Font Family', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_portfolio_label_font_size',
					'title'      => esc_html__( 'Font Size', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_portfolio_label_line_height',
					'title'      => esc_html__( 'Line Height', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_portfolio_label_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_label_font_weight',
					'title'      => esc_html__( 'Font Weight', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_label_text_transform',
					'title'      => esc_html__( 'Text Transform', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_label_font_style',
					'title'      => esc_html__( 'Font Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_label_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_label_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_portfolio_label_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row = $portfolio_info_typography_section->add_row_element(
				array(
					'name'  => 'qodef_portfolio_info_typography_row',
					'title' => esc_html__( 'Info Styles', 'dunker-core' ),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_portfolio_info_big_variations_top_margin',
					'title'       => esc_html__( 'Top Margin - Big Layouts', 'dunker-core' ),
					'description' => esc_html__( 'Set top margin size for portfolio item big layouts on portfolio single page', 'dunker-core' ),
					'args'        => array(
						'col_width' => 6,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_portfolio_info_small_variations_top_margin',
					'title'       => esc_html__( 'Top Margin - Small Layouts', 'dunker-core' ),
					'description' => esc_html__( 'Set top margin size for portfolio item small layouts on portfolio single page', 'dunker-core' ),
					'args'        => array(
						'col_width' => 6,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_portfolio_info_color',
					'title'      => esc_html__( 'Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_portfolio_info_font_family',
					'title'      => esc_html__( 'Font Family', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_portfolio_info_font_size',
					'title'      => esc_html__( 'Font Size', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_portfolio_info_line_height',
					'title'      => esc_html__( 'Line Height', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_portfolio_info_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_info_font_weight',
					'title'      => esc_html__( 'Font Weight', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_info_text_transform',
					'title'      => esc_html__( 'Text Transform', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_info_font_style',
					'title'      => esc_html__( 'Font Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_info_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_link_typography_row = $portfolio_info_typography_section->add_row_element(
				array(
					'name'  => 'qodef_portfolio_info_link_typography_row',
					'title' => esc_html__( 'Info Link Styles', 'dunker-core' ),
				)
			);

			$portfolio_info_link_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_portfolio_info_hover_color',
					'title'      => esc_html__( 'Link Hover Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$portfolio_info_link_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_info_hover_text_decoration',
					'title'      => esc_html__( 'Link Hover Text Decoration', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
		}
	}

	add_action( 'dunker_core_action_after_portfolio_options_map', 'dunker_core_add_portfolio_info_typography_options' );
}
