@extends('layouts.app')

@section('content')
    <div class="grow shrink-0">
        @include('layouts.partials.header')
        <!-- /header -->
        <section class="wrapper !bg-[#ffffff]">
            <div class="container pt-10 xl:pt-[4.5rem] lg:pt-[4.5rem] md:pt-[4.5rem]">
                <div class="flex flex-wrap mx-[-15px]">
                    <div class="md:w-8/12 lg:w-7/12 xl:w-6/12 xxl:w-5/12 w-full px-[15px]">
                        <h1 class="!text-[calc(1.365rem_+_1.38vw)] font-bold !leading-[1.2] xl:!text-[2.4rem] !mb-3">
                            Проекты
                        </h1>
                        <p class="lead text-[1.05rem] !leading-[1.6]">
                            Реализованные проекты, отражающие наш подход, дизайн и техническое качество.
                        </p>
                    </div>
                </div>
            </div>
        </section>

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

                    <div class="flex flex-wrap mx-[-15px] xl:mx-[-20px] lg:mx-[-20px] md:mx-[-20px]
            !mt-[-50px] xl:!mt-[-80px] lg:!mt-[-80px] md:!mt-[-80px]
            isotope-grid">

                        @foreach($projects as $project)
                            <div class="project item
                                xl:w-4/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto]
                                xl:!mt-[80px] xl:!px-[20px]
                                lg:!mt-[80px] lg:!px-[20px]
                                md:!mt-[80px] md:!px-[20px]
                                !px-[15px] !mt-[50px] max-w-full
                                @foreach($project->services as $service)
                                    service-{{ $service->id }}
                                @endforeach
                            ">

                                {{-- Картинка --}}
                                <figure class="lift rounded !mb-6">
                                    <a href="{{ route('projects.show', $project->slug) }}">
                                        <img
                                            src="{{ asset('storage/' . $project->preview_image) }}"
                                            alt="{{ $project->title }}"
                                            class="rounded w-full"
                                        >
                                    </a>
                                </figure>

                                {{-- Текст --}}
                                <div class="project-details flex justify-center flex-col">
                                    <div class="post-header">

                                        {{-- Связанные услуги (первая как категория) --}}
                                        @if($project->services->isNotEmpty())
                                            <div class="inline-flex uppercase !tracking-[0.02rem] text-[0.7rem] font-bold
                                    relative align-top !pl-[1.4rem] !mb-2
                                    text-[#747ed1]
                                    before:content-[''] before:absolute before:inline-block
                                    before:translate-y-[-60%] before:w-3 before:h-[0.05rem]
                                    before:left-0 before:top-2/4 before:bg-[#747ed1]">
                                                {{ $project->services->first()->title }}
                                            </div>
                                        @endif

                                        <h3 class="post-title">
                                            <a href="{{ route('projects.show', $project->slug) }}"
                                               class="hover:underline">
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
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const grid = document.querySelector('.isotope-grid');
            if (!grid) return;

            const iso = new Isotope(grid, {
                itemSelector: '.project',
                layoutMode: 'masonry'
            });

            document.querySelectorAll('.filter-item').forEach(filter => {
                filter.addEventListener('click', function () {
                    document.querySelectorAll('.filter-item')
                        .forEach(i => i.classList.remove('active'));

                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');
                    iso.arrange({ filter: filterValue });
                });
            });
        });
    </script>
@endpush
