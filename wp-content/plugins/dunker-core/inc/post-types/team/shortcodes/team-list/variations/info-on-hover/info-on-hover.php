<?php

if ( ! function_exists( 'dunker_core_add_team_list_variation_info_on_hover' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function dunker_core_add_team_list_variation_info_on_hover( $variations ) {
		$variations['info-on-hover'] = esc_html__( 'Info on Hover', 'dunker-core' );

		return $variations;
	}

	add_filter( 'dunker_core_filter_team_list_layouts', 'dunker_core_add_team_list_variation_info_on_hover' );
}
