<?php

if ( ! function_exists( 'dunker_core_register_team_for_meta_options' ) ) {
	/**
	 * Function that add custom post type into global meta box allowed items array for saving meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function dunker_core_register_team_for_meta_options( $post_types ) {
		$post_types[] = 'team';

		return $post_types;
	}

	add_filter( 'qode_framework_filter_meta_box_save', 'dunker_core_register_team_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'dunker_core_register_team_for_meta_options' );
}

if ( ! function_exists( 'dunker_core_add_team_custom_post_type' ) ) {
	/**
	 * Function that adds team custom post type
	 *
	 * @param array $cpts
	 *
	 * @return array
	 */
	function dunker_core_add_team_custom_post_type( $cpts ) {
		$cpts[] = 'DunkerCore_Team_CPT';

		return $cpts;
	}

	add_filter( 'dunker_core_filter_register_custom_post_types', 'dunker_core_add_team_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class DunkerCore_Team_CPT extends QodeFrameworkCustomPostType {

		public function map_post_type() {
			$name = esc_html__( 'Team', 'dunker-core' );
			$this->set_base( 'team' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-businessperson' );
			$this->set_slug( 'team' );
			$this->set_name( $name );
			$this->set_path( DUNKER_CORE_CPT_PATH . '/team' );
			$this->set_labels(
				array(
					'name'          => esc_html__( 'Dunker Team', 'dunker-core' ),
					'singular_name' => esc_html__( 'Team Member', 'dunker-core' ),
					'add_item'      => esc_html__( 'New Team Member', 'dunker-core' ),
					'add_new_item'  => esc_html__( 'Add New Team Member', 'dunker-core' ),
					'edit_item'     => esc_html__( 'Edit Team Member', 'dunker-core' ),
				)
			);
			if ( ! dunker_core_team_has_single() ) {
				$this->set_public( false );
				$this->set_archive( false );
				$this->set_supports(
					array(
						'title',
						'thumbnail',
					)
				);
			}
			$this->add_post_taxonomy(
				array(
					'base'          => 'team-category',
					'slug'          => 'team-category',
					'singular_name' => esc_html__( 'Category', 'dunker-core' ),
					'plural_name'   => esc_html__( 'Categories', 'dunker-core' ),
				)
			);
		}
	}
}
