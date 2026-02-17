@extends('layouts.app')

@section('content')
    {{-- Header --}}
    @include('layouts.partials.header')

    {{-- HERO / HEADER --}}
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


    {{-- CONTENT --}}
    <section class="wrapper bg-white">
        <div class="container pb-24">
            <div class="max-w-4xl mx-auto">

                <article class="card overflow-hidden">

                    {{-- Превью --}}
                    @if($article->preview_image)
                        <figure class="h-[420px] overflow-hidden">
                            <img
                                src="{{ asset('storage/' . $article->preview_image) }}"
                                alt="{{ $article->title }}"
                                class="w-full h-full object-cover"
                            >
                        </figure>
                    @endif

                    {{-- Тело --}}
                    <div class="card-body p-8 md:p-12">

                        {{-- Краткое описание --}}
                        @if($article->excerpt)
                            <p class="text-lg text-[#60697b] mb-8">
                                {{ $article->excerpt }}
                            </p>
                        @endif

                        {{-- Основной контент --}}
                        <div class="prose max-w-none prose-img:rounded prose-img:my-8">
                            {!! $article->content !!}
                        </div>

                    </div>

                </article>

            </div>
        </div>
    </section>

@endsection
