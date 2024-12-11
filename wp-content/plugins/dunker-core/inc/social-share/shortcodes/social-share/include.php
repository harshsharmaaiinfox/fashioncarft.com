<?php

include_once DUNKER_CORE_INC_PATH . '/social-share/shortcodes/social-share/class-dunkercore-social-share-shortcode.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
