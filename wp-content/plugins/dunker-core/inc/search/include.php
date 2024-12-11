<?php

include_once DUNKER_CORE_INC_PATH . '/search/class-dunkercore-search.php';
include_once DUNKER_CORE_INC_PATH . '/search/helper.php';
include_once DUNKER_CORE_INC_PATH . '/search/dashboard/admin/search-options.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/search/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}
