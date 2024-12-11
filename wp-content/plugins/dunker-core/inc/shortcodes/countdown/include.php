<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/countdown/class-dunkercore-countdown-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
