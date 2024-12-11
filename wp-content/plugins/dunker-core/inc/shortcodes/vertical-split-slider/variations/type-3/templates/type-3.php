<?php

$params = array_merge( $params, dunker_core_vertical_split_slider_generate_template_params( $item ) );

// include content testimonial
dunker_core_template_part( 'shortcodes/vertical-split-slider', 'templates/parts/testimonial', '', $params );
