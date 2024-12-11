<?php
$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'p';
?>
<<?php echo esc_attr( $title_tag ); ?> class="qodef-brand-name" <?php qode_framework_inline_style( $this_shortcode->get_title_styles( $params ) ); ?>>
	<?php echo esc_html( $title ); ?>
</<?php echo esc_attr( $title_tag ); ?>>
