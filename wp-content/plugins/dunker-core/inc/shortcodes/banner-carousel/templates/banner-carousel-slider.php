<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
	<div class="swiper-wrapper">

		<?php foreach ( $items as $item ) { ?>
			<div class="<?php echo esc_attr( $this_shortcode->get_item_classes( $item )  ); ?>">
				<div class="qodef-m-item-inner">
					<span class="qodef-e-tagline"><?php echo esc_html( $item['item_tagline'] ); ?></span>
					<h2 class="qodef-e-title"><?php echo esc_html( $item['item_title'] ); ?></h2>
					<span class="qodef-e-subtitle"><?php echo esc_html( $item['item_subtitle'] ); ?></span>
				</div>
				<a class="qodef-e-link" itemprop="url" href="<?php echo esc_url( $item['item_link'] ); ?>" target="<?php echo esc_attr( $target ); ?>"></a>
				<div class="qodef-m-image" <?php qode_framework_inline_style( $this_shortcode->get_image_styles( $item ) ); ?>>
					<?php echo wp_get_attachment_image( $item['item_image'], 'full' ); ?>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php dunker_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
</div>
<?php if ( 'no' !== $slider_navigation ) {
	$nav_next_classes = '';
	$nav_prev_classes = '';

	if ( isset( $unique ) && ! empty( $unique ) ) {
		$nav_next_classes = 'swiper-button-outside swiper-button-next-' . esc_attr( $unique );
		$nav_prev_classes = 'swiper-button-outside swiper-button-prev-' . esc_attr( $unique );
	}
	?>
	<div class="swiper-button-prev <?php echo esc_attr( $nav_prev_classes ); ?>"><?php dunker_core_render_svg_icon( 'slider-arrow-left' ); ?></div>
	<div class="swiper-button-next <?php echo esc_attr( $nav_next_classes ); ?>"><?php dunker_core_render_svg_icon( 'slider-arrow-right' ); ?></div>
<?php } ?>
