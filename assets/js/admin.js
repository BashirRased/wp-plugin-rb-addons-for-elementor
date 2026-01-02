(function ($) {
	'use strict';

	$(function () {

		var $root = $('.rbelad-dashboard');
		if (!$root.length) {
			console.error('RB dashboard root .rbelad-dashboard not found.');
			return;
		}

		var $saveButton = $root
			.find('form')
			.find('input[type="submit"], button[type="submit"]');

		/**
		 * Action buttons handler
		 */
		$(document).on('click', '.rbelad-action--btn', function (e) {
			e.preventDefault();

			var $btn    = $(this),
				filter  = $btn.data('filter'),
				action  = $btn.data('action');

			/**
			 * FILTER BUTTONS (All / Free / Pro)
			 * Only filter buttons get active state
			 */
			if (filter) {
				$btn
					.addClass('rbelad-active--btn')
					.siblings('.rbelad-action--btn')
					.removeClass('rbelad-active--btn');

				switch (filter) {
					case 'free':
						$('.rbelad-widget-free').show();
						$('.rbelad-widget-pro').hide();
						break;

					case 'pro':
						$('.rbelad-widget-free').hide();
						$('.rbelad-widget-pro').show();
						break;

					case '*':
					default:
						$('.rbelad-widget-free, .rbelad-widget-pro').show();
						break;
				}
			}

			/**
			 * GLOBAL ENABLE / DISABLE
			 */
			if (action === 'enable' || action === 'disable') {
				var $toggles = $('.rbelad-dashboard-widgets__item')
					.find('input[type="checkbox"].rbelad-toggle__check');

				$toggles
					.not(':disabled')
					.prop('checked', action === 'enable');

				$saveButton.prop('disabled', false);
			}

			/**
			 * CATEGORY ENABLE / DISABLE
			 */
			if (action === 'enable_category' || action === 'disable_category') {

				var $category = $btn.closest('.rbelad-widget-free, .rbelad-widget-pro');

				if ($category.length) {
					var $categoryToggles = $category
						.find('input[type="checkbox"].rbelad-toggle__check');

					$categoryToggles
						.not(':disabled')
						.prop('checked', action === 'enable_category');

					$saveButton.prop('disabled', false);
				}
			}
		});

		/**
		 * Enable Save button on individual toggle change
		 */
		$(document).on(
			'change',
			'.rbelad-dashboard-widgets__item input[type="checkbox"].rbelad-toggle__check',
			function () {
				$saveButton.prop('disabled', false);
			}
		);

	});

})(jQuery);
