<?php

if ( ! function_exists( 'dunker_core_add_product_list_variation_info_on_hover' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_product_list_variation_info_on_hover( $variations ) {
		$variations['info-on-hover'] = esc_html__( 'Info On Hover', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_product_list_layouts', 'dunker_core_add_product_list_variation_info_on_hover' );
}

if ( ! function_exists( 'dunker_core_register_shop_list_info_on_hover_actions' ) ) {
	/**
	 * Function that override product item layout for current variation type
	 */
	function dunker_core_register_shop_list_info_on_hover_actions() {

		// Add additional tags around product list item
		add_action( 'woocommerce_before_shop_loop_item', 'dunker_add_product_list_item_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_holder', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_holder_end', 20 );

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_image_holder', 6 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_image_holder_end', 14 );

		// Add link at the end of woocommerce_before_shop_loop_item_title
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_open', 24 );
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 25 );

		// Add additional tags around product list item content
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_inner_content_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_inner_content_holder_end', 20 );

		// Add additional tags around brands
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_top_and_info_holder', 7 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_brands', 8 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_top_and_info_holder_end', 9 );

		// Change add to cart position on product list
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // permission 10 is default
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 22 );

		//Remove rating
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

		// Add additional tags around add to cart button
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_button_wrapper', 21 );
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_button_wrapper_end', 23 );

		// Additional tags around content
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_core_add_product_list_item_qode_woo_plugins', 6 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_inner_content_top_holder', 6 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_inner_content_top_holder_end', 14 );

		// Add additional tags around categories
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_bottom_and_info_holder', 11 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_categories', 12 );
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_bottom_and_info_holder_end', 13 );

		// Additional tags around price
		add_action( 'woocommerce_after_shop_loop_item_title', 'dunker_add_product_list_item_inner_content_bottom_holder', 9 );
		add_action( 'woocommerce_after_shop_loop_item_title', 'dunker_add_product_list_item_inner_content_bottom_holder_end', 11 );

		// Remove 2nd wishlist button
		remove_action( 'qodef_woo_product_list_additional_before_media_content', 'dunker_core_get_yith_wishlist_shortcode' );

		// Added product label
		add_action( 'woocommerce_before_shop_loop_item', 'dunker_add_product_list_item_label', 6 );

		// Remove sale flash mark
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	}

	add_action( 'dunker_core_action_shop_list_item_layout_info-on-hover', 'dunker_core_register_shop_list_info_on_hover_actions' );
}
