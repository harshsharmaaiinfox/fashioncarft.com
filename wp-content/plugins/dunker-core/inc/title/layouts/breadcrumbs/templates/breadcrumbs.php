<?php
// Load title image template
dunker_core_get_page_title_image();
?>
<div class="qodef-m-content <?php echo esc_attr( dunker_core_get_page_title_content_classes() ); ?>">
	<?php
	// Load breadcrumbs template
	dunker_core_breadcrumbs();
	?>
</div>
