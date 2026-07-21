(() => {
    'use strict';

    const navToggle = document.querySelector('.nav-toggle');
    const navigation = document.querySelector('.main-nav');

    if (navToggle && navigation) {
        navToggle.addEventListener('click', () => {
            const expanded = navToggle.getAttribute('aria-expanded') === 'true';
            navToggle.setAttribute('aria-expanded', String(!expanded));
            navigation.classList.toggle('is-open', !expanded);
            const label = navToggle.querySelector('.visually-hidden');
            if (label) label.textContent = expanded ? 'Navigation öffnen' : 'Navigation schließen';
        });
    }

    document.querySelectorAll('.submenu-toggle').forEach((button) => {
        button.addEventListener('click', () => {
            const expanded = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', String(!expanded));
            const submenu = button.nextElementSibling;
            if (submenu) submenu.classList.toggle('is-open', !expanded);
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;
        if (navToggle && navigation) {
            navToggle.setAttribute('aria-expanded', 'false');
            navigation.classList.remove('is-open');
        }
        document.querySelectorAll('.submenu-toggle').forEach((button) => button.setAttribute('aria-expanded', 'false'));
        document.querySelectorAll('.submenu').forEach((submenu) => submenu.classList.remove('is-open'));
    });
})();

