<?php if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) :
		$query_result->the_post();

		dunker_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'layouts/' . $layout, '', $params );
	endwhile; // End of the loop.
} else {
	// Include global posts not found
	dunker_core_theme_template_part( 'content', 'templates/parts/posts-not-found' );
}

wp_reset_postdata();
