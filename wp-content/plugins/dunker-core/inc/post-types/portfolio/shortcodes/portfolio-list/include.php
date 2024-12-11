<?php

include_once DUNKER_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/helper.php';
include_once DUNKER_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/class-dunkercore-portfolio-list-shortcode.php';

foreach ( glob( DUNKER_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
