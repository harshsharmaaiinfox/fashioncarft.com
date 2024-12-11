<?php
$taxonomy_image_meta = get_term_meta( $category->term_id, 'thumbnail_id', true );
$taxonomy_icon_meta  = get_term_meta( $category->term_id, 'qodef_product_category_filter_icon', true );
if ( ! empty( $taxonomy_icon_meta ) ) {
	$taxonomy_image = $taxonomy_icon_meta;
} elseif ( ! empty( $taxonomy_image_meta ) ) {
	$taxonomy_image = $taxonomy_image_meta;
} else {
	$taxonomy_image = get_option( 'woocommerce_placeholder_image', 0 );
}

if ( ! empty( $taxonomy_image ) ) {
	echo dunker_core_get_list_shortcode_item_image( 'custom', $taxonomy_image, 300, 390 );
}
