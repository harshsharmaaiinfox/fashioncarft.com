<?php

if ( ! function_exists( 'dunker_core_drag_cursor_icon' ) ) {
	/**
	 * Function that add drag cursor icon into global js object
	 *
	 * @param $array
	 *
	 * @return mixed
	 */
	function dunker_core_drag_cursor_icon( $array ) {
		$array['dragCursor'] = dunker_core_get_svg_icon( 'drag-cursor' );

		return $array;
	}

	add_filter( 'dunker_filter_localize_main_js', 'dunker_core_drag_cursor_icon' );
}
