<?php if ( $show_header_area ) {

	$top_area_skin = 'qodef-skin--' . dunker_core_get_post_value_through_levels( 'qodef_top_area_skin' );

	?>
	<div id="qodef-top-area" <?php qode_framework_class_attribute( $top_area_skin ); ?>>
		<div id="qodef-top-area-inner" <?php qode_framework_class_attribute( apply_filters( 'dunker_core_filter_top_area_inner_class', array() ) ); ?>>
			<?php
			// Include widget area top left
			dunker_core_get_header_widget_area( 'left', 'top-area', 'top_area', true );

			// Include widget area top center
			dunker_core_get_header_widget_area( 'center', 'top-area', 'top_area', true );

			// Include widget area top right
			dunker_core_get_header_widget_area( 'right', 'top-area', 'top_area', true );

			do_action( 'dunker_core_action_after_top_area' );
			?>
		</div>
	</div>
<?php } ?>
