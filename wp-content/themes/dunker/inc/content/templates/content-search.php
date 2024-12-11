<?php
// Hook to include additional content before page content holder
do_action( 'dunker_action_before_page_content_holder' );
?>
<main id="qodef-page-content" class="qodef-grid qodef-layout--template <?php echo esc_attr( dunker_get_grid_gutter_classes() ); ?>" <?php echo dunker_get_grid_gutter_styles(); ?> role="main">
	<div class="qodef-grid-inner">
		<?php
		// Include search template
		echo apply_filters( 'dunker_filter_search_archive_template', dunker_get_template_part( 'search', 'templates/search' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		// Include page content sidebar
		dunker_template_part( 'sidebar', 'templates/sidebar' );
		?>
	</div>
</main>
<?php
// Hook to include additional content after main page content holder
do_action( 'dunker_action_after_page_content_holder' );
?>
