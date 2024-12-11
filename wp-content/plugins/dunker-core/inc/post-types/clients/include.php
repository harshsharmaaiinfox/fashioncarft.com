<?php

include_once DUNKER_CORE_CPT_PATH . '/clients/helper.php';

foreach ( glob( DUNKER_CORE_CPT_PATH . '/clients/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}
