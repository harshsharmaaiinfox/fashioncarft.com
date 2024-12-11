(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.dunker_core_scrolling_images_showcase = {};

	$( document ).ready(
		function () {
			qodefScrollingImages.init();
		}
	);

	var qodefScrollingImages = {
		init: function () {
			var $holder = $( '.qodef-scrolling-images-showcase' );

			if ( $holder.length ) {
				$holder.each(
					function () {
						qodefScrollingImages.initItem( $( this ) );
					}
				);
			}
		},
		initItem: function ( $thisHolder ) {
			var $scrollingImages     = $thisHolder.find( '.scrolling-images-container' ),
				$scrollingImagesItem = $scrollingImages.find( 'article' ),
				$lastItem            = $scrollingImages.find( 'article:last-of-type' ),
				$scrollingText       = $thisHolder.find( '.scrolling-text' ),
				$panel               = $thisHolder.find( '.qodef-scrolling-images-panel' );

			qodef.qodefWaitForImages.check(
				$thisHolder,
				function () {

					gsap.registerPlugin( ScrollTrigger ); //need to make sure that plugin is registered

					var tl = gsap.timeline();

					tl.addLabel(
						'start',
						0
					);

					$thisHolder.css(
						'--qodef-panel-height',
						Math.round( $lastItem.position().top + $lastItem.outerHeight() * 1.25 ) + 'px'
					);

					$scrollingText.addClass( 'qodef--appeared' );

					$scrollingImagesItem.each( function ( i ) {
						var $item = $( this );
						$item.css(
							'transition-delay',
							i * 150 + 600 + 'ms'
						);

						var yRandomValues = [-14, -9, 274, 83, 125, 222, 89, 246, 68, 118];

						tl.from(
							$item.find( 'img' ),
							{
								ease: 'none',
								y: yRandomValues[i % 10],
								scrollTrigger: {
									trigger: $item,
									start: 'top bottom',
									end: 'bottom top',
									scrub: 2,
									// markers: true,
								}
							},
							'start'
						);
					} );

					$scrollingImagesItem.addClass( 'qodef--appeared' );

					tl.to(
						$panel,
						{
							ease: 'none',
							opacity: 1,
							scrollTrigger: {
								trigger: $panel,
								start: 'top top%',
								end: 'bottom top',
								scrub: 0,
								onEnter: () => {
									$scrollingText.addClass( 'qodef--appeared' );
								},
								onEnterBack: () => {
									$scrollingText.addClass( 'qodef--appeared' );
								},
								onLeave: () => {
									$scrollingText.removeClass( 'qodef--appeared' );
								},
								// markers: true,
							}
						},
						'start'
					);
				}
			);
		}
	};

	qodefCore.shortcodes.dunker_core_scrolling_images_showcase.qodefScrollingImages = qodefScrollingImages;

})( jQuery );