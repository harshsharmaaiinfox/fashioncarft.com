<?php
$background = dunker_core_get_post_value_through_levels( 'qodef_content_bottom_background' );

if( ! empty($background)) {
    $background =  'background: ' . $background;
}

$side_padding = dunker_core_get_post_value_through_levels('qodef_content_bottom_side_padding');
$styles = array();

if( ! empty($side_padding) ) {

    if ( qode_framework_string_ends_with_space_units( $side_padding, true ) ) {
        $styles[] = 'padding-left: ' . $side_padding;
        $styles[] = 'padding-right: ' . $side_padding;
    } else {
        $styles[] = 'padding-left: ' . intval( $side_padding ) . 'px';
        $styles[] = 'padding-right: ' . intval( $side_padding ) . 'px';
    }
}

?>


<div id="qodef-page-content-bottom"  <?php qode_framework_inline_style( $background ); ?> <?php qode_framework_inline_style( $styles ); ?> >
	<?php
	// hook to include additional content before page content bottom content
	do_action( 'dunker_core_action_before_page_content_bottom_content' );

	// include module content template
	echo apply_filters( 'dunker_core_filter_content_bottom_content_template', dunker_core_get_template_part( 'content-bottom', 'templates/content-bottom-content' ) );

	// hook to include additional content after page content bottom  content
	do_action( 'dunker_core_action_after_page_content_bottom_content' );
	?>
</div>