<?php

if ( ! function_exists( 'dunker_core_add_team_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function dunker_core_add_team_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		$has_single     = dunker_core_team_has_single();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'team' ),
				'type'  => 'meta',
				'slug'  => 'team',
				'title' => esc_html__( 'Team Single', 'dunker-core' ),
			)
		);

		if ( $page ) {
			$section = $page->add_section_element(
				array(
					'name'        => 'qodef_team_general_section',
					'title'       => esc_html__( 'General Settings', 'dunker-core' ),
					'description' => esc_html__( 'General information about team member.', 'dunker-core' ),
				)
			);

			if ( $has_single ) {
				$section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_team_single_layout',
						'title'       => esc_html__( 'Single Layout', 'dunker-core' ),
						'description' => esc_html__( 'Choose default layout for team single', 'dunker-core' ),
						'options'     => array(
							'' => esc_html__( 'Default', 'dunker-core' ),
						),
					)
				);
			}

			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_role',
					'title'       => esc_html__( 'Role', 'dunker-core' ),
					'description' => esc_html__( 'Enter team member role', 'dunker-core' ),
				)
			);

			$social_icons_repeater = $section->add_repeater_element(
				array(
					'name'        => 'qodef_team_member_social_icons',
					'title'       => esc_html__( 'Social Networks', 'dunker-core' ),
					'description' => esc_html__( 'Populate team member social networks info', 'dunker-core' ),
					'button_text' => esc_html__( 'Add New Network', 'dunker-core' ),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'iconpack',
					'name'       => 'qodef_team_member_icon',
					'title'      => esc_html__( 'Icon', 'dunker-core' ),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_team_member_icon_link',
					'title'      => esc_html__( 'Icon Link', 'dunker-core' ),
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_team_member_icon_target',
					'title'      => esc_html__( 'Icon Target', 'dunker-core' ),
					'options'    => dunker_core_get_select_type_options_pool( 'link_target' ),
				)
			);

			if ( $has_single ) {
				$section->add_field_element(
					array(
						'field_type'  => 'date',
						'name'        => 'qodef_team_member_birth_date',
						'title'       => esc_html__( 'Birth Date', 'dunker-core' ),
						'description' => esc_html__( 'Enter team member birth date', 'dunker-core' ),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_member_email',
						'title'       => esc_html__( 'E-mail', 'dunker-core' ),
						'description' => esc_html__( 'Enter team member e-mail address', 'dunker-core' ),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_member_address',
						'title'       => esc_html__( 'Address', 'dunker-core' ),
						'description' => esc_html__( 'Enter team member address', 'dunker-core' ),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'text',
						'name'        => 'qodef_team_member_education',
						'title'       => esc_html__( 'Education', 'dunker-core' ),
						'description' => esc_html__( 'Enter team member education', 'dunker-core' ),
					)
				);

				$section->add_field_element(
					array(
						'field_type'  => 'file',
						'name'        => 'qodef_team_member_resume',
						'title'       => esc_html__( 'Resume', 'dunker-core' ),
						'description' => esc_html__( 'Upload team member resume', 'dunker-core' ),
						'args'        => array(
							'allowed_type' => '[application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]',
						),
					)
				);
			}

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_team_meta_box_map', $page, $has_single );
		}
	}

	add_action( 'dunker_core_action_default_meta_boxes_init', 'dunker_core_add_team_single_meta_box' );
}
