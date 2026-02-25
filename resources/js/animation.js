function initReveal() {
    const items = document.querySelectorAll('[data-reveal]');

    if (!('IntersectionObserver' in window) || items.length === 0) {
        items.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const io = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                const el = entry.target;

                const delay = el.getAttribute('data-delay');
                if (delay) el.style.transitionDelay = `${delay}ms`;

                el.classList.add('is-visible');
                observer.unobserve(el);
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -10% 0px' }
    );

    items.forEach((el) => io.observe(el));
}

document.addEventListener('DOMContentLoaded', initReveal);

// Если есть turbo/livewire — можно ещё раз инициировать после навигации
document.addEventListener('livewire:navigated', initReveal);
