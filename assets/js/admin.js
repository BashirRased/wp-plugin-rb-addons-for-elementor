(function ($) {
	'use strict';

	$(function () {

		var $root = $('.rbelad-dashboard');
		if ( ! $root.length ) {
			return;
		}

		var $content = $('#rbelad-dashboard-content');

		/* ===============================
		 * Load Dashboard Tab (AJAX)
		 * =============================== */
		function loadTab( tab ) {
			$content.addClass('loading');

			$.post(
				RBELADDashboard.ajaxUrl,
				{
					action : 'rbelad_load_dashboard_tab',
					tab    : tab,
					nonce  : RBELADDashboard.nonce
				}
			)
			.done(function ( res ) {
				if ( res.success && res.data && res.data.content ) {
					$content.html( res.data.content );
				} else {
					$content.html('<p>Error loading content.</p>');
				}
			})
			.always(function () {
				$content.removeClass('loading');

				// Reset sidebar search after AJAX load
				$('#rbelad-sidebar-search').val('');
				$('.rbelad-dash-widget-sidebar-item').show();
			});
		}

		/* ===============================
		 * Set Active Tab from URL Hash
		 * =============================== */
		function setActiveTabFromHash() {
			var hash = window.location.hash.replace('#', '') || RBELADDashboard.defaultTab;

			$('.nav-tab, .wp-submenu a').removeClass('nav-tab-active current');
			$('.nav-tab[data-tab="' + hash + '"]').addClass('nav-tab-active');
			$('.wp-submenu a[href$="#' + hash + '"]').addClass('current');

			loadTab( hash );
		}

		/* ===============================
		 * Nav Tab Click
		 * =============================== */
		$(document).on('click', '.nav-tab', function ( e ) {
			e.preventDefault();
			window.location.hash = $(this).data('tab');
		});

		/* ===============================
		 * Sidebar Widget Search (FIXED)
		 * =============================== */
		$(document).on('input', '#rbelad-sidebar-search', function () {
			var searchTerm = $(this).val().toLowerCase();

			$('.rbelad-dash-widget-sidebar-list')
				.find('.rbelad-dash-widget-sidebar-item')
				.each(function () {
					var text = $(this).text().toLowerCase();

					if ( -1 !== text.indexOf( searchTerm ) ) {
						$(this).show();
					} else {
						$(this).hide();
					}
				});
		});

		/* ===============================
		 * Sidebar Widget Tabs (ADDED)
		 * =============================== */
		$(document).on(
			'click',
			'.rbelad-dash-widget-sidebar-item',
			function ( e ) {
				e.preventDefault();

				var $item        = $(this),
					tabId        = $item.data('tab'),
					$dashboard   = $item.closest('.rbelad-dashboard'),
					$contentWrap = $dashboard.find('.rbelad-dash-widget-main'),
					$targetBox   = $contentWrap.find('#' + tabId);

				// Activate sidebar item
				$item
					.addClass('active')
					.siblings('.rbelad-dash-widget-sidebar-item')
					.removeClass('active');

				// Activate widget content
				$targetBox
					.addClass('active')
					.siblings('.rbelad-widget-box')
					.removeClass('active');
			}
		);

		/* ===============================
		 * Filter & Action Buttons
		 * =============================== */
		$(document).on('click', '.rbelad-action--btn', function ( e ) {
			e.preventDefault();

			var $btn    = $(this),
				filter  = $btn.data('filter'),
				action  = $btn.data('action'),
				$save   = $('#rbelad-save-widgets');

			if ( filter ) {
				$btn.addClass('rbelad-active--btn')
					.siblings('.rbelad-action--btn')
					.removeClass('rbelad-active--btn');

				switch ( filter ) {
					case 'free':
						$('.rbelad-widget-free').show();
						$('.rbelad-widget-pro').hide();
						break;

					case 'pro':
						$('.rbelad-widget-free').hide();
						$('.rbelad-widget-pro').show();
						break;

					default:
						$('.rbelad-widget-free, .rbelad-widget-pro').show();
				}
			}

			if ( 'enable' === action || 'disable' === action ) {
				$('.rbelad-toggle__check')
					.not(':disabled')
					.prop('checked', 'enable' === action);

				$save.prop('disabled', false);
			}

			if ( 'enable_category' === action || 'disable_category' === action ) {
				$btn.closest('.rbelad-widget-free, .rbelad-widget-pro')
					.find('.rbelad-toggle__check')
					.not(':disabled')
					.prop('checked', 'enable_category' === action);

				$save.prop('disabled', false);
			}
		});

		/* ===============================
		 * Toggle Change → Enable Save
		 * =============================== */
		$(document).on('change', '.rbelad-toggle__check', function () {
			$('#rbelad-save-widgets').prop('disabled', false);
		});

		/* ===============================
		 * Save Widgets (AJAX)
		 * =============================== */
		$(document).on('click', '#rbelad-save-widgets', function ( e ) {
			e.preventDefault();

			var $btn    = $(this),
				widgets = [];

			$('.rbelad-toggle__check:checked').each(function () {
				widgets.push( $(this).val() );
			});

			$btn.prop('disabled', true).text('Saving...');

			$.post(
				RBELADDashboard.ajaxUrl,
				{
					action  : 'rbelad_save_widgets',
					nonce   : RBELADDashboard.nonce,
					widgets : widgets
				}
			)
			.done(function ( res ) {
				alert( res.success ? 'Settings saved!' : 'Error saving settings.' );
			})
			.fail(function () {
				alert('AJAX request failed.');
			})
			.always(function () {
				$btn.prop('disabled', false).text('Save Changes');
			});
		});

		/* ===============================
		 * Init
		 * =============================== */
		setActiveTabFromHash();
		$(window).on('hashchange', setActiveTabFromHash);

	});

})(jQuery);
