<?php

include_once DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-brand-list/class-dunkercore-brand-list-shortcode.php';

foreach ( glob( DUNKER_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-brand-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
