(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.dunker_core_image_with_text = {};

	$( document ).ready(
		function () {
			qodefScrollingImageWithText.init();
		}
	);

	var qodefScrollingImageWithText = {
		init: function () {
			var $holder = $( '.qodef-image-with-text.qodef-image-action--scrolling-image' );

			if ( $holder.length ) {
				$holder.each(
					function () {
						var $thisHolder = $( this ),
						$imageHolder    = $thisHolder.find( '.qodef-m-image-inner-holder' ),
						$scrollingImage = $thisHolder.find( '.qodef-m-image img' ),
						$scrollingFrame = $thisHolder.find( '.qodef-m-iwt-frame' ),
						horizontal      = $thisHolder.hasClass( 'qodef-scrolling-direction--horizontal' ),
						state;

						var initAnimation = function () {
							state = qodefScrollingImageWithText.sizing(
								$scrollingImage,
								$scrollingFrame,
								horizontal
							);
							qodefScrollingImageWithText.scrollAnimation(
								$imageHolder,
								$scrollingImage,
								state
							);
						};

						qodef.qodefWaitForImages.check(
							$thisHolder,
							function () {
								initAnimation();
							}
						);

						$( window ).resize(
							function () {
								initAnimation();
							}
						);
					}
				);
			}
		},
		sizing: function ( $scrollingImage, $scrollingFrame, horizontal ) {
			var scrollingFrameHeight = $scrollingFrame.height(),
				scrollingImageHeight = $scrollingImage.height(),
				scrollingFrameWidth  = $scrollingFrame.width(),
				scrollingImageWidth  = $scrollingImage.width(),
				delta,
				timing,
				scrollable           = false;

			if ( horizontal ) {
				delta  = Math.round( scrollingImageWidth - scrollingFrameWidth );
				timing = Math.round( scrollingImageWidth / scrollingFrameWidth ) * 2;
			} else {
				delta  = Math.round( scrollingImageHeight - scrollingFrameHeight );
				timing = Math.round( scrollingImageHeight / scrollingFrameHeight ) * 2;
			}

			if ( horizontal ) {
				if ( scrollingImageWidth > scrollingFrameWidth ) {
					scrollable = true;
				}
			} else {
				if ( scrollingImageHeight > scrollingFrameHeight ) {
					scrollable = true;
				}
			}

			return {
				delta: delta,
				timing: timing,
				scrollable: scrollable,
				horizontal: horizontal
			};
		},
		scrollAnimation: function ( $thisHolder, $scrollingImage, state ) {
			$thisHolder.css( '--qode-transition-duration', state.timing + 's' );
			$thisHolder.css( '--qode-transform-delta', '-' + state.delta + 'px' );
		},
	};

	qodefCore.shortcodes.dunker_core_image_with_text.qodefScrollingImageWithText = qodefScrollingImageWithText;
	qodefCore.shortcodes.dunker_core_image_with_text.qodefMagnificPopup          = qodef.qodefMagnificPopup;

})( jQuery );
