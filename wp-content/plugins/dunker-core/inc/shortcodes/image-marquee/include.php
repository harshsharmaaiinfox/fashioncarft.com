<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/image-marquee/class-dunkercore-image-marquee-shortcode.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/shortcodes/image-marquee/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
