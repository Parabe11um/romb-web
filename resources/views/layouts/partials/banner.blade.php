<section class="rw-home-hero">
    <div class="container rw-home-hero__layout">
        <div class="rw-home-hero__copy">
            <p class="rw-eyebrow"><span></span> Разработка · Продвижение · Поддержка</p>
            <h1>Более 10 лет<br>создаём и развиваем <span>сайты</span></h1>
            <p class="rw-home-hero__lead">Помогаем сайтам становиться заметными, полезными и востребованными. От первой идеи до ежедневной работы вашего бизнеса.</p>
            <div class="rw-home-hero__actions">
                <a href="{{ route('contacts') }}" class="rw-button">Обсудить проект <span aria-hidden="true">↗</span></a>
                <a href="{{ route('projects.index') }}" class="rw-text-link">Посмотреть работы <span aria-hidden="true">→</span></a>
            </div>
            <div class="rw-home-hero__footnote"><span aria-hidden="true">◇</span> Проектируем. Запускаем. Развиваем.</div>
        </div>
        @include('layouts.partials.hero-visual')
    </div>
</section>
