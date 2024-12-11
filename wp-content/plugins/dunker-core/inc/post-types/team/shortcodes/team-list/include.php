<?php

include_once DUNKER_CORE_CPT_PATH . '/team/shortcodes/team-list/class-dunkercore-team-list-shortcode.php';

foreach ( glob( DUNKER_CORE_CPT_PATH . '/team/shortcodes/team-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
