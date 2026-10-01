const root = document.documentElement;
const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
const revealItems = [...document.querySelectorAll('[data-reveal]')];
let observer;

if (!motion.matches && 'IntersectionObserver' in window) {
    observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.remove('reveal-pending');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.08 });
    revealItems.forEach((item) => {
        item.classList.add('reveal-pending');
        observer.observe(item);
    });
}

motion.addEventListener('change', () => {
    if (!motion.matches) return;
    observer?.disconnect();
    revealItems.forEach((item) => item.classList.remove('reveal-pending'));
});

const menu = document.querySelector('.personal-menu');
const nav = document.querySelector('#personal-nav');
if (menu && nav) {
    root.classList.add('personal-has-js');
    const closeMenu = () => {
        nav.classList.remove('is-open');
        menu.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-label', 'Открыть меню');
    };
    menu.addEventListener('click', () => {
        const open = nav.classList.toggle('is-open');
        menu.setAttribute('aria-expanded', String(open));
        menu.setAttribute('aria-label', open ? 'Закрыть меню' : 'Открыть меню');
    });
    nav.addEventListener('click', (event) => {
        if (event.target.closest('a')) closeMenu();
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && nav.classList.contains('is-open')) {
            closeMenu();
            menu.focus();
        }
    });
    document.addEventListener('click', (event) => {
        if (!nav.contains(event.target) && !menu.contains(event.target)) closeMenu();
    });
    window.matchMedia('(min-width: 768px)').addEventListener('change', closeMenu);
}
