<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/text-marquee/class-dunkercore-text-marquee-shortcode.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/shortcodes/text-marquee/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
