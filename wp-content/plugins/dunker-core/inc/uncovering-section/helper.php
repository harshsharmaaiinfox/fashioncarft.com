<?php

if ( ! function_exists( 'dunker_core_uncovering_section_add_body_classes' ) ) {
	function dunker_core_uncovering_section_add_body_classes( $classes ) {
		$uncovering_section = dunker_core_get_post_value_through_levels( 'qodef_uncovering_section' );

		if ( 'yes' === $uncovering_section ) {
			$classes[] = 'qodef-uncovering-section';
		}

		return $classes;
	}

	add_filter( 'body_class', 'dunker_core_uncovering_section_add_body_classes' );
}
