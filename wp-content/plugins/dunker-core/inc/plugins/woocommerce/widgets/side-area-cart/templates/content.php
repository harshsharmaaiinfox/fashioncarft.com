<?php if ( is_object( WC()->cart ) ) { ?>
	<div class="qodef-widget-side-area-cart-content">
		<span class="qodef-widget-side-area-cart-title"><?php echo esc_html__('Your Cart', 'dunker-core'); ?></span>
		<?php
		// Hook to include additional content before cart items
		do_action( 'dunker_core_action_woocommerce_before_side_area_cart_content' );

		if ( ! WC()->cart->is_empty() ) {
			dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/loop' );

			dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/order-details' );

			dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/button' );
		} else {
			// Include posts not found
			dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/posts-not-found' );
		}

		dunker_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/close' );
		?>
	</div>
<?php } ?>
