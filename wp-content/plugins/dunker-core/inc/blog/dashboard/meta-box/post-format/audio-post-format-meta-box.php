<?php

if ( ! function_exists( 'dunker_core_add_audio_post_format_meta_box' ) ) {
	/**
	 * Function that add options for post format
	 *
	 * @param mixed $page - general post format meta box section
	 */
	function dunker_core_add_audio_post_format_meta_box( $page ) {

		if ( $page ) {
			$post_format_section = $page->add_section_element(
				array(
					'name'  => 'qodef_post_format_audio_section',
					'title' => esc_html__( 'Post Format Audio', 'dunker-core' ),
				)
			);

			$post_format_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_post_format_audio_url',
					'title'       => esc_html__( 'Audio URL', 'dunker-core' ),
					'description' => esc_html__( 'Input your audio link here. Here are all the supported audio formats https://wordpress.org/support/article/audio-shortcode/#options  https://wordpress.org/support/article/embeds/#okay-so-what-sites-can-i-embed-from', 'dunker-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'dunker_core_action_after_audio_post_format_meta_box', $page );
		}
	}

	add_action( 'dunker_core_action_after_blog_single_meta_box_map', 'dunker_core_add_audio_post_format_meta_box', 3 );
}
