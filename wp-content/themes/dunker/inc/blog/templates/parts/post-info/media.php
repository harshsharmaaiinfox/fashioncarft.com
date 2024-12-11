<div class="qodef-e-media">
<?php
switch ( get_post_format() ) {
	case 'gallery':
		dunker_template_part( 'blog', 'templates/parts/post-format/gallery' );
		break;
	case 'video':
		dunker_template_part( 'blog', 'templates/parts/post-format/video' );
		break;
	case 'audio':
		dunker_template_part( 'blog', 'templates/parts/post-format/audio' );
		break;
	default:
		dunker_template_part( 'blog', 'templates/parts/post-info/image' );
		break;
}
?>
</div>
