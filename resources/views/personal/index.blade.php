<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f7fafc">
    <title>{{ $page->meta_title ?: $page->name.' — '.$page->headline }}</title>
    <meta name="description" content="{{ $page->meta_description ?: $page->hero_description }}">
    <link rel="canonical" href="{{ 'https://'.config('personal.domain').'/' }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:title" content="{{ $page->meta_title ?: $page->name }}">
    <meta property="og:description" content="{{ $page->meta_description ?: $page->hero_description }}">
    <meta property="og:url" content="{{ 'https://'.config('personal.domain').'/' }}">
    <meta property="og:image" content="{{ $page->photoUrl() }}">
    @vite(['resources/css/personal.css', 'resources/js/personal.js'])
</head>
<body>
    <a class="skip-link" href="#main">Перейти к содержимому</a>
    <header class="personal-header">
        <div class="personal-container personal-header__inner">
            <a class="personal-brand" href="#top"><span class="personal-brand__mark" aria-hidden="true">/</span>{{ $page->name }}</a>
            <button class="personal-menu" type="button" aria-label="Открыть меню" aria-expanded="false" aria-controls="personal-nav"><span></span><span></span></button>
            <nav id="personal-nav" aria-label="Основная навигация">
                <a href="#about">Обо мне</a>
                @if (count($experience))<a href="#experience">Опыт</a>@endif
                @if (count($projects))<a href="#projects">Проекты</a>@endif
                <a class="rw-button rw-button--compact" href="#contact">Связаться <span aria-hidden="true">↗</span></a>
            </nav>
        </div>
    </header>
    <main id="main">
        <section class="personal-hero" id="top" aria-labelledby="hero-title">
            <div class="personal-container personal-hero__grid">
                <div class="personal-hero__copy" data-reveal>
                    @if ($page->hero_label)<p class="personal-eyebrow"><span aria-hidden="true"></span>{{ $page->hero_label }}</p>@endif
                    <h1 id="hero-title">{{ $page->name }}</h1>
                    <p class="personal-hero__headline">{{ $page->headline }}</p>
                    <p class="personal-lead">{{ $page->hero_description }}</p>
                    <div class="personal-actions">
                        <a class="rw-button" href="#contact">Обсудить задачу <span aria-hidden="true">↗</span></a>
                        @if (count($projects))<a class="personal-link" href="#projects">Мои проекты <span aria-hidden="true">↓</span></a>@endif
                    </div>
                </div>
                <div class="personal-portrait" data-reveal>
                    <div class="personal-portrait__orbit" aria-hidden="true"></div>
                    <div class="personal-portrait__frame">
                        <img src="{{ $page->photoUrl() }}" alt="{{ $page->name }}" width="500" height="500" fetchpriority="high">
                    </div>
                    <span class="personal-portrait__code" aria-hidden="true">{&nbsp;}</span>
                    <a class="personal-portrait__caption" href="#about">Подробнее обо мне <span aria-hidden="true">↗</span></a>
                </div>
            </div>
            <div class="personal-container personal-hero__bottom"><span>Разработка и техническое руководство</span><a href="#about">Листайте вниз <span aria-hidden="true">↓</span></a></div>
        </section>
        <section class="personal-section" id="about" aria-labelledby="about-title">
            <div class="personal-container">
                <div class="personal-section__heading" data-reveal><p class="personal-eyebrow">01 / Обо мне</p><h2 id="about-title">{{ $page->about_title }}</h2></div>
                <div class="personal-about">
                    <div class="personal-about__text" data-reveal>
                        @foreach (preg_split('/\R\s*\R/u', $page->about_text ?? '') as $paragraph)<p>{{ $paragraph }}</p>@endforeach
                    </div>
                    @if (count($skills))
                        <div class="personal-skills" data-reveal>
                            @foreach ($skills as $group)
                                <div class="personal-skills__group"><h3>{{ $group['title'] ?? '' }}</h3><ul>
                                    @foreach ($group['items'] ?? [] as $skill)<li>{{ $skill }}</li>@endforeach
                                </ul></div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
        @if (count($experience))
            <section class="personal-section personal-section--tinted" id="experience" aria-labelledby="experience-title">
                <div class="personal-container">
                    <div class="personal-section__heading" data-reveal><p class="personal-eyebrow">02 / Опыт</p><h2 id="experience-title">Команды и продукты,<br>с которыми я работал</h2></div>
                    <div class="personal-experience">
                        @foreach ($experience as $job)
                            <article class="personal-job" data-reveal>
                                <div class="personal-job__company"><p class="personal-job__period">{{ $job['period'] ?? '' }}</p><h3>{{ $job['company'] ?? '' }}</h3></div>
                                <div class="personal-job__details"><h4>{{ $job['role'] ?? '' }}</h4><p>{{ $job['description'] ?? '' }}</p>
                                    @if (!empty($job['results']))<ul>@foreach (array_filter(preg_split('/\R/u', $job['results'])) as $result)<li>{{ $result }}</li>@endforeach</ul>@endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        @if (count($projects))
            <section class="personal-section" id="projects" aria-labelledby="projects-title">
                <div class="personal-container">
                    <div class="personal-section__heading" data-reveal><p class="personal-eyebrow">03 / Проекты</p><h2 id="projects-title">Недавние</h2></div>
                    <div class="personal-projects">
                        @foreach ($projects as $project)
                            @php($projectUrl = \App\Models\PersonalPage::webUrl($project['url'] ?? null))
                            <article class="personal-project" data-reveal>
                                <div class="personal-project__visual personal-project__visual--{{ $loop->index % 3 }}">
                                    @if (!empty($project['image']))
                                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($project['image']) }}" alt="{{ $project['title'] ?? '' }}" width="720" height="400" loading="lazy">
                                    @else
                                        <div class="personal-project__art" aria-hidden="true"><i></i><i></i><i></i></div>
                                        <span class="personal-project__wordmark" aria-hidden="true">{{ $project['title'] ?? '' }}</span>
                                    @endif
                                    @if (($project['status'] ?? '') === 'development')<span class="personal-project__status">В разработке</span>@endif
                                </div>
                                <div class="personal-project__copy">
                                    <p class="personal-eyebrow">{{ $project['category'] ?? '' }}</p>
                                    <h3>@if ($projectUrl)<a href="{{ $projectUrl }}" target="_blank" rel="noopener noreferrer">{{ $project['title'] ?? '' }} <span aria-hidden="true">↗</span></a>@else{{ $project['title'] ?? '' }}@endif</h3>
                                    <p>{{ $project['description'] ?? '' }}</p>
                                    @if (!empty($project['contribution']))<p class="personal-project__role">{{ $project['contribution'] }}</p>@endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <section class="personal-section personal-contact" id="contact" aria-labelledby="contact-title">
            <div class="personal-container personal-contact__grid">
                <div data-reveal><p class="personal-eyebrow">04 / Контакты</p><h2 id="contact-title">{{ $page->contact_title }}</h2><p class="personal-lead">{{ $page->contact_text }}</p></div>
                <div class="personal-contact__links" data-reveal>
                    @if ($page->telegramUrl())<a href="{{ $page->telegramUrl() }}" target="_blank" rel="noopener noreferrer"><span>Telegram</span><strong>{{ $page->telegram }}</strong><b aria-hidden="true">↗</b></a>@endif
                    @if ($page->emailUrl())<a href="{{ $page->emailUrl() }}"><span>Почта</span><strong>{{ $page->email }}</strong><b aria-hidden="true">↗</b></a>@endif
                    @if ($page->phoneUrl())<a href="{{ $page->phoneUrl() }}"><span>Телефон</span><strong>{{ $page->phone }}</strong><b aria-hidden="true">↗</b></a>@endif
                </div>
            </div>
        </section>
    </main>
    <footer class="personal-footer"><div class="personal-container"><span>© {{ date('Y') }} {{ $page->name }}</span><a href="https://romb-web.ru/" target="_blank" rel="noopener noreferrer">Студия Romb-web <span aria-hidden="true">↗</span></a></div></footer>
</body>
</html>
