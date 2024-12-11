<?php
if ( ! empty( $taxonomy_items && 'standard' === $layout ) ) {
	$params['item_classes'] = $this_shortcode->get_item_classes( $params );

	$alph = range( 'A', 'Z' );

	foreach ( $taxonomy_items as $taxonomy_item ) {
		$title   = $taxonomy_item->name;
		$slug    = $taxonomy_item->slug;
		$initial = strtoupper( substr( $title, 0, 1 ) );

		$letters = array();
	}

	foreach ( $alph as $key ) {
		$params['key'] = $key;
		dunker_core_list_sc_template_part( 'plugins/woocommerce/shortcodes/product-brand-list', 'layouts/' . $layout, '', $params );
	}
} elseif ( 'simple' === $layout || 'image' === $layout ) {
	dunker_core_list_sc_template_part( 'plugins/woocommerce/shortcodes/product-brand-list', 'layouts/' . $layout, '', $params );
} else {
	// Include global posts not found
	dunker_core_theme_template_part( 'content', 'templates/parts/posts-not-found' );
}
