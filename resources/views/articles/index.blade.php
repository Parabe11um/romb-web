@extends('layouts.app')
@section('content')
    @include('layouts.partials.header')

    {{-- HERO --}}
    <section class="wrapper bg-[#edf2fc]">
        <div class="container h-[320px] md:h-[380px] flex items-center justify-center text-center">
            <div class="max-w-2xl mx-auto">

                <h1 class="text-4xl font-bold text-[#343f52] mb-6">
                    Статьи
                </h1>

                <p class="text-[#60697b] text-lg leading-relaxed">
                    Аналитика, кейсы и рабочие подходы
                    в разработке и цифровых продуктах. Экспертные мнения.
                </p>

                @php
                    $breadcrumbs = [
                        ['title' => 'Главная', 'url' => route('home')],
                        ['title' => 'Статьи']
                    ];
                @endphp

                @include('layouts.partials.breadcrumbs')

            </div>
        </div>
    </section>


    <div class="wrapper !bg-[#ffffff]">
        <div class="container !pb-[4.5rem] xl:!pb-24 lg:!pb-24 md:!pb-24">
            <div class="flex flex-wrap mx-[-15px]">
                <div class="xl:w-10/12 lg:w-10/12 w-full flex-[0_0_auto] !px-[15px] max-w-full !mx-auto">
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
                        @foreach ($articles as $article)
                            <article class="group bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 overflow-hidden">

                                <a href="{{ route('articles.show', $article->slug) }}"
                                   class="block relative aspect-[16/9] overflow-hidden bg-gray-100">

                                    <img
                                        class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105"
                                        src="{{ $article->cover_image
                    ? asset('storage/' . $article->cover_image)
                    : asset('storage/' . $article->preview_image) }}"
                                        alt="{{ $article->title }}"
                                    >
                                </a>

                                <div class="p-5">

                                    <div class="text-xs text-[#aab0bc] mb-2">
                                        {{ $article->created_at->format('d.m.Y') }}
                                    </div>

                                    <h3 class="text-lg font-semibold text-[#343f52] mb-3 leading-snug">
                                        <a href="{{ route('articles.show', $article->slug) }}"
                                           class="hover:text-[#3f78e0] transition">
                                            {{ $article->title }}
                                        </a>
                                    </h3>

                                    <p class="text-sm text-[#60697b] leading-relaxed">
                                        {{ $article->excerpt
                                            ?? \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                                    </p>

                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
