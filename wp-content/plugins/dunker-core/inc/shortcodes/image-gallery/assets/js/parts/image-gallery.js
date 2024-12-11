(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.dunker_core_image_gallery = {};

	$( document ).ready(
		function () {
			imageNames();
		}
	);

	var imageNames = function(){
		var $holder           = $( '.qodef-image-gallery.qodef-advanced-layout' ),
			$pagination_items = $holder.find( '.swiper-pagination-bullet' ),
			$data             = $holder.data( 'options' );

		if (typeof $data !== 'undefined' && $data !== '') {
			var $image_names = $data.image_names;
			$pagination_items.each(
				function(index, value){
					var $bullet = $( this );

					$bullet.append( '<h6 class="qodef-ig-anchor-navigation-item">' + $image_names[index] ) + '</h6>';
				}
			);
		}
	};

	qodefCore.shortcodes.dunker_core_image_gallery.qodefSwiper        = qodef.qodefSwiper;
	qodefCore.shortcodes.dunker_core_image_gallery.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.dunker_core_image_gallery.qodefMagnificPopup = qodef.qodefMagnificPopup;
	qodefCore.shortcodes.dunker_core_image_gallery.qodefDragCursor    = qodefCore.qodefDragCursor;

})( jQuery );
