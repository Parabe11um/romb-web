<section class="rw-home-services">
    <div class="container">
        <div class="rw-section-heading">
            <div>
                <h2 class="rw-eyebrow">Услуги</h2>
                <p class="rw-section-title">Всё, что нужно вашему сайту</p>
            </div>
            <a class="rw-text-link" href="{{ route('services.index') }}">Все услуги <span aria-hidden="true">↗</span></a>
        </div>
        <x-service-grid :services="$services" />
    </div>
</section>
