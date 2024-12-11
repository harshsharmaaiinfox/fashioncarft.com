<?php

if ( ! function_exists( 'dunker_core_add_product_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_product_list_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_product_list_layouts', 'dunker_core_add_product_list_variation_info_below' );
}

if ( ! function_exists( 'dunker_core_register_shop_list_info_below_actions' ) ) {
	/**
	 * Function that override product item layout for current variation type
	 */
	function dunker_core_register_shop_list_info_below_actions() {

		// IMPORTANT - THIS CODE NEED TO COPY/PASTE ALSO INTO THEME FOLDER MAIN WOOCOMMERCE FILE - set_default_layout method

		// Add additional tags around product list item
		add_action( 'woocommerce_before_shop_loop_item', 'dunker_add_product_list_item_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_core_add_product_list_item_qode_woo_plugins', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_holder', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_holder_end', 20 ); // permission 20 is set because woocommerce_template_loop_product_thumbnail hook is added on 10

		// Add sale, stock, new mark
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		add_action( 'qodef_woo_product_list_additional_before_media_content', 'woocommerce_show_product_loop_sale_flash', 5 );
		add_action( 'qodef_woo_product_list_additional_before_media_content', 'dunker_add_out_of_stock_mark_on_product', 5 );
		add_action( 'qodef_woo_product_list_additional_before_media_content', 'dunker_add_new_mark_on_product', 5 );

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_image_holder', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_media_image_holder_end', 14 ); // permission 14 is set because woocommerce_template_loop_product_thumbnail hook is added on 10

		// Add additional tags around content inside product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'dunker_add_product_list_item_gallery_slider', 15 ); // permission 15 is set because woocommerce_template_loop_product_thumbnail hook is added on 10

		// Add link at the end of woocommerce_before_shop_loop_item_title
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 18 ); // permission 18 is set because dunker_add_product_list_item_media_holder_end is 20
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 19 ); // permission 19 is set because dunker_add_product_list_item_media_holder_end is 20

		// Add additional tags around product list item content
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_content_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_content_holder_end', 20 ); // permission 20 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		//Remove rating
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

		// Add additional tags around brands
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_top_and_info_holder', 7 ); // permission 7 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_brands', 8 ); // permission 8 is set to be before woocommerce_template_loop_product_title hook it's added on 10
		add_action( 'woocommerce_shop_loop_item_title', 'dunker_add_product_list_item_top_and_info_holder_end', 9 ); // permission 9 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add additional tags around categories
		add_action( 'woocommerce_after_shop_loop_item_title', 'dunker_add_product_list_item_bottom_and_info_holder', 5 );
		add_action( 'woocommerce_after_shop_loop_item_title', 'dunker_add_product_list_item_categories', 6 );
		add_action( 'woocommerce_after_shop_loop_item_title', 'dunker_add_product_list_item_bottom_and_info_holder_end', 7 );

		// Change add to cart position on product list
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // permission 10 is default
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 21 );
	}

	add_action( 'dunker_core_action_shop_list_item_layout_info-below', 'dunker_core_register_shop_list_info_below_actions' );
}
