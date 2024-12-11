<div class="qodef-testimonials-list-slider-wrapper">
    <div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
        <?php dunker_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/static-tagline', '', $params ); ?>
        <?php dunker_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/static-title', '', $params ); ?>
        <div class="swiper-wrapper">
            <?php
            // Include items
            dunker_core_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'templates/loop', '', $params );
            ?>
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
</div>
