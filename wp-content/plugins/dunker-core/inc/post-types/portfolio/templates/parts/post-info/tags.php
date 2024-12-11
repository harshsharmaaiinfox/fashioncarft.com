<?php
$tags = wp_get_post_terms( get_the_ID(), 'portfolio-tag' );

if ( ! empty( $tags ) ) { ?>
    <div class="qodef-e qodef-info--tag">
        <h6 class="qodef-e-label"><?php esc_html_e( 'Tags: ', 'dunker-core' ); ?></h6>
        <div class="qodef-e-category">
            <?php echo get_the_term_list( get_the_ID(), 'portfolio-tag', '', '<span class="qodef-info-separator-single"></span>' ); ?>
        </div>
    </div>
<?php } ?>
