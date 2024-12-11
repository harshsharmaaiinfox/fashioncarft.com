(function ( $ ) {
	'use strict';

	var shortcode = 'dunker_core_product_brand_list';

	qodefCore.shortcodes[shortcode] = {};

	if ( typeof qodefCore.listShortcodesScripts === 'object' ) {
		$.each(
			qodefCore.listShortcodesScripts,
			function ( key, value ) {
				qodefCore.shortcodes[shortcode][key] = value;
			}
		);
	}

	$( window ).on(
		'load',
		function () {
			qodefWooProductBrandHeight.init();
		}
	);

	var qodefWooProductBrandHeight = {
		init() {
			const $holder 			= $( '.qodef-woo-product-brand-list' );

			if ( $holder.length ) {
				$holder.each(
					( index,element ) => {
						const $thisHolder = $( element );
						let   maxHeight = 0;

						$thisHolder.find( '.qodef-grid-item' ).each(
							( i, e ) => {
								const $thisItem = $( e );

								if ( $thisItem.outerHeight() > maxHeight ) {
									maxHeight = $thisItem.outerHeight();
								}
							}
						);

						$thisHolder.find( '.qodef-grid-item' ).height( maxHeight );
					}
				);
			}
		}
	}

	qodefCore.shortcodes[shortcode].qodefWooProductBrandHeight = qodefWooProductBrandHeight;

})( jQuery );
