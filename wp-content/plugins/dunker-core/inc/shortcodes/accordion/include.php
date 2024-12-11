<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/accordion/class-dunkercore-accordion-shortcode.php';
include_once DUNKER_CORE_SHORTCODES_PATH . '/accordion/class-dunkercore-accordion-child-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/accordion/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
