<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		dunker_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', '', $params );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<div class="qodef-e-info">
					<?php
					// Include post category info
					dunker_core_theme_template_part( 'blog', 'templates/parts/post-info/categories' );

					// Include post date info
					dunker_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
					?>
				</div>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				dunker_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params );
				?>
			</div>
			<div class="qodef-e-bottom-holder">
				<?php
				// Include post read more
				dunker_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/read-more', 'simple', $params );
				?>
			</div>
		</div>
	</div>
</article>
