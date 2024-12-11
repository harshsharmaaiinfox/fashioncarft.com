<?php
$label = get_post_meta( get_the_ID(), 'qodef_product_label', true );
if ( ! empty( $label ) ) { ?>
	<span class="qodef-e-product-label"><?php echo esc_html( $label ); ?></span>
	<?php
}
