@extends('layouts.app')

@include('layouts.partials.seo', [
    'title' => 'Статьи о разработке и digital | Romb Web',
    'description' => 'Практичные статьи о разработке сайтов, дизайне, SEO и поддержке проектов. Делимся опытом, подходами и рабочими решениями.'
])

@section('content')

    @include('layouts.partials.hero-unified', [
        'heroTitle' => 'Статьи',
        'heroSubtitle' => 'Аналитика, кейсы и рабочие подходы в разработке и цифровых продуктах. Экспертные мнения.',
        'breadcrumbs' => [
            ['title' => 'Главная', 'url' => route('home')],
            ['title' => 'Статьи']
        ],
        'withBackground' => true
    ])

    <div class="wrapper bg-white py-24">
        <div class="container pb-20">
            <div class="flex flex-wrap items-stretch -mx-5">
                @foreach($articles as $article)
                    <article
                        class="item post xl:w-4/12 lg:w-4/12 md:w-4/12 w-full flex-[0_0_auto]
               xl:!px-[20px] lg:!px-[20px] md:!px-[20px]
               !mt-[40px] !px-[15px] max-w-full">

                        <div class="card h-full flex flex-col">

                            <figure class="card-img-top overlay overlay-1 hover-scale group
               h-[240px] lg:h-[260px] overflow-hidden rounded-t-lg">
                                <a href="{{ route('articles.show', $article->slug) }}" class="block w-full h-full">
                                    <img
                                        src="{{ asset('storage/' . $article->preview_image) }}"
                                        alt="{{ $article->title }}"
                                        class="!w-full !h-full !object-cover
                   !transition-all !duration-[0.35s] !ease-in-out
                   group-hover:scale-105"
                                    >
                                    <span class="bg"></span>
                                </a>

                                <figcaption class="group-hover:opacity-100 absolute inset-0
                           opacity-0 text-center z-[5] pointer-events-none">
                                    <h5 class="from-top absolute w-full top-1/2 -translate-y-1/2">
                                        Читать
                                    </h5>
                                </figcaption>
                            </figure>

                            <div class="card-body flex-1
                        p-[40px]
                        xl:!p-[1.75rem_1.75rem_1rem_1.75rem]
                        lg:!p-[1.75rem_1.75rem_1rem_1.75rem]
                        md:!p-[1.75rem_1.75rem_1rem_1.75rem]
                        max-md:pb-4">

                                <div class="post-header !mb-[.9rem]">

                                    <div
                                        class="inline-flex !mb-[.4rem] uppercase !tracking-[0.02rem]
                               text-[0.7rem] font-bold !text-[#aab0bc]
                               relative align-top !pl-[1.4rem]
                               before:content-['']
                               before:absolute
                               before:inline-block
                               before:translate-y-[-60%]
                               before:w-3 before:h-[0.05rem]
                               before:left-0 before:top-2/4
                               before:bg-[#3f78e0]">
                                        Статья
                                    </div>

                                    <h2 class="post-title h3 !mt-1 !mb-3">
                                        <a
                                            class="!text-[#343f52] hover:!text-[#3f78e0]"
                                            href="{{ route('articles.show', $article->slug) }}">
                                            {{ \Illuminate\Support\Str::limit($article->title, 40) }}
                                        </a>
                                    </h2>
                                </div>

                                <div class="!relative">
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($article->excerpt), 80) }}
                                    </p>
                                </div>
                            </div>

                            <div class="card-footer mt-auto
                       xl:!p-[1.25rem_1.75rem_1.25rem]
                       lg:!p-[1.25rem_1.75rem_1.25rem]
                       md:!p-[1.25rem_1.75rem_1.25rem]
                       p-[18px_40px]">

                                <ul class="!text-[0.7rem] !text-[#aab0bc] m-0 p-0 list-none flex !mb-0">

                                    <li class="post-date inline-block">
                                        <i class="uil uil-calendar-alt pr-[0.2rem] align-[-.05rem]"></i>
                                        <span>{{ $article->created_at->format('d.m.Y') }}</span>
                                    </li>

                                    <li
                                        class="post-comments inline-block
                               before:content-['']
                               before:inline-block
                               before:w-[0.2rem]
                               before:h-[0.2rem]
                               before:opacity-50
                               before:m-[0_.6rem_0]
                               before:rounded-[100%]
                               before:align-[.15rem]
                               before:bg-[#aab0bc]">
                                        <a
                                            class="!text-[#aab0bc] hover:!text-[#3f78e0]"
                                            href="{{ route('articles.show', $article->slug) }}">
                                            Читать →
                                        </a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>

@endsection
