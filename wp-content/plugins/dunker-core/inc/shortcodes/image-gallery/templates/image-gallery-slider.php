<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
	<div class="swiper-wrapper">
		<?php
		// Include items
        $counter = 0;
        if($advanced_layout === 'yes' && !empty($image_names)) {
            $image_names = array();
        }

		if ( ! empty( $images ) ) {
			foreach ( $images as $image ) {

                if(count($image_names) > 0 && isset($image_names)) {
                    $params['image_names'][$counter] = $image_names[$counter];
                }

                $params['counter'] = $counter;

				dunker_core_template_part( 'shortcodes/image-gallery', 'templates/parts/image', '', array_merge( $params, $image ) );
                $counter++;
			}
		}
		?>
	</div>
	<?php dunker_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
	<?php dunker_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
</div>
