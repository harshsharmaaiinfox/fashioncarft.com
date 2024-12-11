<?php
// Include logo.
dunker_core_get_header_logo_image();

// Include widget area one.
dunker_core_get_header_widget_area();

// Include menu opener.
dunker_core_get_opener_icon_html(
	array(
		'option_name'  => 'fullscreen_menu',
		'custom_class' => 'qodef-fullscreen-menu-opener',
	),
	true
);
