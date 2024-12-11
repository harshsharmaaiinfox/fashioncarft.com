<?php

include_once DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/interactive-product-categories/class-dunkercore-interactive-product-categories-shortcode.php';

foreach ( glob( DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/interactive-product-categories/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
