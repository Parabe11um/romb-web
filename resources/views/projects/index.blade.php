@extends('layouts.app')

@include('layouts.partials.seo', [
    'title' => 'Проекты — реализованные кейсы | Romb Web',
    'description' => 'Примеры реализованных проектов: корпоративные сайты, сервисы и интернет-магазины. Подход, задачи и результаты — без лишнего, по делу.'
])

@section('content')
    <div class="grow shrink-0">
        <!-- /header -->

        {{-- HERO --}}
        @include('layouts.partials.hero-unified', [
            'heroTitle' => 'Проекты',
            'heroSubtitle' => 'Реализованные проекты, отражающие наш подход, дизайн и техническое качество.',
            'breadcrumbs' => [
                ['title' => 'Главная', 'url' => route('home')],
                ['title' => 'Проекты']
        ],
        'withBackground' => true
        ])

        <!-- /section -->
        <section class="wrapper !bg-[#ffffff]">
            <div class="container py-[4.5rem] xl:!py-24 lg:!py-24 md:!py-24">
                <div class="itemgrid grid-view projects-masonry">
                    <div class="isotope-filter !relative !z-[5] filter !mb-10">

                        <ul class="inline m-0 p-0 list-none">
                            <li class="inline">
                                <a class="filter-item uppercase text-[0.7rem] font-bold cursor-pointer active"
                                   data-filter="*">
                                    Все
                                </a>
                            </li>

                            @foreach($services as $service)
                                <li class="inline before:content-[''] before:inline-block before:w-[0.2rem] before:h-[0.2rem]
                       before:ml-2 before:mr-[0.8rem] before:rounded-full before:bg-[rgba(30,34,40,.2)]">
                                    <a class="filter-item uppercase text-[0.7rem] font-bold cursor-pointer hover:!text-[#3f78e0]"
                                       data-filter=".service-{{ $service->id }}">
                                        {{ $service->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="isotope mx-[-15px] xl:mx-[-20px] lg:mx-[-20px] md:mx-[-20px]">

                        <div class="grid-sizer xl:w-4/12 lg:w-6/12 md:w-6/12 w-full px-[15px] xl:px-[20px] lg:px-[20px] md:px-[20px]"></div>

                        @foreach($projects as $project)
                            <div class="project item
                            xl:w-4/12 lg:w-6/12 md:w-6/12 w-full
                            xl:px-[20px] lg:px-[20px] md:px-[20px] px-[15px]
                            xl:pb-[70px] lg:pb-[70px] md:pb-[70px] pb-[50px]
                            max-w-full
                            @foreach($project->services as $service)
                                service-{{ $service->id }}
                            @endforeach
                        ">

                                <figure class="lift rounded !mb-6 overflow-hidden">
                                    <a href="{{ route('projects.show', $project) }}" class="block">
                                        <img
                                            src="{{ asset('storage/' . $project->preview_image) }}"
                                            alt="{{ $project->title }}"
                                            class="rounded w-full aspect-[16/10] object-cover"
                                        >
                                    </a>
                                </figure>

                                <div class="project-details !flex !flex-col !min-h-[110px]">
                                    <div class="post-header !min-h-[110px]">

                                        @if($project->services->isNotEmpty())
                                            <div class="inline-flex uppercase !tracking-[0.02rem] text-[0.7rem] font-bold
                                                relative align-top !pl-[1.4rem] !mb-3
                                                text-[#747ed1]
                                                before:content-[''] before:absolute before:inline-block
                                                before:translate-y-[-60%] before:w-3 before:h-[0.05rem]
                                                before:left-0 before:top-2/4 before:bg-[#747ed1]">
                                                {{ $project->services->first()->title }}
                                            </div>
                                        @endif

                                        <h3 class="post-title !mb-0 !leading-[1.35] !h-[58px] overflow-hidden">
                                            <a href="{{ route('projects.show', $project) }}"
                                               class="hover:underline block"
                                               style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                {{ $project->title }}
                                            </a>
                                        </h3>

                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <!-- /.row -->
                </div>
                <!-- /.grid -->
            </div>
            <!-- /.container -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
