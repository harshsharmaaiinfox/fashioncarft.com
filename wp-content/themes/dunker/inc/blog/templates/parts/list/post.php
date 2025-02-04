<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		dunker_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<div class="qodef-e-info">
					<?php
					// Include post category info
					dunker_template_part( 'blog', 'templates/parts/post-info/categories' );

					// Include post date info
					dunker_template_part( 'blog', 'templates/parts/post-info/date' );
					?>
				</div>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				dunker_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h2' ) );

				// Include post excerpt
				dunker_template_part( 'blog', 'templates/parts/post-info/excerpt' );

				// Hook to include additional content after blog single content
				do_action( 'dunker_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-bottom-holder">
				<?php
				// Include post read more
				dunker_template_part( 'blog', 'templates/parts/post-info/read-more' );
				?>
			</div>
		</div>
	</div>
</article>
