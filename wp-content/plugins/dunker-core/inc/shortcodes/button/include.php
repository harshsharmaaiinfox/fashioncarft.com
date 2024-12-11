<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/button/class-dunkercore-button-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
