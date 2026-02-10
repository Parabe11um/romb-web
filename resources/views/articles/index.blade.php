@extends('layouts.app')
@section('content')
    @include('layouts.partials.header')


    <section class="!bg-[#edf2fc]">
        <div
            class="container !pt-10 !pb-36 xl:!pt-[4.5rem] lg:!pt-[4.5rem] md:!pt-[4.5rem] xl:!pb-40 lg:!pb-40 md:!pb-40 !text-center">
            <div class="flex flex-wrap mx-[-15px]">
                <div class="md:w-7/12 lg:w-6/12 xl:w-5/12 w-full flex-[0_0_auto] !px-[15px] max-w-full !mx-auto">
                    <h1 class="!text-[calc(1.365rem_+_1.38vw)] font-bold !leading-[1.2] xl:!text-[2.4rem] !mb-3">
                        Статьи
                    </h1>
                    <p class="lead lg:!px-[1.25rem] xl:!px-[1.25rem] xxl:!px-[2rem] !leading-[1.65] text-[0.9rem] font-medium">
                        Аналитика, кейсы и рабочие подходы в разработке и цифровых продуктах.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper !bg-[#ffffff]">
        <div class="container !pb-[4.5rem] xl:!pb-24 lg:!pb-24 md:!pb-24">
            <div class="flex flex-wrap mx-[-15px]">
                <div class="xl:w-10/12 lg:w-10/12 w-full flex-[0_0_auto] !px-[15px] max-w-full !mx-auto">
                    <div class="blog classic-view !mt-[-7rem]">

                        @foreach ($articles as $article)
                            <article class="post !mb-8">
                                <div class="card">

                                    {{-- IMAGE --}}
                                    <figure class="card-img-top overlay overlay-1 hover-scale group">
                                        <a href="{{ route('articles.show', $article->slug) }}">
                                            <img
                                                class="!transition-all !duration-[0.35s] !ease-in-out group-hover:scale-105"
                                                src="{{ $article->cover_image
                            ? asset('storage/' . $article->cover_image)
                            : asset('storage/' . $article->preview_image) }}"
                                                alt="{{ $article->title }}"
                                            >
                                            <span class="bg"></span>
                                        </a>

                                        <figcaption
                                            class="group-hover:opacity-100 absolute w-full h-full opacity-0 text-center px-4 py-3 inset-0 z-[5] pointer-events-none p-2">
                                            <h5 class="from-top !mb-0 absolute w-full translate-y-[-80%] p-[.75rem_1rem] left-0 top-2/4">
                                                Read More
                                            </h5>
                                        </figcaption>
                                    </figure>

                                    {{-- BODY --}}
                                    <div
                                        class="card-body flex-[1_1_auto] p-[40px] xl:!p-[2rem_2.5rem_1.25rem] lg:!p-[2rem_2.5rem_1.25rem] md:!p-[2rem_2.5rem_1.25rem] max-md:pb-4">
                                        <div class="post-header !mb-[.9rem]">
                                            <h2 class="post-title !mt-1 !leading-[1.35] !mb-0">
                                                <a class="!text-[#343f52] hover:!text-[#3f78e0]"
                                                   href="{{ route('articles.show', $article->slug) }}">
                                                    {{ $article->title }}
                                                </a>
                                            </h2>
                                        </div>

                                        <div class="!relative">
                                            <p>
                                                {{ $article->excerpt
                                                    ?? \Illuminate\Support\Str::limit(strip_tags($article->content), 220) }}
                                            </p>
                                        </div>
                                    </div>

                                    {{-- FOOTER --}}
                                    <div
                                        class="card-footer xl:!p-[1.25rem_2.5rem_1.25rem] lg:!p-[1.25rem_2.5rem_1.25rem] md:!p-[1.25rem_2.5rem_1.25rem] p-[18px_40px]">
                                        <ul class="!text-[0.7rem] !text-[#aab0bc] m-0 p-0 list-none flex !mb-0">
                                            <li class="post-date inline-block">
                                                <i class="uil uil-calendar-alt pr-[0.2rem] align-[-.05rem]"></i>
                                                <span>{{ $article->created_at->format('d M Y') }}</span>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
