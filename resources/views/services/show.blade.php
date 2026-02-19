@extends('layouts.app')

@php
    $hasHeroImage = !empty($service->hero_image);
@endphp


@section('content')

    {{-- ================= HERO ================= --}}
    @php
        $heroTitle = $service->hero_title ?: $service->title;
        $heroSubtitle = $service->hero_subtitle ?: $service->excerpt;
        $heroLabel = 'Услуга';

        $breadcrumbs = [
            ['title' => 'Главная', 'url' => route('home')],
            ['title' => 'Услуги', 'url' => route('services.index')],
            ['title' => $service->title]
        ];

        $heroButtons = '
            <a href="#contact"
               class="btn btn-lg btn-sky !text-white !bg-[#5eb9f0] border-[#5eb9f0] hover:text-white hover:!bg-[#5eb9f0] hover:!border-[#5eb9f0] focus:shadow-[rgba(88,167,216,1)] active:text-white active:!bg-[#5eb9f0] active:border-[#5eb9f0] disabled:text-white disabled:!bg-[#5eb9f0] disabled:border-[#5eb9f0]  !rounded-[50rem] !mr-2">
                Обсудить проект
            </a>';

        if($service->projects->count()) {
            $heroButtons .= '
                <a href="#projects"
                   class="btn btn-lg btn-sky !text-white !bg-[#5eb9f0] border-[#5eb9f0] hover:text-white hover:!bg-[#5eb9f0] hover:!border-[#5eb9f0] focus:shadow-[rgba(88,167,216,1)] active:text-white active:!bg-[#5eb9f0] active:border-[#5eb9f0] disabled:text-white disabled:!bg-[#5eb9f0] disabled:border-[#5eb9f0]  !rounded-[50rem] !mr-2">
                    Посмотреть кейсы
                </a>';
        }
    @endphp

    @include('layouts.partials.hero-unified', [
        'heroTitle' => $heroTitle,
        'heroSubtitle' => $heroSubtitle,
        'heroImage' => $service->hero_image ?? null,
        'heroLabel' => $heroLabel,
        'heroButtons' => $heroButtons,
        'breadcrumbs' => $breadcrumbs,
    ])



    {{-- ================= ОПИСАНИЕ ================= --}}
    @if($service->content)
        <section class="wrapper bg-white py-24">
            <div class="container max-w-5xl">
                <div class="prose max-w-none text-[#343f52]">
                    {!! $service->content !!}
                </div>
            </div>
        </section>
    @endif


    {{-- ================= ТИПОВЫЕ РЕШЕНИЯ ================= --}}
    @if($service->solutions->count())
        <section class="wrapper !bg-[#f8f9fa] py-24">
            <div class="container">

                <h2 class="text-3xl font-bold text-center !mb-16 text-[#343f52]">
                    Типовые решения
                </h2>

                <div class="grid md:grid-cols-3 gap-10">

                    @foreach($service->solutions as $solution)
                        <div class="p-8 bg-white rounded-xl shadow-sm">
                            <h3 class="text-xl font-semibold mb-4">
                                {{ $solution->title }}
                            </h3>

                            @if($solution->description)
                                <p class="text-[#60697b]">
                                    {{ $solution->description }}
                                </p>
                            @endif
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
    @endif


    {{-- ================= ТЕХНОЛОГИИ ================= --}}
    @if($service->technologies->count())
        <section class="wrapper bg-white py-24">
            <div class="container">

                <h2 class="text-3xl font-bold text-center !mb-16 text-[#343f52]">
                    Технологии
                </h2>

                <div class="flex flex-wrap justify-center gap-6 text-center">

                    @foreach($service->technologies as $tech)
                        <div class="px-6 py-3 bg-[#edf2fc] rounded-full text-[#343f52] font-medium">
                            {{ $tech->name }}
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
    @endif


    {{-- ================= ПРОЦЕСС ================= --}}
    @if($service->steps->count())
        <section class="wrapper !bg-[#edf2fc]">
            <div class="container pt-20 pb-20">

                <h2 class="text-3xl font-bold text-center mb-12 text-[#343f52]">
                    Как мы работаем
                </h2>

                <div class="flex flex-wrap mx-[-15px] !mt-[-30px] process-wrapper line">

                    @foreach($service->steps as $index => $step)
                        <div class="md:w-6/12 lg:w-3/12 w-full flex-[0_0_auto]
                            !px-[15px] !mt-[30px] max-w-full !relative
                            @if(!$loop->last)
                                after:w-full after:absolute after:content-['']
                                after:h-px after:z-[1]
                                after:border-t-[rgba(164,174,198,0.2)]
                                after:border-t after:border-solid
                                after:left-[3rem] after:top-6
                                after:bg-inherit max-lg:after:!hidden
                            @endif">

                        <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none
                                     !mb-4 !relative z-[2]
                                     w-12 h-12 inline-flex items-center justify-center
                                     !p-0 !rounded-[100%]">
                            <span class="number text-[1.1rem] font-bold">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </span>

                            <h4 class="!mb-2">
                                {{ $step->title }}
                            </h4>

                            @if($step->description)
                                <p class="!mb-0 text-[#60697b]">
                                    {{ $step->description }}
                                </p>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif


    {{-- ================= ПРОЕКТЫ ================= --}}
    @if($service->projects->count())
        <section id="projects" class="wrapper bg-white py-24">
            <div class="container">

                <h2 class="text-3xl font-bold text-center !mb-16 text-[#343f52]">
                    Реализованные проекты
                </h2>

                <div class="grid md:grid-cols-3 gap-10">

                    @foreach($service->projects as $project)
                        <div class="bg-[#f8f9fa] rounded-xl p-6">

                            <h4 class="font-semibold mb-3">
                                {{ $project->title }}
                            </h4>

                            @if($project->excerpt)
                                <p class="text-[#60697b] text-sm">
                                    {{ $project->excerpt }}
                                </p>
                            @endif

                            <a href="{{ route('projects.show', $project) }}"
                               class="text-[#3f78e0] text-sm font-medium mt-4 inline-block">
                                Смотреть кейс →
                            </a>

                        </div>
                    @endforeach

                </div>

            </div>
        </section>
    @endif

@endsection
