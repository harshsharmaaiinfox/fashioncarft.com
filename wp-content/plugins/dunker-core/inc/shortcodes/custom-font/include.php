<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/custom-font/class-dunkercore-custom-font-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
