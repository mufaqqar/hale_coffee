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

/**Faqs JS**/
jQuery(function ($) {

    $('.faq-item.active .faq-content').each(function () {
        $(this).css('max-height', this.scrollHeight + 'px');
    });

    $('.faq-title').click(function () {

        let item = $(this).closest('.faq-item');
        let content = item.find('.faq-content');

        if (item.hasClass('active')) {

            item.removeClass('active');

            content.removeClass('open')
                .css('max-height', 0);

            return;
        }

        $('.faq-item').removeClass('active');

        $('.faq-content')
            .removeClass('open')
            .css('max-height', 0);

        item.addClass('active');

        content.addClass('open')
            .css('max-height', content.prop('scrollHeight') + 'px');

    });

});