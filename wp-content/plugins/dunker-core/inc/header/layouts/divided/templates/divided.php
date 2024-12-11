<div class="qodef-divided-header-left-wrapper">
	<?php
	// Include widget area two
	dunker_core_get_header_widget_area( 'two' );

	// Include divided left navigation
	dunker_core_template_part( 'header/layouts/divided', 'templates/parts/left-navigation' );
	?>
</div>
<?php
// Include logo
dunker_core_get_header_logo_image();
?>
<div class="qodef-divided-header-right-wrapper">
	<?php
	// Include divided right navigation
	dunker_core_template_part( 'header/layouts/divided', 'templates/parts/right-navigation' );

	// Include widget area one
	dunker_core_get_header_widget_area();
	?>
</div>
