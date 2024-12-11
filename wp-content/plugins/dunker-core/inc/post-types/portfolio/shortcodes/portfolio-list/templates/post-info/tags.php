<?php
$tags = wp_get_post_terms( get_the_ID(), 'portfolio-tag' );

if ( ! empty( $tags ) ) { ?>
	<?php echo get_the_term_list( get_the_ID(), 'portfolio-tag', '', '<span class="qodef-info-separator-single"></span>' ); ?>
	<div class="qodef-info-separator-end"></div>
<?php } ?>
