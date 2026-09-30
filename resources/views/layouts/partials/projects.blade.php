<section class="rw-home-projects">
    <div class="container">
        <div class="rw-section-heading">
            <div>
                <h2 class="rw-eyebrow">Проекты</h2>
                <p class="rw-section-title">Реализованные работы</p>
            </div>
            <a class="rw-text-link" href="{{ route('projects.index') }}">Все проекты <span aria-hidden="true">↗</span></a>
        </div>

        <div class="rw-project-grid">
            @forelse($projects as $i => $project)
                <article class="rw-project-card" data-reveal data-delay="{{ $i * 90 }}">
                    @if($project->preview_image)
                        <figure class="rw-project-card__image">
                            <a href="{{ route('projects.show', $project->slug) }}"
                               class="block relative w-full aspect-[4/3]">
                                <img
                                    src="{{ asset('storage/' . $project->preview_image) }}"
                                    alt="{{ $project->title }}"
                                    class="absolute inset-0 w-full h-full object-cover"
                                >
                            </a>
                        </figure>
                    @endif

                    <div class="rw-project-card__body">
                        <h3><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h3>
                        @if($project->excerpt)
                            <p>{{ $project->excerpt }}</p>
                        @endif
                        <a class="rw-text-link" href="{{ route('projects.show', $project->slug) }}">
                            Подробнее<span class="sr-only">: {{ $project->title }}</span><span aria-hidden="true">↗</span>
                        </a>
                    </div>
                </article>
            @empty
                <p class="rw-projects-empty">Проекты пока не добавлены</p>
            @endforelse
        </div>
    </div>
</section>
