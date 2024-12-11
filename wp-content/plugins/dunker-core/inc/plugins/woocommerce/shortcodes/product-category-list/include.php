<?php

include_once DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/media-custom-fields.php';
include_once DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/class-dunkercore-product-category-list-shortcode.php';

foreach ( glob( DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
