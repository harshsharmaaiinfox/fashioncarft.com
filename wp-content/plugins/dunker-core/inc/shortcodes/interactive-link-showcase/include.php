<?php

include_once DUNKER_CORE_SHORTCODES_PATH . '/interactive-link-showcase/class-dunkercore-interactive-link-showcase-shortcode.php';

foreach ( glob( DUNKER_CORE_SHORTCODES_PATH . '/interactive-link-showcase/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
