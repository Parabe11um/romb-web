@extends('layouts.app')

@section('content')
    {{-- Header --}}
    @include('layouts.partials.header')

    {{-- HERO / HEADER --}}
    <section class="wrapper !bg-[#edf2fc]">
        <div class="container pt-10 pb-36 text-center">
            <div class="max-w-3xl mx-auto">

                {{-- Категория (пока заглушка, потом можно заменить) --}}
                <div class="inline-flex uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc] mb-2 relative pl-5
                        before:absolute before:w-3 before:h-[2px] before:left-0 before:top-1/2 before:bg-[#3f78e0]">
                    Статья
                </div>

                {{-- Заголовок --}}
                <h1 class="text-[clamp(1.6rem,4vw,2.4rem)] font-bold leading-tight mb-4">
                    {{ $article->title }}
                </h1>

                {{-- Мета --}}
                <ul class="text-[0.8rem] text-[#aab0bc] flex justify-center gap-4">
                    <li>
                        <i class="uil uil-calendar-alt mr-1"></i>
                        {{ $article->created_at->format('d.m.Y') }}
                    </li>
                </ul>

            </div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="wrapper bg-white">
        <div class="container pb-24">
            <div class="max-w-4xl mx-auto -mt-28">

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
