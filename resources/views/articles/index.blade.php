@extends('layouts.app')

@include('layouts.partials.seo', [
    'title' => 'Статьи о разработке и digital | Romb Web',
    'description' => 'Практичные статьи о разработке сайтов, дизайне, SEO и поддержке проектов. Делимся опытом, подходами и рабочими решениями.'
])

@section('content')
    @include('layouts.partials.hero-unified', [
        'heroTitle' => 'Статьи',
        'heroSubtitle' => 'Практика разработки, дизайн и развитие сайтов. Делимся опытом и рабочими решениями.',
        'breadcrumbs' => [
            ['title' => 'Главная', 'url' => route('home')],
            ['title' => 'Статьи']
        ]
    ])

    <section class="rw-articles-section">
        <div class="container">
            @if($articles->isNotEmpty())
                <div class="rw-article-grid">
                    @foreach($articles as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>
                @if($articles->hasPages())
                    <div class="rw-pagination">{{ $articles->links() }}</div>
                @endif
            @else
                <div class="rw-articles-empty">
                    <h2>Публикации скоро появятся</h2>
                    <p>Готовим материалы о разработке, продвижении и поддержке сайтов.</p>
                    <a class="rw-text-link" href="{{ route('home') }}">На главную <span aria-hidden="true">→</span></a>
                </div>
            @endif
        </div>
    </section>
@endsection
