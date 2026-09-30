@props(['services'])

<div class="rw-service-grid">
    @foreach($services as $service)
        <article class="rw-service-card">
            <div class="rw-service-card__top">
                <span class="rw-service-icon"><x-service-icon :service="$service" /></span>
                <span class="rw-service-card__number" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
            </div>
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->excerpt }}</p>
            <a class="rw-text-link" href="{{ route('services.show', $service) }}">
                Подробнее<span class="sr-only">: {{ $service->title }}</span>
                <span aria-hidden="true">↗</span>
            </a>
        </article>
    @endforeach
</div>
