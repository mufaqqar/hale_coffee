document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.querySelector('.menu-toggle');
    var nav = document.querySelector('#site-navigation');

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            var expanded = toggle.getAttribute('aria-expanded') === 'true' ? false : true;
            nav.classList.toggle('hidden');
            toggle.setAttribute('aria-expanded', expanded);
            var icon = toggle.querySelector('i');
            if (icon) {
                icon.className = expanded ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
            }
        });
    }

    var submenus = document.querySelectorAll('#site-navigation .menu-item-has-children');
    submenus.forEach(function (item) {
        var link = item.querySelector('a');
        if (!link || window.innerWidth > 767) return;

        link.addEventListener('click', function (e) {
            var sub = item.querySelector('.sub-menu');
            if (!sub) return;
            e.preventDefault();
            sub.classList.toggle('hidden');
        });
    });
});

jQuery(function ($) {

    // Open the first active item on page load
    $('.avail-faq-item.active .avail-faq-content').each(function () {
        $(this).css('max-height', this.scrollHeight + 'px');
    });

    $('.avail-faq-title').on('click', function () {

        const item = $(this).closest('.avail-faq-item');
        const content = item.find('.avail-faq-content');

        if (item.hasClass('active')) {
            item.removeClass('active');
            content.removeClass('open').css('max-height', 0);
            return;
        }

        // Close all
        $('.avail-faq-item').removeClass('active');
        $('.avail-faq-content')
            .removeClass('open')
            .css('max-height', 0);

        // Open clicked
        item.addClass('active');
        content
            .addClass('open')
            .css('max-height', content.prop('scrollHeight') + 'px');

    });

});