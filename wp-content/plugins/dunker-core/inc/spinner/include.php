<?php

include_once DUNKER_CORE_INC_PATH . '/spinner/helper.php';
include_once DUNKER_CORE_INC_PATH . '/spinner/dashboard/admin/spinner-options.php';
include_once DUNKER_CORE_INC_PATH . '/spinner/dashboard/meta-box/spinner-meta-box.php';

foreach ( glob( DUNKER_CORE_INC_PATH . '/spinner/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}
