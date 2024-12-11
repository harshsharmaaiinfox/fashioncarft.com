<?php

$params = array_merge( $params, dunker_core_vertical_split_slider_generate_template_params( $item ) );

// include content title
dunker_core_template_part( 'shortcodes/vertical-split-slider', 'templates/parts/title', '', $params );
?>
<?php if ( ! empty( $params['list_item_1'] ) ) : ?>
	<?php
	$params['icon_list_item_params'] = array(
		'title' => $params['list_item_1'],
	);

	// include content list item
	dunker_core_template_part( 'shortcodes/vertical-split-slider', 'templates/parts/icon-list-item', '', $params );
	?>
<?php endif; ?>
<?php if ( ! empty( $params['list_item_2'] ) ) : ?>
	<?php
	$params['icon_list_item_params'] = array(
		'title' => $params['list_item_2'],
	);

	// include content list item
	dunker_core_template_part( 'shortcodes/vertical-split-slider', 'templates/parts/icon-list-item', '', $params );
	?>
	<?php
endif;
