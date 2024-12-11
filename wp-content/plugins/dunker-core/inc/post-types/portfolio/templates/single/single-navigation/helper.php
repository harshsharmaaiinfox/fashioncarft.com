<?php

if ( ! function_exists( 'dunker_core_include_portfolio_single_post_navigation_template' ) ) {
	/**
	 * Function which includes additional module on single portfolio page
	 */
	function dunker_core_include_portfolio_single_post_navigation_template() {
		dunker_core_template_part( 'post-types/portfolio', 'templates/single/single-navigation/templates/single-navigation' );
	}

	add_action( 'dunker_core_action_after_portfolio_single_item', 'dunker_core_include_portfolio_single_post_navigation_template' );
}
