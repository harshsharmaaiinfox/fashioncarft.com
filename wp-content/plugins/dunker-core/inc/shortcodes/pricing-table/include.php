<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/pricing-table/class-dunkercore-pricing-table-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
