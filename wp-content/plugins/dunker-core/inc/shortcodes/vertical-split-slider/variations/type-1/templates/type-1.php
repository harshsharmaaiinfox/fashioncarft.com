<?php

$params = array_merge( $params, dunker_core_vertical_split_slider_generate_template_params( $item ) );

// include content title
dunker_core_template_part( 'shortcodes/vertical-split-slider', 'templates/parts/title', '', $params );

// include content text
dunker_core_template_part( 'shortcodes/vertical-split-slider', 'templates/parts/text', '', $params );

// include content button
dunker_core_template_part( 'shortcodes/vertical-split-slider', 'templates/parts/button', '', $params );
