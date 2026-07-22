document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('#site-navigation');
    if (toggle && nav) {
        toggle.addEventListener('click', function() {
            nav.classList.toggle('hidden');
        });
    }
});
