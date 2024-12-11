<?php

include_once DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/class-dunkercore-product-list-shortcode.php';
include_once DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/helper.php';

foreach ( glob( DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
