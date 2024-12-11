<?php

/**
 * Global templates hooks
 */

if ( ! function_exists( 'dunker_add_main_woo_page_template_holder' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function dunker_add_main_woo_page_template_holder() {
		echo '<main id="qodef-page-content" class="qodef-grid qodef-layout--template ' . esc_attr( dunker_get_grid_gutter_classes() ) . '" ' . dunker_get_grid_gutter_styles() . ' role="main"><div class="qodef-grid-inner">';
	}
}

if ( ! function_exists( 'dunker_add_main_woo_page_template_holder_end' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function dunker_add_main_woo_page_template_holder_end() {
		echo '</div></main>';
	}
}

if ( ! function_exists( 'dunker_add_main_woo_page_holder' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function dunker_add_main_woo_page_holder() {
		$classes = array();

		// add class to single page
		if ( dunker_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef-grid-item qodef-col--12';
		}

		// add class to pages with sidebar
		if ( dunker_is_woo_page( 'archive' ) ) {
			$classes[] = 'qodef-grid-item';
			$classes[] = dunker_get_page_content_sidebar_classes();
		}

		$classes[] = dunker_get_woo_main_page_classes();

		echo '<div id="qodef-woo-page" class="' . esc_attr( implode( ' ', $classes ) ) . '">';
	}
}

if ( ! function_exists( 'dunker_add_main_woo_page_holder_end' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function dunker_add_main_woo_page_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_main_woo_page_sidebar_holder' ) ) {
	/**
	 * Function that render sidebar layout for main shop page
	 */
	function dunker_add_main_woo_page_sidebar_holder() {

		if ( ! dunker_is_woo_page( 'single' ) ) {
			// Include page content sidebar
			dunker_template_part( 'sidebar', 'templates/sidebar' );
		}
	}
}

/**
 * Shop page templates hooks
 */

if ( ! function_exists( 'dunker_add_results_and_ordering_holder' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function dunker_add_results_and_ordering_holder() {
		if ( dunker_is_woo_page( 'archive' ) ) {
			echo '<div class="qodef-woo-results">';
		}
	}
}

if ( ! function_exists( 'dunker_add_results_and_ordering_holder_end' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function dunker_add_results_and_ordering_holder_end() {
		if ( dunker_is_woo_page( 'archive' ) ) {
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_holder' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function dunker_add_product_list_item_holder() {
		echo '<div class="qodef-e-inner">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_holder_end' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function dunker_add_product_list_item_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_media_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function dunker_add_product_list_item_media_holder() {
		do_action( 'qodef_woo_product_list_additional_before_media_content' );
		echo '<div class="qodef-e-media">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_media_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function dunker_add_product_list_item_media_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_media_image_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function dunker_add_product_list_item_media_image_holder() {
		echo '<div class="qodef-e-media-image">';
		do_action( 'qodef_woo_product_list_title_tag_link_open' );
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_media_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function dunker_add_product_list_item_media_image_holder_end() {
		do_action( 'qodef_woo_product_list_title_tag_link_close' );
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_gallery_slider' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function dunker_add_product_list_item_gallery_slider() {

		if ( dunker_is_installed( 'core' ) ) {
			$image_ids  = dunker_woo_get_gallery_ids( false );
			$hover_type = dunker_get_post_value_through_levels( 'qodef_woo_product_list_hover_type' );

			if ( ! empty( $image_ids ) && isset( $hover_type ) && ! in_array( $hover_type, array( 'none', 'default' ), true ) ) {
				$data                 = array();
				$data['autoplay']     = false;
				$data['spaceBetween'] = 30;

				$html  = '<div class="qodef-e-media-inner qodef-swiper-container"' . qode_framework_get_inline_attr( json_encode( $data ), 'data-options' ) . '>';
				$html .= '<div class="swiper-wrapper">';

				foreach ( $image_ids as $image_id ) {
					$html .= '<div class="swiper-slide">';
					$html .= wp_get_attachment_image( $image_id, 'woocommerce_thumbnail' );
					$html .= '</div>';
				}
				$html .= '</div>';
				$html .= '<div class="swiper-button-prev">' . dunker_get_svg_icon( 'slider-arrow-left-alt' ) . '</div>';
				$html .= '<div class="swiper-button-next">' . dunker_get_svg_icon( 'slider-arrow-right-alt' ) . '</div>';
				$html .= '</div>';

				echo dunker_woo_return_module_part( $html );
			}
		}
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_content_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function dunker_add_product_list_item_content_holder() {
		echo '<div class="qodef-e-content"><div class="qodef-e-text-wrapper">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_content_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function dunker_add_product_list_item_content_holder_end() {
		echo '</div>';
		// Hook to include additional content inside product list item content
		do_action( 'dunker_action_product_list_item_additional_content' );
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_bottom_and_info_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function dunker_add_product_list_item_bottom_and_info_holder() {
		echo '<div class="qodef-e-bottom-holder"><div class="qodef-e-info">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_bottom_and_info_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function dunker_add_product_list_item_bottom_and_info_holder_end() {
		echo '</div></div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_categories' ) ) {
	/**
	 * Function that render product categories
	 */
	function dunker_add_product_list_item_categories() {
		$categories = wp_get_post_terms( get_the_ID(), 'product_cat' );

		if ( ! empty( $categories ) ) { ?>
			<?php echo get_the_term_list( get_the_ID(), 'product_cat', '', '<span class="qodef-info-separator-single"></span>' ); ?>
			<div class="qodef-info-separator-end"></div>
			<?php
		}
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_top_and_info_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function dunker_add_product_list_item_top_and_info_holder() {
		echo '<div class="qodef-e-top-holder"><div class="qodef-e-info">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_top_and_info_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function dunker_add_product_list_item_top_and_info_holder_end() {
		echo '</div></div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_brands' ) ) {
	/**
	 * Function that render product brands
	 */
	function dunker_add_product_list_item_brands() {
		$brands = dunker_is_installed( 'core' ) ? wp_get_post_terms( get_the_ID(), 'product_brand' ) : array();

		if ( ! empty( $brands ) ) {
			?>
			<?php echo get_the_term_list( get_the_ID(), 'product_brand', '', '<span class="qodef-info-separator-single"></span>' ); ?>
			<div class="qodef-info-separator-end"></div>
			<?php
		}
	}
}

/**
 * Product single page templates hooks
 */

if ( ! function_exists( 'dunker_add_product_single_content_holder' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function dunker_add_product_single_content_holder() {
		echo '<div class="qodef-woo-single-inner">';
	}
}

if ( ! function_exists( 'dunker_add_product_single_content_holder_end' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function dunker_add_product_single_content_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_single_image_holder' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function dunker_add_product_single_image_holder() {
		echo '<div class="qodef-woo-single-image">';
	}
}

if ( ! function_exists( 'dunker_add_product_single_image_holder_end' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function dunker_add_product_single_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_woo_product_render_social_share_html' ) ) {
	/**
	 * Function that render social share html
	 */
	function dunker_woo_product_render_social_share_html() {
		$social_share_enabled = 'yes' === dunker_get_post_value_through_levels( 'qodef_woo_enable_social_share' );
		$social_share_layout  = dunker_get_post_value_through_levels( 'qodef_social_share_layout' );

		if ( class_exists( 'DunkerCore_Social_Share_Shortcode' ) && $social_share_enabled ) {
			$params = array(
				'layout'            => $social_share_layout,
				'dropdown_behavior' => 'right',
				'icon_font'         => 'ionicons',
			);

			echo DunkerCore_Social_Share_Shortcode::call_shortcode( $params ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

/**
 * Override default WooCommerce templates
 */

if ( ! function_exists( 'dunker_woo_disable_page_heading' ) ) {
	/**
	 * Function that disable heading template on main shop page
	 *
	 * @return bool
	 */
	function dunker_woo_disable_page_heading() {
		return false;
	}
}

if ( ! function_exists( 'dunker_add_product_list_holder' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function dunker_add_product_list_holder( $html ) {
		$classes    = array();
		$layout     = dunker_get_post_value_through_levels( 'qodef_product_list_item_layout' );
		$gutter     = dunker_get_post_value_through_levels( 'qodef_woo_product_list_columns_space' );
		$border     = dunker_get_post_value_through_levels( 'qodef_woo_product_list_enable_item_border' );
		$hover_type = dunker_get_post_value_through_levels( 'qodef_woo_product_list_hover_type' );

		if ( ! empty( $layout ) ) {
			$classes[] = 'qodef-item-layout--' . $layout;
		}

		if ( ! empty( $gutter ) ) {
			$classes[] = 'qodef-gutter--' . $gutter;
		}

		if ( ! empty( $border ) ) {
			$border    = 'info-below' === $layout ? $border : 'no';
			$classes[] = 'qodef-item-border--' . $border;
		}

		if ( ! empty( $hover_type ) ) {
			$classes[] = 'info-below' === $layout ? 'qodef-hover-type--' . $hover_type : '';
		}

		$styles = dunker_get_gutter_custom_styles( 'qodef_woo_product_list_columns_space_' );

		return '<div class="qodef-woo-product-list ' . esc_attr( implode( ' ', $classes ) ) . '" ' . dunker_get_inline_style( $styles ) . '>' . $html;
	}
}

if ( ! function_exists( 'dunker_add_product_list_holder_end' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function dunker_add_product_list_holder_end( $html ) {
		return $html . '</div>';
	}
}

if ( ! function_exists( 'dunker_woo_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for main shop page
	 *
	 * @return int
	 */
	function dunker_woo_product_list_columns() {
		$option = dunker_get_post_value_through_levels( 'qodef_woo_product_list_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		} else {
			$columns = 3;
		}

		return $columns;
	}
}

if ( ! function_exists( 'dunker_woo_products_per_page' ) ) {
	/**
	 * Function that set number of items for main shop page
	 *
	 * @param int $products_per_page
	 *
	 * @return int
	 */
	function dunker_woo_products_per_page( $products_per_page ) {
		$option = dunker_get_post_value_through_levels( 'qodef_woo_product_list_products_per_page' );

		if ( ! empty( $option ) ) {
			$products_per_page = intval( $option );
		}

		return $products_per_page;
	}
}

if ( ! function_exists( 'dunker_woo_pagination_args' ) ) {
	/**
	 * Function that override pagination args on main shop page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function dunker_woo_pagination_args( $args ) {
		$args['prev_text']          = dunker_get_svg_icon( 'pagination-arrow-left' );
		$args['next_text']          = dunker_get_svg_icon( 'pagination-arrow-right' );
		$args['type']               = 'plain';
		$args['before_page_number'] = '0';

		return $args;
	}
}

if ( ! function_exists( 'dunker_add_single_product_classes' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 *
	 * @param array $classes Default argument array
	 * @param string $class
	 * @param int $post_id
	 *
	 * @return array
	 */
	function dunker_add_single_product_classes( $classes, $class = '', $post_id = 0 ) {
		if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
			return $classes;
		}

		$product = wc_get_product( $post_id );

		if ( $product ) {
			$new = get_post_meta( $post_id, 'qodef_show_new_sign', true );

			if ( 'yes' === $new ) {
				$classes[] = 'new';
			}
		}

		return $classes;
	}
}

if ( ! function_exists( 'dunker_add_sale_flash_on_product' ) ) {
	/**
	 * Function for adding on sale template for product
	 */
	function dunker_add_sale_flash_on_product() {
		echo dunker_woo_set_sale_flash(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'dunker_woo_set_sale_flash' ) ) {
	/**
	 * Function that override on sale template for product
	 *
	 * @return string which contains html content
	 */
	function dunker_woo_set_sale_flash() {
		$product = dunker_woo_get_global_product();

		if ( ! empty( $product ) && $product->is_on_sale() && $product->is_in_stock() ) {
			return dunker_woo_get_woocommerce_sale( $product );
		}

		return '';
	}
}

if ( ! function_exists( 'dunker_woo_get_woocommerce_sale' ) ) {
	/**
	 * Function that return sale mark label
	 *
	 * @param object $product
	 *
	 * @return string
	 */
	function dunker_woo_get_woocommerce_sale( $product ) {
		$enable_percent_mark = dunker_get_post_value_through_levels( 'qodef_woo_enable_percent_sign_value' );
		$price               = floatval( $product->get_regular_price() );
		$sale_price          = floatval( $product->get_sale_price() );

		if ( $price > 0 && 'yes' === $enable_percent_mark ) {
			$sale_label = '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			$sale_label = esc_html__( 'Sale', 'dunker' );
		}

		return '<span class="qodef-woo-product-mark qodef-woo-onsale">' . $sale_label . '</span>';
	}
}

if ( ! function_exists( 'dunker_add_out_of_stock_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function dunker_add_out_of_stock_mark_on_product() {
		$product = dunker_woo_get_global_product();

		if ( ! empty( $product ) && ! $product->is_in_stock() ) {
			echo dunker_get_out_of_stock_mark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'dunker_get_out_of_stock_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @return string
	 */
	function dunker_get_out_of_stock_mark() {
		return '<span class="qodef-woo-product-mark qodef-out-of-stock">' . esc_html__( 'Sold', 'dunker' ) . '</span>';
	}
}

if ( ! function_exists( 'dunker_add_new_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function dunker_add_new_mark_on_product() {
		$product = dunker_woo_get_global_product();

		if ( ! empty( $product ) && $product->get_id() !== '' ) {
			echo dunker_get_new_mark( $product->get_id() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'dunker_get_new_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @param int $product_id
	 *
	 * @return string
	 */
	function dunker_get_new_mark( $product_id ) {
		$option = get_post_meta( $product_id, 'qodef_show_new_sign', true );

		if ( 'yes' === $option ) {
			return '<span class="qodef-woo-product-mark qodef-new">' . esc_html__( 'New', 'dunker' ) . '</span>';
		}

		return false;
	}
}

if ( ! function_exists( 'dunker_woo_shop_loop_item_title' ) ) {
	/**
	 * Function that override product list item title template
	 */
	function dunker_woo_shop_loop_item_title() {
		$option    = dunker_get_post_value_through_levels( 'qodef_woo_product_list_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h5';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title woocommerce-loop-product__title">';
		do_action( 'qodef_woo_product_list_title_tag_link_open' );
		echo wp_kses_post( get_the_title() );
		do_action( 'qodef_woo_product_list_title_tag_link_close' );
		echo '</' . esc_attr( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'dunker_woo_template_single_title' ) ) {
	/**
	 * Function that override product single item title template
	 */
	function dunker_woo_template_single_title() {
		$option    = dunker_get_post_value_through_levels( 'qodef_woo_single_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h1';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title product_title entry-title">' . wp_kses_post( get_the_title() ) . '</' . esc_attr( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'dunker_woo_single_thumbnail_images_columns' ) ) {
	/**
	 * Function that set number of columns for thumbnail images on single product page
	 *
	 * @param int $columns
	 *
	 * @return int
	 */
	function dunker_woo_single_thumbnail_images_columns( $columns ) {
		$option = dunker_get_post_value_through_levels( 'qodef_woo_single_thumbnail_images_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		} else {
			$columns = 5;
		}

		return $columns;
	}
}

if ( ! function_exists( 'dunker_woo_single_thumbnail_images_size' ) ) {
	/**
	 * Function that set thumbnail images size on single product page
	 *
	 * @return string
	 */
	function dunker_woo_single_thumbnail_images_size() {
		return apply_filters( 'dunker_filter_woo_single_thumbnail_size', 'thumbnail' );
	}
}

if ( ! function_exists( 'dunker_woo_single_thumbnail_images_wrapper' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function dunker_woo_single_thumbnail_images_wrapper() {
		$thumbnails_position = dunker_woo_get_single_thumb_images_position();

		$html = '<div class="qodef-woo-thumbnails-wrapper">';

		if ( dunker_is_installed( 'core' ) && 'below' === $thumbnails_position ) {
			$data    = array();
			$columns = dunker_get_post_value_through_levels( 'qodef_woo_single_thumbnail_images_columns' );
			$columns = '' !== $columns ? intval( $columns ) : 5;

			$data['slidesPerView']     = $columns;
			$data['slidesPerView1366'] = $columns;
			$data['slidesPerView1024'] = $columns;
			$data['slidesPerView768']  = $columns;
			$data['slidesPerView680']  = min( $columns, 3 );
			$data['slidesPerView480']  = min( $columns, 3 );
			$data['loop']              = false;
			$data['autoplay']          = false;

			$html  = '<div class="qodef-woo-thumbnails-wrapper qodef-swiper-container"' . qode_framework_get_inline_attr( json_encode( $data ), 'data-options' ) . '>';
			$html .= '<div class="swiper-wrapper">';
		}

		echo dunker_woo_return_module_part( $html );
	}
}

if ( ! function_exists( 'dunker_woo_single_thumbnail_images_wrapper_end' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function dunker_woo_single_thumbnail_images_wrapper_end() {
		$thumbnails_position = dunker_woo_get_single_thumb_images_position();

		$html = '</div>';

		if ( dunker_is_installed( 'core' ) && 'below' === $thumbnails_position ) {
			$html .= '<div class="swiper-button-prev">' . dunker_get_svg_icon( 'slider-arrow-left' ) . '</div>';
			$html .= '<div class="swiper-button-next">' . dunker_get_svg_icon( 'slider-arrow-right' ) . '</div>';
			$html .= '</div>';
		}

		echo dunker_woo_return_module_part( $html );
	}
}

if ( ! function_exists( 'dunker_woo_single_thumbnail_image_html_wrapper' ) ) {
	/**
	 * Function that add additional wrapper around each thumbnail image on single product
	 */
	function dunker_woo_single_thumbnail_image_html_wrapper( $image_html, $post_thumbnail_id ) {
		$product = dunker_woo_get_global_product();

		if ( $post_thumbnail_id === $product->get_image_id() ) {
			return $image_html;
		}

		$thumbnails_position = dunker_woo_get_single_thumb_images_position();

		if ( dunker_is_installed( 'core' ) && 'below' === $thumbnails_position ) {
			return '<div class="swiper-slide">' . $image_html . '</div>';
		}

		return $image_html;
	}

	add_filter( 'woocommerce_single_product_image_thumbnail_html', 'dunker_woo_single_thumbnail_image_html_wrapper', 10, 2 );
}

if ( ! function_exists( 'dunker_woo_single_related_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for related product list on single product page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function dunker_woo_single_related_product_list_columns( $args ) {
		$option = dunker_get_post_value_through_levels( 'qodef_woo_single_related_product_list_columns' );

		if ( ! empty( $option ) ) {
			$args['posts_per_page'] = intval( $option );
			$args['columns']        = intval( $option );
		}

		return $args;
	}
}

if ( ! function_exists( 'dunker_woo_product_get_rating_html' ) ) {
	/**
	 * Function that override ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float $rating
	 *
	 * @return string
	 */
	function dunker_woo_product_get_rating_html( $html, $rating ) {
		if ( ! empty( $rating ) ) {
			$html  = '<div class="qodef-woo-ratings qodef-m"><div class="qodef-m-inner">';
			$html .= '<div class="qodef-m-star qodef--initial">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= dunker_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '<div class="qodef-m-star qodef--active" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= dunker_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '</div></div>';
		}

		return $html;
	}
}

if ( ! function_exists( 'dunker_woo_get_product_search_form' ) ) {
	/**
	 * Function that override product search widget form
	 *
	 * @return string which contains html content
	 */
	function dunker_woo_get_product_search_form() {
		return dunker_get_template_part( 'woocommerce', 'templates/product-searchform' );
	}
}

if ( ! function_exists( 'dunker_woo_get_content_widget_product' ) ) {
	/**
	 * Function that override product content widget
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function dunker_woo_get_content_widget_product( $located, $template_name ) {

		if ( 'content-widget-product.php' === $template_name && file_exists( DUNKER_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php' ) ) {
			$located = DUNKER_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'dunker_woo_get_quantity_input' ) ) {
	/**
	 * Function that override quantity input
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function dunker_woo_get_quantity_input( $located, $template_name ) {

		if ( 'global/quantity-input.php' === $template_name && file_exists( DUNKER_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php' ) ) {
			$located = DUNKER_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'dunker_woo_get_single_product_meta' ) ) {
	/**
	 * Function that override single product meta
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function dunker_woo_get_single_product_meta( $located, $template_name ) {

		if ( 'single-product/meta.php' === $template_name && file_exists( DUNKER_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php' ) ) {
			$located = DUNKER_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'dunker_woo_add_search_widget_icon' ) ) {
	/**
	 * Function that add search icon into global js object
	 *
	 * @param $array
	 *
	 * @return mixed
	 */
	function dunker_woo_add_search_widget_icon( $array ) {
		$array['iconSearch'] = dunker_get_svg_icon( 'search' );

		return $array;
	}

	add_filter( 'dunker_filter_localize_main_js', 'dunker_woo_add_search_widget_icon' );
}

if ( ! function_exists( 'dunker_woocommerce_grouped_product_thumbnail' ) ) {
	function dunker_woocommerce_grouped_product_thumbnail( $product ) {
		$attachment_url = wp_get_attachment_image_src( $product->get_image_id() )[0];
		$attachment_alt = get_post_meta( $product->get_image_id(), '_wp_attachment_image_alt', true );
		?>
		<td class="woocommerce-grouped-product-list-item__image">
			<img src="<?php echo esc_url( $attachment_url ); ?>" alt="<?php echo esc_attr( $attachment_alt ); ?>" />
		</td>
		<?php
	}
}

if ( ! function_exists( 'dunker_woocommerce_rearrange_grouped_product_columns' ) ) {
	function dunker_woocommerce_rearrange_grouped_product_columns( $columns, $product ) {
		return array(
			'label',
			'quantity',
			'price',
		);
	}
}

if ( ! function_exists( 'dunker_woo_return_module_part' ) ) {
	function dunker_woo_return_module_part( $module ) {
		return $module;
	}
}

if ( ! function_exists( 'dunker_woo_get_gallery_ids' ) ) {
	function dunker_woo_get_gallery_ids( $with_main = true ) {
		$product        = dunker_woo_get_global_product();
		$attachment_ids = $product->get_gallery_image_ids();

		if ( $with_main ) {
			$post_thumbnail_id = $product->get_image_id();
			array_unshift( $attachment_ids, intval( $post_thumbnail_id ) );
		}

		return $attachment_ids;
	}
}

if ( ! function_exists( 'dunker_woo_get_product_single_layout' ) ) {
	/**
	 * Checks out the layout of product single page
	 *
	 * @return string
	 */
	function dunker_woo_get_product_single_layout() {

		if ( get_post_type() === 'product' ) {
			$product_page_layout = get_post_meta( get_the_ID(), 'qodef_product_layout', true );

			return $product_page_layout;
		}
	}
}

if ( ! function_exists( 'dunker_product_single_layout_class' ) ) {

	function dunker_product_single_layout_class( $classes ) {

		$layout = dunker_woo_get_product_single_layout();

		if ( is_singular() ) {
			$classes[] = 'qodef-product-single-' . $layout . '-layout';
		}

		return $classes;

	}

	add_filter( 'body_class', 'dunker_product_single_layout_class' );
}

if ( ! function_exists( 'dunker_woo_get_product_render_large_gallery_layout' ) ) {
	/**
	 * Creates image gallery for "Large Gallery" product layout
	 *
	 * @return gallery HTML
	 */
	function dunker_woo_get_product_render_large_gallery_layout( $columns = 1 ) {

		if ( 'product' === get_post_type() && in_array( dunker_woo_get_product_single_layout(), array( 'fixed-info', 'big-images' ), true ) ) {
			$attachment_ids = dunker_woo_get_gallery_ids();

			$html  = '<div class="qodef-grid qodef-layout--columns qodef-gutter--no qodef-col-num--' . $columns . ' qodef-responsive--predefined qodef-item-border--yes">';
			$html .= '<div class="qodef-grid-inner">';

			foreach ( $attachment_ids as $image_id ) {
				$html .= '<div class="qodef-product-gallery-image qodef-grid-item">';
				$html .= wp_get_attachment_image( $image_id, 'full' );
				$html .= '</div>';
			}

			$html .= '</div></div>';

			echo dunker_woo_return_module_part( $html );
		}
	}
}

if ( ! function_exists( 'dunker_woo_sticky_start' ) ) {
	function dunker_woo_sticky_start() {
		if ( 'product' === get_post_type() && 'fixed-info' === dunker_woo_get_product_single_layout() ) {
			echo '<div class="qodef-sticky-column"><div class="qodef-sticky-wrapper"><div class="qodef-sticky-item">';
		}
	}
}

if ( ! function_exists( 'dunker_woo_sticky_end' ) ) {
	function dunker_woo_sticky_end() {
		if ( 'product' === get_post_type() && 'fixed-info' === dunker_woo_get_product_single_layout() ) {
			echo '</div></div></div>';
		}
	}
}

if ( ! function_exists( 'dunker_woo_get_product_image_gallery' ) ) {
	/**
	 * Creates image gallery for product single page
	 *
	 * @return gallery HTML
	 */
	function dunker_woo_get_product_image_gallery() {

		if ( get_post_type() === 'product' ) {
			$product_layout = dunker_woo_get_product_single_layout();

			switch ( $product_layout ) {
				case 'big-images':
					dunker_woo_get_product_render_large_gallery_layout( 2 );
					break;
				case 'fixed-info':
					dunker_woo_get_product_render_large_gallery_layout();
					break;
				default:
					add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 29 );
			}
		}
	}
}

if ( ! function_exists( 'dunker_woo_split_grid_start' ) ) {
	function dunker_woo_split_grid_start() {
		if ( 'product' === get_post_type() && 'split' === dunker_woo_get_product_single_layout() ) {
			echo '<div class="qodef-content-grid">';
		}
	}
}

if ( ! function_exists( 'dunker_woo_split_grid_end' ) ) {
	function dunker_woo_split_grid_end() {
		if ( 'product' === get_post_type() && 'split' === dunker_woo_get_product_single_layout() ) {
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'dunker_woo_notice_split_position' ) ) {
	function dunker_woo_notice_split_position() {

		if ( 'product' === get_post_type() && 'split' === dunker_woo_get_product_single_layout() ) {
			woocommerce_output_all_notices();
		}
	}
}
if ( ! function_exists( 'dunker_woo_notice_default_position' ) ) {
	function dunker_woo_notice_default_position() {

		if ( 'product' === get_post_type() && 'split' !== dunker_woo_get_product_single_layout() ) {
			woocommerce_output_all_notices();
		}
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_inner_content_holder' ) ) {
	/**
	 * Function that render additional content holder
	 */
	function dunker_add_product_list_item_inner_content_holder() {
		echo '<div class="qodef-e-media-inner">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_inner_content_holder_end' ) ) {
	/**
	 * Function that render additional content holder
	 */
	function dunker_add_product_list_item_inner_content_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_inner_content_top_holder' ) ) {
	/**
	 * Function that render additional inner content holder
	 */
	function dunker_add_product_list_item_inner_content_top_holder() {
		echo '<div class="qodef-e-media-inner-top"><div class="qodef-e-content">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_inner_content_top_holder_end' ) ) {
	/**
	 * Function that render additional inner content holder
	 */
	function dunker_add_product_list_item_inner_content_top_holder_end() {
		echo '</div>';
		do_action( 'dunker_core_action_product_list_item_additional_top_content' );
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_inner_content_bottom_holder' ) ) {
	/**
	 * Function that render additional inner content holder
	 */
	function dunker_add_product_list_item_inner_content_bottom_holder() {
		echo '<div class="qodef-e-media-inner-bottom">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_inner_content_bottom_holder_end' ) ) {
	/**
	 * Function that render additional inner content holder
	 */
	function dunker_add_product_list_item_inner_content_bottom_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_button_wrapper' ) ) {
	/**
	 * Function that render additional content around add to cart button
	 */
	function dunker_add_product_list_item_button_wrapper() {
		echo '<div class="qodef-e-woo-button">';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_button_wrapper_end' ) ) {
	/**
	 * Function that render additional content around add to cart button
	 */
	function dunker_add_product_list_item_button_wrapper_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_button_label' ) ) {
	/**
	 * Function that render button label
	 */
	function dunker_add_product_list_item_button_label() {
		esc_html_e( 'Shop Now', 'dunker' );
	}
}

if ( ! function_exists( 'dunker_add_product_list_item_label' ) ) {
	/**
	 * Function that render additional content around add to cart button
	 */
	function dunker_add_product_list_item_label() {
		$label = get_post_meta( get_the_ID(), 'qodef_product_label', true );
		if ( ! empty( $label ) ) {
			echo '<span class="qodef-e-product-label">' . esc_html( $label ) . '</span>';
		}

	}
}
