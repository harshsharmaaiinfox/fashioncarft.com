<?php

if ( ! function_exists( 'dunker_core_add_yith_wishlist_plugin_predefined_style' ) ) {
	/**
	 * Function that add additional class name into global class list for body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function dunker_core_add_yith_wishlist_plugin_predefined_style( $classes ) {

		$option = dunker_core_get_post_value_through_levels( 'qodef_enable_woo_yith_wishlist_predefined_style' );

		if ( 'yes' === $option ) {
			$classes[] = 'qodef-yith-wcwl--predefined';
		}

		return $classes;
	}

	add_filter( 'body_class', 'dunker_core_add_yith_wishlist_plugin_predefined_style' );
}


if ( ! function_exists( 'qodef_woo_yith_wishlist_render_categories' ) ) {
	/**
	 * Function that print categories on wishlist
	 *
	 */
	function qodef_woo_yith_wishlist_render_categories( $item ) {
		/**
		 * Function that render product categories
		 */
		$categories = wp_get_post_terms( $item->get_product_id(), 'product_cat' );

		if ( ! empty( $categories ) ) { ?>
			<div class="qodef-e-categories">
				<?php echo get_the_term_list( $item->get_product_id(), 'product_cat', '', '<span class="qodef-info-separator-single"></span>' ); ?>
				<div class="qodef-info-separator-end"></div>
			</div>
			<?php
		}
	}

	add_action( 'yith_wcwl_table_after_product_name', 'qodef_woo_yith_wishlist_render_categories', 5);
}
//yith_wcwl_table_after_product_name