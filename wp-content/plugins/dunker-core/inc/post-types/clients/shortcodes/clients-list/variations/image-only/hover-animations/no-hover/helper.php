<?php

if ( ! function_exists( 'dunker_core_filter_clients_list_image_only_no_hover' ) ) {
    /**
     * Function that add variation layout for this module
     *
     * @param array $variations
     *
     * @return array
     */
    function dunker_core_filter_clients_list_image_only_no_hover( $variations ) {
        $variations['no-hover'] = esc_html__( 'No Hover', 'dunker-core' );

        return $variations;
    }

    add_filter( 'dunker_core_filter_clients_list_image_only_animation_options', 'dunker_core_filter_clients_list_image_only_no_hover' );
}