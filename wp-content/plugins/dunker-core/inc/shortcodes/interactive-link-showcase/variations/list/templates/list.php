<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<div class="qodef-m-items">
		<?php foreach ( $items as $item ) { ?>
			<?php if ( ! empty( $item['item_link'] ) ) { ?>
				<a itemprop="url" class="qodef-m-item qodef-e" href="<?php echo esc_url( $item['item_link'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
			<?php } else { ?>
				<span class="qodef-m-item qodef-e">
			<?php } ?>
			<span class="qodef-e-title"><?php echo esc_html( $item['item_title'] ); ?></span>
			<?php if ( empty( $item['item_link'] ) ) { ?>
				</span>
			<?php } else { ?>
				</a>
			<?php } ?>
		<?php } ?>
	</div>
	<div class="qodef-m-images">
		<?php foreach ( $items as $item ) { ?>
			<div class="qodef-m-image" <?php qode_framework_inline_style( $this_shortcode->get_image_styles( $item ) ); ?>>
				<?php echo wp_get_attachment_image( $item['item_image'], 'full' ); ?>
			</div>
		<?php } ?>
	</div>
</div>
