<?php

include_once DUNKER_CORE_INC_PATH . '/blog/helper.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/blog/dashboard/admin/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( DUNKER_CORE_INC_PATH . '/blog/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( DUNKER_CORE_INC_PATH . '/blog/dashboard/meta-box/post-format/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( DUNKER_CORE_INC_PATH . '/blog/templates/single/*/include.php' ) as $module ) {
	include_once $module;
}
