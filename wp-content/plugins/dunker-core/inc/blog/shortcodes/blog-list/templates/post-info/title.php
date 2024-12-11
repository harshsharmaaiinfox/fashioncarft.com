<?php
$title_tag_default = isset( $title_tag_default ) && ! empty( $title_tag_default ) ? $title_tag_default : 'h5';
$title_tag         = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : $title_tag_default;
?>
<<?php echo esc_attr( $title_tag ); ?> itemprop="name" class="qodef-e-title entry-title" <?php qode_framework_inline_style( $this_shortcode->get_title_styles( $params ) ); ?>>
	<a itemprop="url" class="qodef-e-title-link" href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</<?php echo esc_attr( $title_tag ); ?>>
