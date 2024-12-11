(function ( $ ) {
	'use strict';

	$( window ).on(
		'load',
		function () {
			qodefUncoveringSection.init();
		}
	);

	$( window ).resize(
		function () {
			qodefUncoveringSection.init();
		}
	);

	var qodefUncoveringSection = {
		init: function () {
			var $uncoveringSection = $( '.qodef-uncovering-section' );

			if ( $uncoveringSection.length ) {
				var $sectionHolder = $uncoveringSection.find( '.qodef-page-content-section > .elementor' ),
					$lastSection   = $( '.qodef-page-content-section > .elementor > .elementor-section:last-child' );

				if ( $sectionHolder.length && $lastSection.length ) {
					var lastSectionHeight = $lastSection.outerHeight();

					$sectionHolder.css( { 'margin-bottom': lastSectionHeight + 'px' } );
				}
			}
		},
	};

	qodefCore.qodefUncoveringSection = qodefUncoveringSection;

})( jQuery );
