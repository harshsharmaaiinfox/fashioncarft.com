<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/tabs/class-dunkercore-tab-shortcode.php';
include_once DUNKER_CORE_SHORTCODES_PATH . '/tabs/class-dunkercore-tab-child-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/tabs/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
