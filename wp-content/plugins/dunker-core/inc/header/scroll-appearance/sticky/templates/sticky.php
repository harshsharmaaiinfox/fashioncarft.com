<div class="qodef-header-sticky qodef-custom-header-layout <?php echo implode( ' ', apply_filters( 'dunker_core_filter_sticky_header_class', array() ) ); ?>">
	<div class="qodef-header-sticky-inner <?php echo implode( ' ', apply_filters( 'dunker_filter_header_inner_class', array(), 'sticky' ) ); ?>">

		<div class="qodef-header-area-left">
			<?php
			// Include widget area two
			dunker_core_get_header_widget_area( 'two', 'sticky-header-widget-area', 'sticky' );
			// Include logo
			dunker_core_get_header_logo_image( array( 'sticky_logo' => true ) );
			?>
		</div>
		<?php
		// Include main navigation
		dunker_core_template_part( 'header', 'templates/parts/navigation', '', array( 'menu_id' => 'qodef-sticky-navigation-menu' ) );

		// Include widget area one
		dunker_core_get_header_widget_area( 'one', 'sticky-header-widget-area', 'sticky' );

		do_action( 'dunker_core_action_after_sticky_header' );
		?>
	</div>
</div>
