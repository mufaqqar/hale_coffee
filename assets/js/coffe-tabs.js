jQuery(function ($) {

    $('.tab-btn').on('click', function () {

        let tab = $(this).data('tab');

        $('.tab-btn')
            .removeClass('active');

        $(this)
            .addClass('active');

        $('.tab-content')
            .addClass('hidden');

        $('#' + tab)
            .removeClass('hidden');

    });

});