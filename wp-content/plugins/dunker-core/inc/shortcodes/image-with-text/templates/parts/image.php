<div class="qodef-m-image-inner-holder">
	<div class="qodef-m-image" <?php qode_framework_inline_style( $this_shortcode->get_image_border_styles( $params ) ); ?>>
		<?php if ( 'open-popup' === $image_action ) { ?>
			<a class="qodef-magnific-popup qodef-popup-item" itemprop="image" href="<?php echo esc_url( $image_params['url'] ); ?>" data-type="image" title="<?php echo esc_attr( $image_params['alt'] ); ?>" <?php qode_framework_inline_style( $this_shortcode->get_image_border_styles( $params ) ); ?>>
		<?php } elseif ( in_array( $image_action, array( 'custom-link', 'scrolling-image' ), true ) && ! empty( $link ) ) { ?>
			<a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>" <?php qode_framework_inline_style( $this_shortcode->get_image_border_styles( $params ) ); ?>>
		<?php } ?>
			<?php
			if ( is_array( $image_params['image_size'] ) && count( $image_params['image_size'] ) ) {
				echo qode_framework_generate_thumbnail( $image_params['image_id'], $image_params['image_size'][0], $image_params['image_size'][1] );
			} else {
				echo wp_get_attachment_image( $image_params['image_id'], $image_params['image_size'] );
			}
			?>
		<?php if ( 'open-popup' === $image_action || ( 'custom-link' === $image_action && ! empty( $link ) ) ) { ?>
			</a>
		<?php } ?>
	</div>
	<?php if ( 'scrolling-image' === $image_action ) { ?>
		<svg class='qodef-m-iwt-frame' width="800" height="1000" viewBox="0 0 800 1000">
			<rect width="100%" height="100%"></rect>
		</svg>
	<?php } ?>
</div>
