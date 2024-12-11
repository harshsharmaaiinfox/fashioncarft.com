<?php
$image_ids = dunker_woo_get_gallery_ids( false );

if ( isset( $hover_type ) && 'slider' === $hover_type && ! empty( $image_ids ) ) {
	$data                 = array();
	$data['autoplay']     = false;
	$data['spaceBetween'] = 30;
	?>
	<div class="qodef-e-media-inner qodef-swiper-container" <?php echo qode_framework_get_inline_attr( json_encode( $data ), 'data-options' ); ?>>
		<div class="swiper-wrapper">
		<?php
		foreach ( $image_ids as $image_id ) {
			$params['product_list_image'] = $image_id;
			?>
			<div class="swiper-slide">
				<?php dunker_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
			</div>
			<?php
		}
		?>
		</div>
		<div class="swiper-button-prev"><?php dunker_core_render_svg_icon( 'slider-arrow-left-alt' ); ?></div>
		<div class="swiper-button-next"><?php dunker_core_render_svg_icon( 'slider-arrow-right-alt' ); ?></div>
	</div>
	<?php
}
