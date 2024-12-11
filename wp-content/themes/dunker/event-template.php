<?php
/*
Template Name: Timetable Event
*/
get_header();

// Include event content template
if ( dunker_is_installed( 'core' ) ) {
	dunker_core_template_part( 'plugins/timetable', 'templates/content' );
}

get_footer();
