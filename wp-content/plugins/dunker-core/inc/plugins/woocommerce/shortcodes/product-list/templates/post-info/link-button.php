<?php

if ( function_exists( 'woocommerce_template_loop_product_link_open' ) && function_exists( 'woocommerce_template_loop_product_link_close' ) ) {
	woocommerce_template_loop_product_link_open();
	esc_html_e( 'Shop Now', 'dunker-core' );
	woocommerce_template_loop_product_link_close();
}
