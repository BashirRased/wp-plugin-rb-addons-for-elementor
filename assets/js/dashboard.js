jQuery(function ($) {

	// Enable all
	$(document).on('click', '.rbelad-enable-all', function () {
		$(this).closest('.rbelad-widget-category')
			.find('input[type="checkbox"]')
			.prop('checked', true);
	});

	// Disable all
	$(document).on('click', '.rbelad-disable-all', function () {
		$(this).closest('.rbelad-widget-category')
			.find('input[type="checkbox"]')
			.prop('checked', false);
	});

	// Save
	$('#rbelad-dashboard-form').on('submit', function (e) {
		e.preventDefault();

		$.post(RBELAD.ajax_url, {
			action: 'rbelad_save_dashboard',
			nonce: RBELAD.nonce,
			data: $(this).serialize()
		}, function (res) {
			if (res.success) {
				alert('Saved!');
			}
		});
	});

});