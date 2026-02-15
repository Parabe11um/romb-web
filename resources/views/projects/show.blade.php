@extends('layouts.app')

@section('content')

    <div class="grow shrink-0">

        {{-- Header --}}
        @include('layouts.partials.header')

        {{-- HERO / TITLE --}}
        <section class="wrapper bg-white">
            <div class="container pt-20 pb-12 text-center">
                <div class="mx-auto max-w-3xl">

                    @if($project->services->count())
                        <div class="uppercase text-xs tracking-wide text-[#aab0bc] mb-2">
                            {{ $project->services->first()->title }}
                        </div>
                    @endif

                    <h1 class="text-4xl font-bold mb-4 text-[#343f52]">
                        {{ $project->title }}
                    </h1>

                    @if($project->excerpt)
                        <p class="text-lg text-[#60697b]">
                            {{ $project->excerpt }}
                        </p>
                    @endif

                </div>
            </div>
        </section>

        @if($project->images?->isNotEmpty())
            <section class="wrapper bg-white">
                <div class="container pb-16">
                    <div class="max-w-5xl mx-auto"> {{-- <= ограничиваем ширину на больших экранах --}}

                        <div class="swiper-container relative dots-over"
                             data-dots="true"
                             data-nav="true"
                             data-autoheight="true"
                             data-margin="20">

                            <div class="swiper">
                                <div class="swiper-wrapper">

                                    {{-- Сначала detail_image --}}
                                    @if($project->detail_image)
                                        <div class="swiper-slide">
                                            <div class="relative overflow-hidden rounded-lg aspect-[16/9] bg-[#f3f4f6]">
                                                <img src="{{ asset('storage/'.$project->detail_image) }}"
                                                     class="absolute inset-0 w-full h-full object-cover"
                                                     alt="{{ $project->title }}">
                                            </div>
                                        </div>
                                    @endif

                                    {{-- Затем галерея --}}
                                    @foreach($project->images as $image)
                                        <div class="swiper-slide">
                                            <div class="relative overflow-hidden rounded-lg aspect-[16/9] bg-[#f3f4f6]">
                                                <img src="{{ asset('storage/'.$image->image) }}"
                                                     class="absolute inset-0 w-full h-full object-cover"
                                                     alt="{{ $project->title }}">

                                                @if($image->caption)
                                                    <div class="absolute bottom-6 right-6 bg-white px-4 py-2 rounded-md shadow">
                                                        {{ $image->caption }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </section>
        @endif

        {{-- CONTENT --}}
        <section class="wrapper bg-white py-20">
            <div class="container">
                <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10">

                    <div class="lg:col-span-9">
                        <h2 class="text-2xl font-bold mb-6 text-[#343f52]">
                            О проекте
                        </h2>

                        <div class="prose max-w-none text-[#60697b]">
                            {!! $project->content !!}
                        </div>
                    </div>

                    <div class="lg:col-span-3">
                        <ul class="space-y-6 text-sm">
                            <li>
                                <h5 class="font-semibold text-[#343f52]">Дата</h5>
                                <p>{{ $project->created_at->format('d.m.Y') }}</p>
                            </li>
                            @if($project->services->isNotEmpty())
                                <li>
                                    <h5 class="font-semibold text-[#343f52]">Услуги</h5>

                                    <ul class="mt-2 space-y-1 text-[#60697b]">
                                        @foreach($project->services as $service)
                                            <li>{{ $service->title }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection


