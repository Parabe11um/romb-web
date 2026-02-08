@extends('layouts.app')

@section('content')

    <div class="grow shrink-0">

        {{-- Header --}}
        @include('layouts.partials.header')

        {{-- HERO / TITLE --}}
        <section class="wrapper !bg-[#edf2fc]">
            <div class="container pt-10 pb-36 !text-center">
                <div class="max-w-3xl mx-auto">
                    <div class="inline-flex mb-2 uppercase text-[0.7rem] font-bold text-[#aab0bc]">
                        Project
                    </div>

                    <h1 class="text-4xl font-bold mb-3">
                        {{ $project->title }}
                    </h1>

                    @if($project->excerpt)
                        <p class="lead text-[.95rem]">
                            {{ $project->excerpt }}
                        </p>
                    @endif
                </div>
            </div>
        </section>

        {{-- CONTENT --}}
        <div class="wrapper bg-white border-b">
            <div class="container pb-24">
                <article class="-mt-48">

                    {{-- COVER --}}
                    @if($project->detail_image)
                        <figure class="rounded mb-12">
                            <img
                                src="{{ asset('storage/'.$project->detail_image) }}"
                                alt="{{ $project->title }}"
                                class="rounded w-full"
                            >
                        </figure>
                    @endif

                    <div class="max-w-4xl mx-auto">

                        <h2 class="text-xl font-bold mb-4">О проекте</h2>

                        <div class="grid grid-cols-12 gap-8">
                            <div class="col-span-9 prose max-w-none">
                                {!! $project->content !!}
                            </div>

                            <aside class="col-span-3 text-sm">
                                <ul class="space-y-4">
                                    @if($project->project_date)
                                        <li>
                                            <h5 class="font-semibold">Дата</h5>
                                            <p>{{ $project->project_date->format('d.m.Y') }}</p>
                                        </li>
                                    @endif

                                    @if($project->client)
                                        <li>
                                            <h5 class="font-semibold">Клиент</h5>
                                            <p>{{ $project->client }}</p>
                                        </li>
                                    @endif
                                </ul>
                            </aside>
                        </div>
                    </div>

                </article>
            </div>
        </div>

    </div>

@endsection
