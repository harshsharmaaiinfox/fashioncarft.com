<?php

if ( ! function_exists( 'dunker_core_add_elements_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_elements_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => DUNKER_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'elements',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Elements', 'dunker-core' ),
				'description' => esc_html__( 'Global Elements Options', 'dunker-core' ),
			)
		);

		if ( $page ) {

			$label_section = $page->add_section_element(
				array(
					'name'  => 'qodef_elements_label_section',
					'title' => esc_html__( 'Label Styles', 'dunker-core' ),
				)
			);

			$label_row = $label_section->add_row_element(
				array(
					'name' => 'qodef_elements_label_row',
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_label_color',
					'title'      => esc_html__( 'Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_elements_label_font_family',
					'title'      => esc_html__( 'Font Family', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_label_font_size',
					'title'      => esc_html__( 'Font Size', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_label_line_height',
					'title'      => esc_html__( 'Line Height', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_label_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_label_font_weight',
					'title'      => esc_html__( 'Font Weight', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_label_text_transform',
					'title'      => esc_html__( 'Text Transform', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_label_font_style',
					'title'      => esc_html__( 'Font Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_label_margin_top',
					'title'      => esc_html__( 'Margin Top', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => 'px',
					),
				)
			);

			$label_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_label_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => 'px',
					),
				)
			);

			$input_fields_section = $page->add_section_element(
				array(
					'name'  => 'qodef_elements_input_fields_section',
					'title' => esc_html__( 'Input Fields Styles', 'dunker-core' ),
				)
			);

			$input_fields_row = $input_fields_section->add_row_element(
				array(
					'name' => 'qodef_elements_input_fields_row',
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_input_fields_color',
					'title'      => esc_html__( 'Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_input_fields_focus_color',
					'title'      => esc_html__( 'Focus Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_input_fields_background_color',
					'title'      => esc_html__( 'Background Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_input_fields_background_focus_color',
					'title'      => esc_html__( 'Background Focus Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_input_fields_border_color',
					'title'      => esc_html__( 'Border Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_input_fields_border_focus_color',
					'title'      => esc_html__( 'Border Focus Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_input_fields_border_width',
					'title'      => esc_html__( 'Border Width', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_input_fields_border_radius',
					'title'      => esc_html__( 'Border Radius', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_input_fields_border_style',
					'title'      => esc_html__( 'Border Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'border_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_elements_input_fields_font_family',
					'title'      => esc_html__( 'Font Family', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_input_fields_font_size',
					'title'      => esc_html__( 'Font Size', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_input_fields_line_height',
					'title'      => esc_html__( 'Line Height', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_input_fields_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_input_fields_font_weight',
					'title'      => esc_html__( 'Font Weight', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_input_fields_text_transform',
					'title'      => esc_html__( 'Text Transform', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_input_fields_font_style',
					'title'      => esc_html__( 'Font Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_input_fields_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => 'px',
					),
				)
			);

			$input_fields_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_input_fields_padding',
					'title'      => esc_html__( 'Padding', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_section = $page->add_section_element(
				array(
					'name'  => 'qodef_elements_button_section',
					'title' => esc_html__( 'Button Styles', 'dunker-core' ),
				)
			);

			$button_row = $button_section->add_row_element(
				array(
					'name' => 'qodef_elements_button_row',
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_buttons_color',
					'title'      => esc_html__( 'Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_buttons_hover_color',
					'title'      => esc_html__( 'Hover Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_buttons_background_color',
					'title'      => esc_html__( 'Background Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_buttons_background_hover_color',
					'title'      => esc_html__( 'Background Hover Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_buttons_border_color',
					'title'      => esc_html__( 'Border Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_buttons_border_hover_color',
					'title'      => esc_html__( 'Border Hover Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_border_width',
					'title'      => esc_html__( 'Border Width', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_border_radius',
					'title'      => esc_html__( 'Border Radius', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_border_style',
					'title'      => esc_html__( 'Border Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'border_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_box_shadow',
					'title'      => esc_html__( 'Box Shadow', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_elements_buttons_font_family',
					'title'      => esc_html__( 'Font Family', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_font_size',
					'title'      => esc_html__( 'Font Size', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_line_height',
					'title'      => esc_html__( 'Line Height', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_font_weight',
					'title'      => esc_html__( 'Font Weight', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_text_transform',
					'title'      => esc_html__( 'Text Transform', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_font_style',
					'title'      => esc_html__( 'Font Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_margin_top',
					'title'      => esc_html__( 'Margin Top', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => 'px',
					),
				)
			);

			$button_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_padding',
					'title'      => esc_html__( 'Padding', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_section = $page->add_section_element(
				array(
					'name'  => 'qodef_elements_button_simple_section',
					'title' => esc_html__( 'Button Textual Styles', 'dunker-core' ),
				)
			);

			$button_simple_row = $button_simple_section->add_row_element(
				array(
					'name' => 'qodef_elements_button_simple_row',
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_buttons_simple_color',
					'title'      => esc_html__( 'Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_buttons_simple_hover_color',
					'title'      => esc_html__( 'Hover Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_elements_buttons_simple_font_family',
					'title'      => esc_html__( 'Font Family', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_simple_font_size',
					'title'      => esc_html__( 'Font Size', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_simple_line_height',
					'title'      => esc_html__( 'Line Height', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_simple_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_simple_font_weight',
					'title'      => esc_html__( 'Font Weight', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_simple_text_transform',
					'title'      => esc_html__( 'Text Transform', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_simple_font_style',
					'title'      => esc_html__( 'Font Style', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_simple_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_elements_buttons_simple_hover_text_decoration',
					'title'      => esc_html__( 'Hover Text Decoration', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$button_simple_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_buttons_simple_margin_top',
					'title'      => esc_html__( 'Margin Top', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => 'px',
					),
				)
			);

			$slider_arrow_section = $page->add_section_element(
				array(
					'name'  => 'qodef_elements_slider_arrow_section',
					'title' => esc_html__( 'Slider Arrow Styles', 'dunker-core' ),
				)
			);

			$slider_arrow_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_elements_slider_arrow_left_icon_svg_path',
					'title'       => esc_html__( 'Sliders Arrow Left Icon SVG Path', 'dunker-core' ),
					'description' => esc_html__( 'Enter your sliders arrow left icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'dunker-core' ),
				)
			);

			$slider_arrow_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_elements_slider_arrow_right_icon_svg_path',
					'title'       => esc_html__( 'Sliders Arrow Right Icon SVG Path', 'dunker-core' ),
					'description' => esc_html__( 'Enter your sliders arrow right icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'dunker-core' ),
				)
			);

			$slider_arrow_row = $slider_arrow_section->add_row_element(
				array(
					'name'  => 'qodef_elements_slider_arrow_row',
					'title' => esc_html__( 'Icon Styles', 'dunker-core' ),
				)
			);

			$slider_arrow_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_slider_arrow_color',
					'title'      => esc_html__( 'Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$slider_arrow_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_slider_arrow_hover_color',
					'title'      => esc_html__( 'Hover Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$slider_arrow_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_slider_arrow_background_color',
					'title'      => esc_html__( 'Background Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$slider_arrow_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_elements_slider_arrow_background_hover_color',
					'title'      => esc_html__( 'Background Hover Color', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$slider_arrow_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_elements_slider_arrow_size',
					'title'      => esc_html__( 'Icon Size', 'dunker-core' ),
					'args'       => array(
						'col_width' => 3,
						'suffix'    => 'px',
					),
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_elements_options_map', $page );
		}
	}

	add_action( 'dunker_core_action_default_options_init', 'dunker_core_add_elements_options' );
}
