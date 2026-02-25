@extends('layouts.app')

@include('layouts.partials.seo', [
    'title' => $article->meta_title ? $article->meta_title . '— статья | Romb Web': $article->title . ' — статья | Romb Web',
    'description' => $article->meta_description
        ?: \Illuminate\Support\Str::limit(strip_tags($article->excerpt ?? $article->content), 160)
])

@section('content')
    @php
        $heroTitle = $article->title;
        $heroSubtitle = null;
        $heroLabel = 'Статья';

        $breadcrumbs = [
            ['title' => 'Главная', 'url' => route('home')],
            ['title' => 'Статьи', 'url' => route('articles.index')],
            ['title' => $article->title]
        ];
    @endphp

    @include('layouts.partials.hero-unified')


    <section class="wrapper bg-white mt-10">
        <div class="container pb-24">
            <div class="max-w-4xl mx-auto">

                <article class="card overflow-hidden">

                    @if($article->preview_image)
                        <figure class="h-full overflow-hidden">
                            <img
                                src="{{ asset('storage/' . $article->preview_image) }}"
                                alt="{{ $article->title }}"
                                class="w-full h-full object-cover"
                            >
                        </figure>
                    @endif

                    <div class="card-body p-8 md:p-12">

                        @if($article->excerpt)
                            <p class="text-lg text-[#60697b] mb-8">
                                {{ $article->excerpt }}
                            </p>
                        @endif

                        <div class="prose max-w-none prose-img:rounded prose-img:my-8">
                            {!! $article->content !!}
                        </div>

                    </div>

                </article>

            </div>
        </div>
    </section>

@endsection
