<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/single-image/class-dunkercore-single-image-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/single-image/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
