(function ($) {
	"use strict";

	$( window ).on(
		'load',
		function () {
			qodefStickyColumn.init( 'init' );
		}
	);

	$( window ).resize(
		function () {
			qodefStickyColumn.init( 'resize' );
		}
	);

	$( document ).on(
		'dunker_trigger_get_new_posts',
		function () {
			qodefStickyColumn.init();
		}
	);

	var qodefStickyColumn = {
		pageOffset: '',
		scrollAmount: '',

		init: function (state) {
			var $holder = $( '.qodef-product-single-fixed-info-layout .qodef-sticky-item, .qodef-sticky-column' ),
				editor  = $holder.hasClass( 'wpb_column' ) ? 'wp_bakery' : 'elementor';

			if ($holder.length) {
				$holder.each(
					function () {
						qodefStickyColumn.calculateVars( $( this ), state, editor );
					}
				);
			}
		},
		calculateVars: function ($column, state, editor) {
			var columnVars = {};

			if ('wp_bakery' === editor) {
				columnVars.$columnInner = $column.find( '.vc_column-inner' );
			} else if ( $column.closest( '.qodef-sticky-wrapper' ).length ) {
				columnVars.$columnInner = $column.closest( '.qodef-sticky-wrapper' );
			} else {
				columnVars.$columnInner = $column.find( '.elementor-column-wrap' );

				if ( ! columnVars.$columnInner.length ) {
					columnVars.$columnInner = $column.find( '.elementor-widget-wrap' );
				}
			}

			// columnVars.$columnInner = $column.closest( '.qodef-sticky-wrapper' );

			if ( state === 'resize' ) {
				columnVars.$columnInner.removeAttr( 'style' );
			}

			columnVars.columnTopEdgePosition  = $column.offset().top;
			columnVars.columnLeftEdgePosition = $column.offset().left;
			columnVars.columnWidth 			  = $column.innerWidth();
			columnVars.columnHeight 		  = columnVars.$columnInner.outerHeight( true );

			if ('wp_bakery' === editor) {
				columnVars.$row = $column.closest( '.vc_row' );
			} else {
				columnVars.$row = $column.closest( '.elementor-section, .qodef-woo-single-inner' );
			}

			// columnVars.$outerItem = $column.closest( '.qodef-sticky-column' );

			columnVars.rowTopEdgePosition    = columnVars.$row.offset().top;
			columnVars.rowHeight 			 = columnVars.$row.outerHeight( true );
			columnVars.rowBottomEdgePosition = columnVars.rowTopEdgePosition + columnVars.rowHeight;
			qodefStickyColumn.scrollAmount   = qodef.scroll;

			qodefStickyColumn.checkPosition( $column, columnVars );

			$( window ).scroll(
				function () {
					var scrollDirection;
					if ('init' === state) {
						scrollDirection = qodefStickyColumn.checkScrollDirection();
					}

					qodefStickyColumn.checkPosition( $column, columnVars, scrollDirection );
				}
			);
		},
		checkPosition: function (column, columnVars, direction) {

			if (qodef.windowWidth > 1024) {
				qodefStickyColumn.calculateOffset();

				if ((qodef.scroll + qodefStickyColumn.pageOffset) <= columnVars.rowTopEdgePosition) {
					qodefStickyColumn.setPosition( columnVars, 'relative' );
				}

				if (((qodef.scroll + qodefStickyColumn.pageOffset) >= columnVars.columnTopEdgePosition) && ((qodef.scroll + qodefStickyColumn.pageOffset + columnVars.columnHeight) < columnVars.rowBottomEdgePosition)) {
					qodefStickyColumn.setPosition( columnVars, 'fixed', direction );
				} else if ((qodef.scroll + qodefStickyColumn.pageOffset + columnVars.columnHeight) >= columnVars.rowBottomEdgePosition) {
					if ( column.parents( '.qodef-custom-scroll-fix' ).length ) {
						qodefStickyColumn.setPosition( columnVars, 'fixed', direction );
					} else {
						qodefStickyColumn.setPosition( columnVars, 'absolute' );
					}
				}
			} else {
				qodefStickyColumn.setPosition( columnVars, 'relative' );
			}
		},
		calculateOffset: function () {
			qodefStickyColumn.pageOffset = 0;

			if ( $( 'body' ).hasClass( 'qodef-product-single-fixed-info-layout' )) {
				qodefStickyColumn.pageOffset += 120;
			}

			if ( $( 'body' ).hasClass( 'admin-bar' )) {
				qodefStickyColumn.pageOffset += 32;
			}

			// if ( $( 'body' ).hasClass( 'qodef-header--sticky-display' ) && $( '.qodef-header-sticky' ).length) {
			// 	qodefStickyColumn.pageOffset += parseInt( $( '.qodef-header-sticky' ).outerHeight( true ) );
			// }

			if ( $( 'body' ).hasClass( 'qodef-header-appearance--fixed' ) ) {
				qodefStickyColumn.pageOffset += parseInt( $( '#qodef-page-header' ).outerHeight( true ) );
				qodefStickyColumn.pageOffset += parseInt( $( '#qodef-page-header' ).css( 'margin-top' ) );
			}
		},
		checkScrollDirection: function () {
			var scrollDirection = (qodef.scroll > qodefStickyColumn.scrollAmount) ? 'down' : 'up';

			qodefStickyColumn.scrollAmount = qodef.scroll;

			return scrollDirection;
		},
		setPosition: function (columnVars, position, direction) {
			if ('relative' === position) {
				columnVars.$columnInner.css(
					{
						'bottom': 'auto',
						'left': 'auto',
						'position': 'relative',
						'top': 'auto',
						'width': columnVars.columnWidth,
						'transform': 'translateY(0)',
					}
				);
			}
			if ('fixed' === position) {
				columnVars.$columnInner.css(
					{
						'bottom': 'auto',
						'left': columnVars.columnLeftEdgePosition,
						'position': 'fixed',
						'top': 0,
						'width': columnVars.columnWidth,
						'transform': 'translateY(' + qodefStickyColumn.pageOffset + 'px)',
					}
				);
			}
			if ('absolute' === position) {
				columnVars.$columnInner.css(
					{
						'bottom': -columnVars.rowHeight,
						'left': '0',
						'position': 'absolute',
						'top': 'auto',
						'width': columnVars.columnWidth,
						'transform': 'translateY(0)',
					}
				);
			}
		}
	};

	window.qodefStickyColumn = qodefStickyColumn;
})( jQuery );
