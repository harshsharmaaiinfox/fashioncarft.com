<?php

if ( ! class_exists( 'Dunker_WooCommerce' ) ) {
	/**
	 * WooCommerce theme class
	 */
	class Dunker_WooCommerce {
		private static $instance;

		public function __construct() {

			if ( dunker_is_installed( 'woocommerce' ) ) {
				// Include files
				$this->include_files();

				// Init
				add_action( 'before_woocommerce_init', array( $this, 'init' ) );
			}
		}

		/**
		 * @return Dunker_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function include_files() {
			// Include helper functions
			include_once DUNKER_INC_ROOT_DIR . '/woocommerce/helper.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			// Include template helper functions
			include_once DUNKER_INC_ROOT_DIR . '/woocommerce/template-functions.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		function init() {
			// Adds theme supports
			add_theme_support( 'woocommerce' );

			// Disable default WooCommerce style
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );

			// Enqueue 3rd party plugins script
			add_action( 'dunker_action_before_main_js', array( $this, 'enqueue_assets' ) );

			// Unset default WooCommerce templates modules
			$this->unset_templates_modules();

			// Add new WooCommerce templates
			$this->add_templates();

			// Change default WooCommerce templates position
			$this->change_templates_position();

			// Override default WooCommerce templates
			$this->override_templates();

			// Set default WooCommerce product layout
			$this->set_default_layout();
		}

		function enqueue_assets() {
			// Enqueue plugin's 3rd party scripts (select2 is registered inside WooCommerce plugin)
			wp_enqueue_script( 'select2' );
		}

		function unset_templates_modules() {
			// Remove main shop holder
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );

			// Remove breadcrumbs
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

			// Remove sidebar
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

			// Remove product link on list
			remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

			// Remove rating from single product
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating' );
		}

		function add_templates() {
			/**
			 * Global templates hooks
			 */

			// Add grid template holder around shop
			add_action( 'woocommerce_before_main_content', 'dunker_add_main_woo_page_template_holder', 5 ); // permission 5 is set because dunker_add_main_woo_page_holder hook is added on 10
			add_action( 'woocommerce_after_main_content', 'dunker_add_main_woo_page_template_holder_end', 20 ); // permission 20 is set because dunker_add_main_woo_page_holder_end hook is added on 10

			// Add main shop holder
			add_action( 'woocommerce_before_main_content', 'dunker_add_main_woo_page_holder', 10 );
			add_action( 'woocommerce_after_main_content', 'dunker_add_main_woo_page_holder_end', 10 );
			add_action( 'woocommerce_before_cart', 'dunker_add_main_woo_page_holder', 5 ); // permission 5 is set just to holder be at the first place
			add_action( 'woocommerce_after_cart', 'dunker_add_main_woo_page_holder_end', 20 ); // permission 20 is set just to holder be at the last place
			add_action( 'woocommerce_before_checkout_form', 'dunker_add_main_woo_page_holder', 5 ); // permission 5 is set just to holder be at the first place
			add_action( 'woocommerce_after_checkout_form', 'dunker_add_main_woo_page_holder_end', 20 ); // permission 20 is set just to holder be at the last place

			// Add additional tags around results and ordering
			add_action( 'woocommerce_before_shop_loop', 'dunker_add_results_and_ordering_holder', 15 ); // permission 5 is set because wc_print_notices hook is added on 10
			add_action( 'woocommerce_before_shop_loop', 'dunker_add_results_and_ordering_holder_end', 40 ); // permission 40 is set because woocommerce_catalog_ordering hook is added on 30

			// Add sidebar templates for shop page
			add_action( 'woocommerce_after_main_content', 'dunker_add_main_woo_page_sidebar_holder', 15 ); // permission 15 is set because dunker_add_main_woo_page_holder_end hook is added on 10

			// Override On sale template
			add_filter( 'woocommerce_sale_flash', 'dunker_woo_set_sale_flash' );
			add_action( 'dunker_core_action_woo_product_mark_info', 'dunker_add_sale_flash_on_product', 10 ); // permission 10 is set because woocommerce_show_product_loop_sale_flash hook is added on 10

			// Add out of stock mark for product list item
			add_filter( 'woocommerce_before_single_product_summary', 'dunker_add_out_of_stock_mark_on_product', 10 ); // permission 10 is set because woocommerce_show_product_sale_flash hook is added on 10
			add_action( 'dunker_core_action_woo_product_mark_info', 'dunker_add_out_of_stock_mark_on_product', 10 ); // permission 10 is set because woocommerce_show_product_loop_sale_flash hook is added on 10

			// Add new mark for product list item
			add_filter( 'woocommerce_before_single_product_summary', 'dunker_add_new_mark_on_product', 10 ); // permission 10 is set because woocommerce_show_product_sale_flash hook is added on 10
			add_action( 'dunker_core_action_woo_product_mark_info', 'dunker_add_new_mark_on_product', 10 ); // permission 10 is set because woocommerce_show_product_loop_sale_flash hook is added on 10

			/**
			 * Product single page templates hooks
			 */

			// Add additional tags around product image and content
			add_action( 'woocommerce_before_single_product_summary', 'dunker_add_product_single_content_holder', 2 ); // permission 2 is set because dunker_add_product_single_image_holder hook is added on 5
			add_action( 'woocommerce_after_single_product_summary', 'dunker_add_product_single_content_holder_end', 5 ); // permission 5 is set because woocommerce_output_product_data_tabs hook is added on 10

			// Add additional tags around product list item image
			add_action( 'woocommerce_before_single_product_summary', 'dunker_add_product_single_image_holder', 5 ); // permission 5 is set because woocommerce_show_product_sale_flash hook is added on 10
			add_action( 'woocommerce_before_single_product_summary', 'dunker_add_product_single_image_holder_end', 30 ); // permission 30 is set because woocommerce_show_product_images hook is added on 20

			// Add social share template for product single page
			add_action( 'woocommerce_product_meta_start', 'dunker_woo_product_render_social_share_html' );

			// add additional tags around product single thumbnails
			add_action( 'woocommerce_product_thumbnails', 'dunker_woo_single_thumbnail_images_wrapper', 5 );
			add_action( 'woocommerce_product_thumbnails', 'dunker_woo_single_thumbnail_images_wrapper_end', 35 );

			// add thumbnail to a grouped product
			add_action( 'woocommerce_grouped_product_list_before_label', 'dunker_woocommerce_grouped_product_thumbnail' );

			// add additional image layouts
			remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
			add_action( 'woocommerce_before_single_product_summary', 'dunker_woo_get_product_image_gallery', 25 );

			// add classes for sticky columns
			add_action( 'woocommerce_single_product_summary', 'dunker_woo_sticky_start', 1 );
			add_action( 'woocommerce_single_product_summary', 'dunker_woo_sticky_end', 50 );

			// add additional tags around wc tabs and related products in split layout
			add_action( 'woocommerce_after_single_product_summary', 'dunker_woo_split_grid_start', 6 );
			add_action( 'woocommerce_after_single_product', 'dunker_woo_split_grid_end', 50 );

			remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices' );
			add_action( 'woocommerce_single_product_summary', 'dunker_woo_notice_split_position', 4 );
			add_action( 'woocommerce_before_single_product', 'dunker_woo_notice_default_position' );
		}

		function change_templates_position() {
			// Add link inside dunker_woo_shop_loop_item_title
			add_action( 'qodef_woo_product_list_title_tag_link_open', 'woocommerce_template_loop_product_link_open' );
			add_action( 'qodef_woo_product_list_title_tag_link_close', 'woocommerce_template_loop_product_link_close' );

			// Change single product rating position
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
		}

		function override_templates() {

			// Disable page heading
			add_filter( 'woocommerce_show_page_title', 'dunker_woo_disable_page_heading' );

			// Override product list holder
			add_filter( 'woocommerce_product_loop_start', 'dunker_add_product_list_holder' );
			add_filter( 'woocommerce_product_loop_end', 'dunker_add_product_list_holder_end' );

			// Override number of columns for main shop page
			add_filter( 'loop_shop_columns', 'dunker_woo_product_list_columns' );

			// Override number of products per page
			add_filter( 'loop_shop_per_page', 'dunker_woo_products_per_page' );

			// Override list pagination args
			add_filter( 'woocommerce_pagination_args', 'dunker_woo_pagination_args' );

			// Override reviews pagination args
			add_filter( 'woocommerce_comment_pagination_args', 'dunker_woo_pagination_args' );

			// Override product title
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' ); // permission 10 is default
			add_action( 'woocommerce_shop_loop_item_title', 'dunker_woo_shop_loop_item_title', 10 );

			// Add product classes
			add_filter( 'post_class', 'dunker_add_single_product_classes', 10, 3 );

			// Override product title
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 ); // permission 5 is default
			add_action( 'woocommerce_single_product_summary', 'dunker_woo_template_single_title', 5 );

			// Override number of thumbnails for single product
			add_filter( 'woocommerce_product_thumbnails_columns', 'dunker_woo_single_thumbnail_images_columns' );

			// Override thumbnails size for single product
			add_filter( 'woocommerce_gallery_thumbnail_size', 'dunker_woo_single_thumbnail_images_size' );

			// Override related products args
			add_filter( 'woocommerce_output_related_products_args', 'dunker_woo_single_related_product_list_columns' );

			// Override rating template
			add_filter( 'woocommerce_product_get_rating_html', 'dunker_woo_product_get_rating_html', 10, 2 );

			// Override product search form template
			add_filter( 'get_product_search_form', 'dunker_woo_get_product_search_form' );

			// Override product content widget template
			add_filter( 'wc_get_template', 'dunker_woo_get_content_widget_product', 10, 2 );

			// Override quantity input template
			add_filter( 'wc_get_template', 'dunker_woo_get_quantity_input', 10, 2 );

			// Override single product meta template
			add_filter( 'wc_get_template', 'dunker_woo_get_single_product_meta', 10, 2 );

			// Override single grouped product columns
			add_filter( 'woocommerce_grouped_product_columns', 'dunker_woocommerce_rearrange_grouped_product_columns', 10, 2 );
		}

		function set_default_layout() {

			// This code is copied from core plugin - product list shortcode - info below variation
			if ( ! dunker_is_installed( 'core' ) ) {

				// Add additional tags around product list item
				add_action( 'woocommerce_before_shop_loop_item', 'dunker_add_product_list_item_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10
				add_action( 'woocommerce_after_shop_loop_item', 'dunker_add_product_list_item_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

				// Add additional tags around product list item image
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
		}
	}

	Dunker_WooCommerce::get_instance();
}
