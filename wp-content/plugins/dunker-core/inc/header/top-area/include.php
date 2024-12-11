<?php

include_once DUNKER_CORE_INC_PATH . '/header/top-area/class-dunkercore-top-area.php';
include_once DUNKER_CORE_INC_PATH . '/header/top-area/helper.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/header/top-area/dashboard/*/*.php' ) as $dashboard ) {
	include_once $dashboard;
}
