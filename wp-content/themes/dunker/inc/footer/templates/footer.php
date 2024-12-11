<footer id="qodef-page-footer" <?php dunker_class_attribute( implode( ' ', apply_filters( 'dunker_filter_footer_holder_classes', array() ) ) ); ?> role="contentinfo">
	<div class="qodef-page-footer-outer">
		<?php
	// Hook to include additional content before page footer content
	do_action( 'dunker_action_before_page_footer_content' );

	// Include module content template
	echo apply_filters( 'dunker_filter_footer_content_template', dunker_get_template_part( 'footer', 'templates/footer-content' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	// Hook to include additional content after page footer content
	do_action( 'dunker_action_after_page_footer_content' );
	?>
	</div>
</footer>
