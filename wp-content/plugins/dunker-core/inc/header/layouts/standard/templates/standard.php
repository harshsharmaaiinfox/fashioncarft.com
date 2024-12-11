<div class="qodef-header-area-left">
<?php
	// Include widget area two
	dunker_core_get_header_widget_area( 'two' );
	// Include logo
	dunker_core_get_header_logo_image();
?>
</div>
<?php
// Include main navigation
dunker_core_template_part( 'header', 'templates/parts/navigation' );

// Include widget area one
dunker_core_get_header_widget_area();
