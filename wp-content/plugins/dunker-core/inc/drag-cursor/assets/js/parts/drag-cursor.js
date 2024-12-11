(function ($) {
	'use strict';

	$(document).ready(
		function () {
			qodefDragCursor.init();
		}
	);

	var qodefDragCursor = {
		init           : function () {
			const $holder = $('.qodef-swiper--show-drag-cursor');

			if ($holder.length) {
				$holder.each(
					function () {
						const $dragCursorTargetArea = $(this).find('.swiper-wrapper');

						qodefDragCursor.handleMouseMove($(this), $dragCursorTargetArea);
					}
				);
			}
		},
		handleMouseMove: function ($holder, $dragCursorTargetArea) {
			const customCursor = qodefGlobal.vars.dragCursor;

			$holder.append('<div class="qodef-m-custom-cursor qodef-m"><div class="qodef-m-custom-cursor-inner">' + customCursor + '</div></div>');
			const $customCursorHolder = $('.qodef-m-custom-cursor');

			$holder.each(
				function () {
					// custom cursor position
					$dragCursorTargetArea.on(
						'mousemove',
						function (event) {
							$customCursorHolder.css(
								{
									top : event.clientY - 60, // half of svg height
									left: event.clientX - 60, // half of svg width
								}
							);
						}
					);

					$dragCursorTargetArea.on(
						'mouseover mouseenter',
						function () {
							if (!$holder.hasClass('qodef-swiper-drag-cursor--active')) {
								$holder.addClass('qodef-swiper-drag-cursor--active');
							}
						}
					).on(
						'mouseleave',
						function () {
							if ($holder.hasClass('qodef-swiper-drag-cursor--active')) {
								$holder.removeClass('qodef-swiper-drag-cursor--active');
							}
						}
					);
				}
			);
		},
	};

	qodefCore.qodefDragCursor = qodefDragCursor;

})(jQuery);
