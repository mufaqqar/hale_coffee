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
