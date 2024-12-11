<?php do_action( 'dunker_action_before_page_header' ); ?>

<header id="qodef-page-header" role="banner">
	<div id="qodef-page-header-inner" class="<?php echo implode( ' ', apply_filters( 'dunker_filter_header_inner_class', array(), 'default' ) ); ?>">
		<div class="qodef-vertical-sliding-area qodef--static">
			<?php

			// include opener
			dunker_core_get_opener_icon_html(
				array(
					'option_name'  => 'fullscreen_menu',
					'custom_class' => 'qodef-fullscreen-menu-opener qodef-skin--light',
				),
				true
			);

			// include logo
			dunker_core_get_header_logo_image();

			// include widget area one
			dunker_core_get_header_widget_area();
			?>
		</div>
	</div>
</header>
