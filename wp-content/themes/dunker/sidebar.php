<?php if ( is_active_sidebar( dunker_get_sidebar_name() ) ) { ?>
	<aside id="qodef-page-sidebar" role="complementary">
		<?php dynamic_sidebar( dunker_get_sidebar_name() ); ?>
	</aside>
<?php } ?>
