(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSideAreaCart.init();
		}
	);

	var qodefSideAreaCart = {
		init: function () {
			var $holder = $( '.widget_dunker_core_woo_side_area_cart' );

			if ( $holder.length ) {
				$holder.off().each(
					function () {
						var $thisHolder = $( this );

						if ( qodefCore.windowWidth > 680 ) {
							qodefSideAreaCart.trigger( $thisHolder );
							qodefSideAreaCart.start( $thisHolder );

							qodefCore.body.on(
								'added_to_cart removed_from_cart wc_fragments_refreshed',
								function () {
									qodefSideAreaCart.init();
								}
							);
						}
					}
				);
			}
		},
		trigger: function ( $holder ) {
			var $items = $holder.find( '.qodef-woo-side-area-cart' );
			if ( $items.length && typeof qodefCore.qodefPerfectScrollbar === 'object' ) {
				qodefCore.qodefPerfectScrollbar.init( $items );
			}
		},
		start: function ( $holder ) {
			$holder.on(
				'click',
				'.qodef-m-opener',
				function ( e ) {
					e.preventDefault();

					if ( ! $holder.hasClass( 'qodef--opened' ) ) {
						qodefSideAreaCart.openSideArea( $holder );
						qodefSideAreaCart.trigger( $holder );

						$( document ).keyup(
							function ( e ) {
								if ( e.keyCode === 27 ) {
									qodefSideAreaCart.closeSideArea( $holder );
								}
							}
						);
					} else {
						qodefSideAreaCart.closeSideArea( $holder );
					}
				}
			);

			$holder.on(
				'click',
				'.qodef-m-close',
				function ( e ) {
					e.preventDefault();
					qodefSideAreaCart.closeSideArea( $holder );
				}
			);
		},
		openSideArea: function ( $holder ) {
			qodefCore.qodefScroll.disable();

			$holder.addClass( 'qodef--opened' );
			$( '#qodef-page-header-inner' ).prepend( '<div class="qodef-woo-side-area-cart-cover"/>' );
			setTimeout(
				() => {
					qodefCore.body.addClass( 'qodef-side-cart-opened' );
				},
				50
			);


			$( '.qodef-woo-side-area-cart-cover' ).on(
				'click',
				function ( e ) {
					e.preventDefault();
					qodefSideAreaCart.closeSideArea( $holder );
				}
			);
		},
		closeSideArea: function ( $holder ) {
			if ( $holder.hasClass( 'qodef--opened' ) ) {
				qodefCore.qodefScroll.enable();

				$holder.removeClass( 'qodef--opened' );
				qodefCore.body.removeClass( 'qodef-side-cart-opened' );
				setTimeout(
					() => {
						$( '.qodef-woo-side-area-cart-cover' ).remove();
					},
					600
				);

			}
		}
	};

})( jQuery );
