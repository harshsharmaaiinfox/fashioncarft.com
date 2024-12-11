<div <?php qode_framework_class_attribute( $holder_classes ); ?> >

	<div class="scrolling-text">
		<?php echo wp_kses_post( $title ); ?>
	</div>

	<div class="scrolling-images-container">
		<?php
		foreach ( $items as $item ) { ?>
			<article <?php qode_framework_inline_style( $this_shortcode->get_list_item_style( $item ) ); ?>>
				<div class="qodef-e-inner">
					<div class="qodef-e-image">
						<div class="qodef-e-media-image">
							<?php echo wp_get_attachment_image( $item['image'], 'full' ); ?>
						</div>
					</div>
				</div>
			</article>
		<?php } ?>
	</div>

	<div class="qodef-scrolling-images-panel"></div>
</div>