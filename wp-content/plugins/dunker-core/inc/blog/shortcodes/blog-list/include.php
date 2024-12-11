<?php

include_once DUNKER_CORE_INC_PATH . '/blog/shortcodes/blog-list/class-dunkercore-blog-list-shortcode.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/blog/shortcodes/blog-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
