<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/vertical-split-slider/helper.php';
include_once DUNKER_CORE_SHORTCODES_PATH . '/vertical-split-slider/class-dunkercore-vertical-split-slider-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/vertical-split-slider/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
