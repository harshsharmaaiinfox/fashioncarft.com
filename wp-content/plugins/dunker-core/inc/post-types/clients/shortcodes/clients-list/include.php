<?php

include_once DUNKER_CORE_CPT_PATH . '/clients/shortcodes/clients-list/class-dunkercore-clients-list-shortcode.php';

foreach ( glob( DUNKER_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
