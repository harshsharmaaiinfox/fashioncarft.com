<?php
$post_id       = get_the_ID();
$is_enabled    = dunker_core_get_post_value_through_levels( 'qodef_portfolio_single_enable_related_posts' );
$related_posts = dunker_core_get_custom_post_type_related_posts( $post_id, dunker_core_get_portfolio_single_post_taxonomies( $post_id ) );

if ( 'yes' === $is_enabled && ! empty( $related_posts ) && class_exists( 'DunkerCore_Portfolio_List_Shortcode' ) ) { ?>
	<div id="qodef-portfolio-single-related-items">
		<?php
		$params = apply_filters(
			'dunker_core_filter_portfolio_single_related_posts_params',
			array(
				'columns'           => '3',
				'posts_per_page'    => 3,
				'additional_params' => 'id',
				'post_ids'          => $related_posts['items'],
				'layout'            => 'info-below',
				'title_tag'         => 'h5',
				'excerpt_length'    => '100',
			)
		);

		echo DunkerCore_Portfolio_List_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
