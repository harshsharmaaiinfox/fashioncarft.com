<div class="qodef-grid-item <?php echo esc_attr( dunker_core_get_page_content_sidebar_classes() ); ?>">
	<div class="qodef-team qodef-m <?php echo esc_attr( dunker_core_get_team_holder_classes() ); ?>">
		<?php
		// Include team posts loop
		dunker_core_template_part( 'post-types/team', 'templates/parts/loop' );
		?>
	</div>
</div>
