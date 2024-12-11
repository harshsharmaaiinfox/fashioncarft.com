<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/image-with-text/class-dunkercore-image-with-text-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/image-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
