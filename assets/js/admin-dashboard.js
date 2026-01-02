jQuery(function($) {

    // Filter
    $(document).on('click', '.rb-action--btn[data-filter]', function() {
        var filter = $(this).data('filter');

        $('.rb-widget-item').each(function() {
            var $item = $(this);

            if (filter === '*') {
                $item.show();
            } else if ($item.hasClass('rb-widget-' + filter)) {
                $item.show();
            } else {
                $item.hide();
            }
        });
    });

    // Enable
    $(document).on('click', '.rb-action--btn[data-action="enable"]', function() {
        $('.rb-widget-toggle').prop('checked', true).trigger('change');
    });

    // Disable
    $(document).on('click', '.rb-action--btn[data-action="disable"]', function() {
        $('.rb-widget-toggle').prop('checked', false).trigger('change');
    });

});
