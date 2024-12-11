<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/icon-with-text/class-dunkercore-icon-with-text-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/icon-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
