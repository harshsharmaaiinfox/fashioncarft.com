<?php
$post_id       = get_the_ID();
$is_enabled    = dunker_core_get_post_value_through_levels( 'qodef_blog_single_enable_related_posts' );
$related_posts = dunker_core_get_custom_post_type_related_posts( $post_id, dunker_core_get_blog_single_post_taxonomies( $post_id ) );

if ( 'yes' === $is_enabled && ! empty( $related_posts ) && class_exists( 'DunkerCore_Blog_List_Shortcode' ) ) { ?>
	<div id="qodef-related-posts">
		<?php
		$params = apply_filters(
			'dunker_core_filter_blog_single_related_posts_params',
			array(
				'columns'           => '3',
				'posts_per_page'    => 3,
				'additional_params' => 'id',
				'post_ids'          => $related_posts['items'],
				'title_tag'         => 'h5',
				'excerpt_length'    => '100',
			)
		);

		echo DunkerCore_Blog_List_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
