<?php

if ( ! function_exists( 'dunker_core_add_product_list_variation_info_on_image' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_product_list_variation_info_on_image( $variations ) {
		$variations['info-on-image'] = esc_html__( 'Info On Image', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_product_list_layouts', 'dunker_core_add_product_list_variation_info_on_image' );
}

if ( ! function_exists( 'dunker_core_register_shop_list_info_on_image_actions' ) ) {
	/**
	 * Function that override product item layout for current variation type
	 */
	function dunker_core_register_shop_list_info_on_image_actions() {

		// Add additional tags around product list item
		add_action( 'woocommerce_before_shop_loop_item', 'dunker_add_product_list_item_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_holder', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_holder_end', 20 );

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_image_holder', 6 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_image_holder_end', 14 );

		// Add button at the end of content
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_open', 17 );
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_button_label', 18 );
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 19 );

		// Add additional tags around product list item content
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_inner_content_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_core_add_product_list_item_qode_woo_plugins', 5 ); // permission 5 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_inner_content_holder_end', 20 );

		// Add additional tags around brands
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_top_and_info_holder', 7 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_brands', 8 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_top_and_info_holder_end', 9 );

		// Remove add to cart button
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // permission 10 is default

		//Remove rating
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

		// Additional tags around content
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_content_holder', 6 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_content_holder_end', 14 );

		// Add additional tags around categories
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_bottom_and_info_holder', 11 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_categories', 12 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_bottom_and_info_holder_end', 13 );

		// Remove
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );

		// Remove 2nd wishlist button
		remove_action( 'qodef_woo_product_list_additional_before_media_content', 'dunker_core_get_yith_wishlist_shortcode' );

		// Remove sale flash mark
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	}

	add_action( 'dunker_core_action_shop_list_item_layout_info-on-image', 'dunker_core_register_shop_list_info_on_image_actions' );
}
