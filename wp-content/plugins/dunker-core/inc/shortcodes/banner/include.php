<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/banner/class-dunkercore-banner-shortcode.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
