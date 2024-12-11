<div class="qodef-header-wrapper">

	<div class="qodef-header-area-left">
		<?php
		// Include widget area two
		dunker_core_get_header_widget_area( 'two' );
		?>
		<div class="qodef-header-logo">
			<?php
			// Include logo
			dunker_core_get_header_logo_image();
			?>
		</div>
	</div>

	<?php
	// Include main navigation
	dunker_core_template_part( 'header', 'templates/parts/navigation' );

	// Include widget area one
	dunker_core_get_header_widget_area();
	?>
</div>
