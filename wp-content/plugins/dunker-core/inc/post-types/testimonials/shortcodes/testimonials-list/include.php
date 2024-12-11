<?php

include_once DUNKER_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/class-dunkercore-testimonials-list-shortcode.php';

foreach ( glob( DUNKER_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
