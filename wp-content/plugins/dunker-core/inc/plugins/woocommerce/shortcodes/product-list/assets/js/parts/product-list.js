(function ( $ ) {
	'use strict';

	var shortcode = 'dunker_core_product_list';

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
			qodefProductFilterContent.init();
			qodefProductFilter.init();
		}
	);

	var qodefProductFilterContent = {
		holderHeight: 0,

		init: function () {
			var $productList = $( '.qodef-woo-product-list' );

			if ($productList.length) {
				$productList.each(
					function( ) {
						var $thisList  = $( this ),
						$filterContent = $thisList.find( '.qodef-product-list-filter-horizontal, .qodef-product-list-filter-vertical' ),
						$filterTitle   = $thisList.find( '.qodef-product-list-filter-vertical .qodef-e-expandable' ),
						$filterOpener  = $thisList.find( '.qodef-filter-opener' ),
						$filterCloser  = $thisList.find( '.qodef-filter-close' ),
						$mobileOpener  = $thisList.find( '.qodef-m-categories-mobile-opener' ),
						$orderbyOpener = $thisList.find( '.qodef-m-orderby-opener' );

						qodefProductFilterContent.startingStyle( $thisList, $filterContent );

						$( window ).on(
							'resize',
							function () {
								qodefProductFilterContent.startingStyle( $thisList, $filterContent );
							}
						);

						if ( $filterOpener.length ) {
							$filterOpener.on( 'click', null, {list: $thisList, filterContent: $filterContent}, qodefProductFilterContent.toggleFilterContentClass );
							$filterCloser.on( 'click', null, {list: $thisList, filterContent: $filterContent}, qodefProductFilterContent.toggleFilterContentClass );
						}

						if ( $filterTitle.length ) {
							$filterTitle.on(
								'click',
								function ( e ) {
									e.preventDefault();
									var $target = e.target;
									qodefProductFilterContent.toggleFilterContent( $target );
								}
							);
						}

						if ( $mobileOpener.length ) {
							$mobileOpener.on(
								'tap click',
								function ( e ) {
									e.preventDefault();
									qodefProductFilterContent.toggleOpener( $mobileOpener, $orderbyOpener );
								}
							);
						}

						if ( $orderbyOpener.length ) {
							$orderbyOpener.on(
								'tap click',
								function ( e ) {
									e.preventDefault();
									qodefProductFilterContent.toggleOpener( $orderbyOpener, $mobileOpener );
								}
							);
						}
					}
				);
			}
		},
		startingStyle: function ( $list, $filterContent ) {
			var $pageWidth    = qodef.body.width(),
				$gridWidth    = $list.width(),
				$positionLeft = (($pageWidth - $gridWidth ) / 2);

			if ( $list.hasClass( 'qodef-filter-type--top' ) ) {
				$filterContent.css( 'left', '-' + $positionLeft + 'px' );
				$filterContent.css( 'width', $pageWidth );
			}
		},
		toggleFilterContent: function ( target ) {
			var $target  = $( target ),
				$wrapper = $target.siblings( '.qodef-e-options-wrapper' );

			if ( $target.hasClass( 'qodef--active' ) ) {
				$target.removeClass( 'qodef--active' );
				$wrapper.removeClass( 'qodef--active' );
			} else {
				$target.addClass( 'qodef--active' );
				$wrapper.addClass( 'qodef--active' );
			}
		},
		toggleOpener: function ( $target, $secondTarget ) {
			var $wrapper = $target.siblings( '.qodef-filter-links' );

			if ( $target.hasClass( 'qodef--opened' ) ) {
				$target.removeClass( 'qodef--opened' );
				$wrapper.removeClass( 'qodef--opened' );
			} else {
				$target.addClass( 'qodef--opened' );
				$wrapper.addClass( 'qodef--opened' );
			}

			if ( $secondTarget.length ) {
				$wrapper = $secondTarget.siblings( '.qodef-filter-links' );

				if ( $secondTarget.hasClass( 'qodef--opened' ) ) {
					$secondTarget.removeClass( 'qodef--opened' );
					$wrapper.removeClass( 'qodef--opened' );
				}
			}
		},
		toggleFilterContentClass: function ( event ) {
			event.preventDefault();
			var $filterContent     = event.data.filterContent,
				$list              = event.data.list,
				$orderingFilter    = $list.find( '.qodef-product-list-filter-holder .qodef-filter-right' ),
				$filterOpenerArrow = $list.find( '.qodef-svg--filter-opener' ),
				$closer            = $list.find( '.qodef-filter-close' );

			if ($list.hasClass( 'qodef-filter-type--top' )) {
				if ( $filterContent.hasClass( 'qodef--active' ) ) {
					$filterContent.removeClass( 'qodef--active' );
					$closer.removeClass( 'qodef--active' );
					$filterOpenerArrow.removeClass( 'qodef--active' );
					$orderingFilter.addClass( 'qodef--active' );
				} else {
					$filterContent.addClass( 'qodef--active' );
					$closer.addClass( 'qodef--active' );
					$filterOpenerArrow.addClass( 'qodef--active' );
					$orderingFilter.removeClass( 'qodef--active' );
				}
			}
		}
	};

	var qodefProductFilter = {
		list: {},
		fields: {},
		init: function () {
			var $productList = $( '.qodef-woo-shortcode.qodef-woo-product-list' );

			if ($productList.length) {
				$productList.each(
					function( ) {
						var $thisList  = $( this ),
						$activeFilters = $thisList.find( '.qodef-active-filters' ),
						$priceFilter   = $thisList.find( '.qodef-price-slider' );

						qodefProductFilter.list = $thisList;
						qodefProductFilter.initSearchParams( $thisList, $activeFilters );
						qodefProductFilter.setupPriceFilter( $thisList, $priceFilter );
					}
				);
			}
		},
		initSearchParams: function ( $productList, $activeFilters ) {
			var $fields            = [],
				$checkbox          = $productList.find( '.qodef-e-checkbox' ),
				$priceFilter       = $productList.find( '.qodef-e-price-filter' ),
				$priceFilterButton = $priceFilter.find( '.qodef-button' ),
				activeIds          = [];

			$fields.$orderbyFields         = $productList.find( '.qodef-m-orderby-item' );
			$fields.orderbyFieldsExists    = $fields.$orderbyFields.length;
			$fields.$checkboxFields        = $productList.find( '.qodef-e-checkbox input' );
			$fields.checkboxFieldsExists   = $fields.$checkboxFields.length;
			$fields.$linkFields            = $productList.find( '.qodef-m-filter-link' );
			$fields.linkFieldsExists       = $fields.$linkFields.length;
			$fields.priceRangeFields       = $productList.find( '#min_price, #max_price' );
			$fields.priceRangeFieldsExists = $fields.priceRangeFields.length;

			qodefProductFilter.fields = $fields;

			$checkbox.on(
				'change',
				{productList: $productList, fields: $fields},
				function ( e ) {
					qodefProductFilter.setActiveFilters( e, activeIds );
					qodefProductFilter.initFilter( $productList, $fields );

					var $item = $( this );

					if ($item.hasClass( 'qodef--active' )) {
						$item.removeClass( 'qodef--active' );
					} else {
						$item.addClass( 'qodef--active' );
					}
				}
			);
			$activeFilters.on(
				'click',
				function ( e ) {
					qodefProductFilter.removeActiveFilters( e, $productList );
					activeIds = [];
				}
			);
			$fields.$linkFields.on(
				'click',
				function ( e ) {
					e.preventDefault();
					var $item = $( e.target ).closest( '.qodef-m-filter-item-holder' ),
					$links    = $item.closest( '.qodef-filter-links' ),
					$opener   = $links.siblings( '.qodef-m-categories-mobile-opener' ),
					$siblings = $item.siblings(),
					$all      = $item.siblings( '.qodef-m-filter-all' );
					$siblings.removeClass( 'qodef--active' );
					$opener.removeClass( 'qodef--opened' );
					$links.removeClass( 'qodef--opened' );
					if ($item.hasClass( 'qodef--active' )) {
						$item.removeClass( 'qodef--active' );
						if ( $all.length) {
							$all.addClass( 'qodef--active' );
						}
					} else {
						$item.addClass( 'qodef--active' );
					}
					qodefProductFilter.initFilter( $productList, $fields );
				}
			);
			$fields.$orderbyFields.on(
				'click',
				function ( e ) {
					e.preventDefault();
					var $item    = $( e.target ).closest( '.qodef-m-orderby-item' ),
						itemText = $item.find( '.qodef-m-orderby' ).text(),
					$list        = $item.closest( '.qodef-m-orderby-list' ),
					$opener      = $list.siblings( '.qodef-m-orderby-opener' ),
					$openerText  = $opener.find( '.qodef-m-text' ),
					$siblings    = $item.siblings();
					$siblings.removeClass( 'qodef--active' );
					$opener.removeClass( 'qodef--opened' );
					$list.removeClass( 'qodef--opened' );
					$item.addClass( 'qodef--active' );
					$openerText.text( itemText );
					qodefProductFilter.initFilter( $productList, $fields );
				}
			);
			if ( $priceFilterButton.length ) {
				$priceFilter.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefProductFilter.initFilter( $productList, $fields );
					}
				);
			} else if ($priceFilter.length) {
				$( document.body ).on(
					'price_slider_change',
					function () {
						qodefProductFilter.initFilter( $productList, $fields );
					}
				);
			}
		},
		initFilter: function ( $list, $items ) {
			var $productList = $list,
				options      = $productList.data( 'options' ),
				$fields      = $items,
				newOptions   = {};

			if ( 'tax' === options['additional_params'] ) {
				var taxonomyKey         = options['tax'];
				newOptions[taxonomyKey] = [];

				if ( options['tax__in'] ) {
					var taxIDs = options['tax__in'];
					if ( taxIDs.indexOf( ',' ) !== -1 ) {
						taxIDs = taxIDs.replaceAll( " ", "" );
						taxIDs = taxIDs.split( ',' );
					}
					newOptions[taxonomyKey] = taxIDs;
				} else if ( options['tax_slug'] ) {
					newOptions[taxonomyKey] = options['tax_slug'];
				}
			}

			if ($fields.orderbyFieldsExists) {
				$fields.$orderbyFields.each(
					function () {
						var orderKey = 'order_by',
							$this    = $( this ),
							$link    = $this.find( '.qodef-m-orderby' ),
							value    = $link.data( 'orderby' );

						if ( $this.hasClass( 'qodef--active' ) ) {
							if ( typeof value !== "undefined" && value !== "") {
								newOptions[orderKey] = value;
							} else {
								newOptions[orderKey] = '';
							}
						}
					}
				);
			}

			if ($fields.checkboxFieldsExists) {
				var $checked = $productList.find( '.qodef-e-checkbox input:checked' );

				newOptions['product_brand']  = [];
				newOptions['product_cat']    = [];
				newOptions.productAttributes = {};

				$checked.each(
					function () {
						var item     = $( this );
						var fieldKey = '',
							value    = item.data( 'id' );
						switch ( item.attr( 'name' ) ) {
							case 'qodef-product-brand':
								fieldKey = 'product_brand';
								if (typeof value !== "undefined" && value !== "") {
									newOptions[fieldKey].push( item.data( 'id' ) );
								} else {
									newOptions[fieldKey] = '';
								}
								break;
							case 'qodef-product-attribute':
								var attrName = item.data( 'type' ),
									attrTerm = item.data( 'id' );
								if ( ! newOptions.productAttributes[attrName] ) {
									newOptions.productAttributes[attrName] = [];
								}
								if (typeof attrTerm !== "undefined" && attrTerm !== "") {
									newOptions.productAttributes[attrName].push( attrTerm );
								}
								break;
							case 'qodef-product-category':
								fieldKey = 'product_cat';
								if (typeof value !== "undefined" && value !== "") {
									newOptions[fieldKey].push( item.data( 'id' ) );
								} else {
									newOptions[fieldKey] = '';
								}
								break;
						}
					}
				);

				if ( 'product_cat' === options['tax'] && newOptions['product_cat'].length < 1 ) {
					newOptions['product_cat'].push( options['tax_slug'] );
				}

				newOptions['product_brand'] = newOptions['product_brand'].join( ',' );
				newOptions['product_cat']   = newOptions['product_cat'].join( ',' );
			}

			if ($fields.priceRangeFieldsExists) {
				var priceMin = $productList.find( '.qodef-price-slider-amount #min_price' ).attr( 'value' ),
					priceMax = $productList.find( '.qodef-price-slider-amount #max_price' ).attr( 'value' ),
					priceKey = 'price';

				newOptions['price'] = [];

				if (typeof priceMin !== "undefined" && priceMin !== "") {
					newOptions[priceKey].push( priceMin );
				} else {
					newOptions[priceKey] = '';
				}

				if (typeof priceMax !== "undefined" && priceMax !== "") {
					newOptions[priceKey].push( priceMax );
				} else {
					newOptions[priceKey] = '';
				}
			}

			if ($fields.linkFieldsExists) {
				$fields.$linkFields.each(
					function () {
						if ( $( this ).closest( '	.qodef-m-filter-item-holder' ).hasClass( 'qodef--active' ) ) {
							var item         = $( this );
							var taxonomyKey  = item.data( 'taxonomy' ),
								taxonomyTerm = item.data( 'filter' );

							if (typeof taxonomyTerm !== "undefined" && taxonomyTerm !== "" && taxonomyTerm !== "*") {
								newOptions[taxonomyKey] = taxonomyTerm;
							} else {
								newOptions[taxonomyKey] = '';
							}
						}
					}
				);
			}

			var additional = qodefProductFilter.createAdditionalQuery( newOptions );

			$.each(
				additional,
				function (key, value) {
					options[key] = value;
				}
			);

			$productList.data( 'options', options );
			qodef.body.trigger( 'dunker_trigger_load_more', [$productList, 1] );
		},
		createAdditionalQuery: function( newOptions ){
			var addQuery = {},
				taxonomy = {};

			addQuery.additional_query_args            = {};
			addQuery.additional_query_args.tax_query  = [];
			addQuery.additional_query_args.meta_query = {};

			if (typeof newOptions === 'object') {
				$.each(
					newOptions,
					function ( key, value ) {

						switch (key) {
							case 'order_by':
								addQuery.orderby = newOptions.order_by;
								break;
							case 'price':
								if (value !== '') {
									addQuery.additional_query_args.meta_query['value']         = {};
									addQuery.additional_query_args.meta_query['value'].key     = '_price';
									addQuery.additional_query_args.meta_query['value'].value   = [parseInt( value[0] ), parseInt( value[1] )];
									addQuery.additional_query_args.meta_query['value'].compare = 'BETWEEN';
									addQuery.additional_query_args.meta_query['value'].type    = 'NUMERIC';
								}
								break;
							case 'productAttributes':
								if (Object.entries( value ).length) {
									$.each(
										value,
										function ( taxonomyName, termsArray ) {
											var taxonomy = {
												taxonomy : 'pa_' + taxonomyName,
												field : typeof value === 'number' ? 'term_id' : 'slug',
												terms : termsArray,
												operator : 'IN',
											};
											addQuery.additional_query_args.tax_query.push( taxonomy );
										}
									);
								}
								break;
							default:
								if ( value !== '' || value.length ) {
									var isIDs = Array.isArray( value );
									if ( value.indexOf( ',' ) !== -1 ) {
										value = value.replaceAll( " ", "" );
										value = value.split( ',' );
									}

									taxonomy = {
										taxonomy : key,
										field : isIDs ? 'term_id' : 'slug',
										terms : value,
										operator : 'IN',
										include_children: true,
									};
									addQuery.additional_query_args.tax_query.push( taxonomy );
								}
						}
					}
				);

				if ( Object.entries( addQuery.additional_query_args.tax_query ).length > 1 ) {
					addQuery.additional_query_args.tax_query['relation'] = 'AND';
				}

				if ( Object.entries( addQuery.additional_query_args.meta_query ).length > 1 ) {
					addQuery.additional_query_args.meta_query['relation'] = 'OR';
				}
			}

			if ( $.isEmptyObject( addQuery.additional_query_args.tax_query ) ) {
				delete addQuery.additional_query_args.tax_query;
			}

			return addQuery;
		},
		setActiveFilters: function ( event, $activeIds ) {
			var $activeFilters = event.data.productList.find( '.qodef-active-filters' ),
				$clearButton   = $activeFilters.find( '.qodef--clear' ),
				$item          = event.target;

			if ( $activeIds.includes( $item.id ) ) {
				$activeFilters.find( '#' + $item.id + '-active' ).remove();
				$activeIds.splice( $.inArray( $item.id, $activeIds ), 1 );
			} else {
				qodefProductFilter.renderActive( $activeFilters, $item.id, $item.title );
				$activeIds.push( $item.id );
			}

			if ( ! $activeIds.length) {
				$clearButton.removeClass( 'qodef--active' );
			} else {
				$clearButton.addClass( 'qodef--active' );
			}
		},
		renderActive: function ( $holder, $activeId, $activeTitle ) {
			$holder.prepend(
				'<div class="qodef-active-filter-item" id="' + $activeId + '-active">' + $activeTitle + '' + '</div>'
			);
		},
		removeActiveFilters: function ( event, $list ) {
			if ( event.target.matches( '.qodef--clear' ) || event.target.matches( '.qodef-m-text' ) ) {
				event.preventDefault();
				//remove all items
				var	$checkboxes = $list.find( '.qodef-e-checkbox' ),
					$items      = $list.find( '.qodef-e-checkbox input:checked' ),
					$active     = $list.find( '.qodef-active-filter-item' ),
					$clearBtn   = $list.find( '.qodef-button.qodef--clear' ),
					$slider     = $list.find( '.qodef-price-slider' ),
					min_price   = $list.find( '.qodef-price-slider-amount #min_price' ).data( 'min' ),
					max_price   = $list.find( '.qodef-price-slider-amount #max_price' ).data( 'max' );

				$items.each(
					function (i, e) {
						$( e ).prop( "checked", false );
					}
				);

				$active.each(
					function (i, e) {
						e.remove();
					}
				);

				$slider.slider( 'values', [ min_price, max_price ] );
				$list.find( '.qodef-price-slider .qodef--min' ).text( min_price );
				$list.find( '.qodef-price-slider .qodef--max' ).text( max_price );

				$checkboxes.removeClass( 'qodef--active' );

				$clearBtn.removeClass( 'qodef--active' );

				qodefProductFilter.initFilter( $list, qodefProductFilter.fields );
			}
		},
		setupPriceFilter: function ( $list, $slider ) {
			$slider.find( '.qodef-price-slider-amount #min_price, .qodef-price-slider-amount #max_price' ).hide();

			var min_price         = $list.find( '.qodef-price-slider-amount #min_price' ).data( 'min' ),
				max_price         = $list.find( '.qodef-price-slider-amount #max_price' ).data( 'max' ),
				step              = $( '.qodef-price-slider-amount' ).data( 'step' ) || 1,
				current_min_price = $list.find( '.qodef-price-slider-amount #min_price' ).val(),
				current_max_price = $list.find( '.qodef-price-slider-amount #max_price' ).val(),
				$clearButton      = $list.find( '.qodef-active-filters .qodef--clear' );

			$slider.slider(
				{
					range: true,
					animate: true,
					min: min_price,
					max: max_price,
					step: step,
					values: [ current_min_price, current_max_price ],
					create: function() {
						$( '.qodef-price-slider-amount #min_price' ).val( current_min_price );
						$( '.qodef-price-slider-amount #max_price' ).val( current_max_price );
						$( document.body ).trigger( 'price_slider_create', [ current_min_price, current_max_price ] );
					},
					slide: function( event, ui ) {
						$( 'input#min_price' ).attr( 'value', ui.values[0] );
						$( 'input#max_price' ).attr( 'value', ui.values[1] );

						$list.find( '.qodef-price-slider .qodef--min' ).text( ui.values[0] );
						$list.find( '.qodef-price-slider .qodef--max' ).text( ui.values[1] );
					},
					change: function( event, ui ) {
						$clearButton.addClass( 'qodef--active' );
						$( document.body ).trigger( 'price_slider_change', [ ui.values[0], ui.values[1] ] );
					}
				}
			);
		}
	};

	qodefCore.shortcodes.dunker_core_product_list.qodefProductFilterContent = qodefProductFilterContent;
	qodefCore.shortcodes.dunker_core_product_list.qodefProductFilter        = qodefProductFilter;

})( jQuery );
