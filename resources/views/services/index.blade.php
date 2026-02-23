@extends('layouts.app')

@section('content')
    <div class="grow shrink-0">

        {{-- HERO --}}
        @include('layouts.partials.hero-unified', [
            'heroTitle' => 'Услуги',
            'heroSubtitle' => 'Полный цикл digital-работ: проектирование, запуск и развитие цифровых решений для бизнеса.',
            'breadcrumbs' => [
                ['title' => 'Главная', 'url' => route('home')],
                ['title' => 'Услуги']
            ],
            'withBackground' => true
        ])

        <section class="wrapper bg-white py-24">
            <div class="container">
                <div class="grid md:grid-cols-3 gap-16 text-center">

                    @foreach($services as $service)
                        <div class="group">

                            @if($service->image)
                                <figure class="mb-8">
                                    <img class="mx-auto transition duration-300 group-hover:scale-105"
                                         src="{{ asset('storage/' . $service->image) }}"
                                         alt="{{ $service->title }}">
                                </figure>
                            @endif

                            <h3 class="text-xl font-semibold text-[#343f52] mb-4">
                                {{ $service->title }}
                            </h3>

                            <p class="text-[#60697b] mb-4 leading-relaxed">
                                {{ $service->excerpt }}
                            </p>

                            <a href="{{ route('services.show', $service) }}"
                               class="text-[#3f78e0] font-medium hover:underline">
                                Подробнее →
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        {{-- БЛОК ЦЕННОСТИ --}}
        <section class="wrapper !bg-[#f8f9fa] py-24">
            <div class="container">

                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-[#343f52] mb-4">
                        Мы работаем как партнёр
                    </h2>
                    <p class="text-[#60697b] max-w-2xl mx-auto leading-relaxed">
                        Внимательно погружаемся в бизнес-процессы, анализируем рынок и строим решения, которые масштабируются.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-16 text-center">

                    <!-- Стратегия -->
                    <div class="group">
                        <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-[#edf2fc] flex items-center justify-center transition duration-300 group-hover:bg-[#3f78e0]">
                            <!-- Иконка -->
                            <svg class="w-7 h-7 text-[#3f78e0] group-hover:text-white transition duration-300"
                                 fill="none" stroke="currentColor" stroke-width="1.8"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 3v18h18M7 14l3-3 4 4 5-5"/>
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold text-[#343f52] mb-4">
                            Стратегия
                        </h3>

                        <p class="text-[#60697b] leading-relaxed">
                            Определяем цели, точки роста и приоритеты развития проекта.
                        </p>
                    </div>

                    <!-- Системность -->
                    <div class="group">
                        <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-[#edf2fc] flex items-center justify-center transition duration-300 group-hover:bg-[#3f78e0]">
                            <svg class="w-7 h-7 text-[#3f78e0] group-hover:text-white transition duration-300"
                                 fill="none" stroke="currentColor" stroke-width="1.8"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 3h6v4H9zM4 9h6v4H4zM14 9h6v4h-6zM9 15h6v4H9z"/>
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold text-[#343f52] mb-4">
                            Системность
                        </h3>

                        <p class="text-[#60697b] leading-relaxed">
                            Проектируем архитектуру и процессы, удобные для масштабирования.
                        </p>
                    </div>

                    <!-- Прозрачность -->
                    <div class="group">
                        <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-[#edf2fc] flex items-center justify-center transition duration-300 group-hover:bg-[#3f78e0]">
                            <svg class="w-7 h-7 text-[#3f78e0] group-hover:text-white transition duration-300"
                                 fill="none" stroke="currentColor" stroke-width="1.8"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 4l7 4v6c0 5-7 6-7 6s-7-1-7-6V8l7-4z"/>
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold text-[#343f52] mb-4">
                            Прозрачность
                        </h3>

                        <p class="text-[#60697b] leading-relaxed">
                            Работаем с понятными этапами, сроками и регулярной отчётностью.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- ПРОЦЕСС --}}
        <section class="wrapper bg-white">
            <div class="container pt-20 xl:pt-28 lg:pt-28 md:pt-28 pb-16 xl:pb-20 lg:pb-20 md:pb-20">

                <div class="text-center mb-12">
                    <h2 class="!text-[calc(1.305rem_+_0.66vw)] font-bold xl:!text-[1.8rem] !leading-[1.3] !mb-3">
                        Как мы работаем
                    </h2>
                    <p class="lead !text-[1.05rem] !leading-[1.6] text-[#60697b]">
                        Структурный процесс позволяет держать фокус на результате и контролировать каждый этап проекта.
                    </p>
                </div>

                <div class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px] !mt-[-30px] process-wrapper line">

                    <!-- 01 -->
                    <div class="md:w-6/12 lg:w-3/12 xl:w-3/12 w-full flex-[0_0_auto] !px-[15px] xl:!px-[35px] lg:!px-[20px] !mt-[30px] max-w-full !relative after:w-full after:absolute after:content-[''] after:h-px after:z-[1] after:border-t-[rgba(164,174,198,0.2)] after:border-t after:border-solid after:left-[3rem] after:top-6 after:bg-inherit max-lg:after:!hidden">

        <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mb-4 !relative z-[2] w-12 h-12 inline-flex items-center justify-center !rounded-[100%]">
          <span class="number table-cell text-center align-middle text-[1.1rem] font-bold">
            01
          </span>
        </span>

                        <h4 class="!mb-2">Анализ</h4>
                        <p class="!mb-0 text-[#60697b]">
                            Погружаемся в бизнес, изучаем аудиторию и конкурентную среду.
                        </p>
                    </div>

                    <!-- 02 -->
                    <div class="md:w-6/12 lg:w-3/12 xl:w-3/12 w-full flex-[0_0_auto] !px-[15px] xl:!px-[35px] lg:!px-[20px] !mt-[30px] max-w-full !relative after:w-full after:absolute after:content-[''] after:h-px after:z-[1] after:border-t-[rgba(164,174,198,0.2)] after:border-t after:border-solid after:left-[3rem] after:top-6 after:bg-inherit max-lg:after:!hidden">

        <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mb-4 !relative z-[2] w-12 h-12 inline-flex items-center justify-center !rounded-[100%]">
          <span class="number table-cell text-center align-middle text-[1.1rem] font-bold">
            02
          </span>
        </span>

                        <h4 class="!mb-2">Проектирование</h4>
                        <p class="!mb-0 text-[#60697b]">
                            Формируем архитектуру, структуру и пользовательскую логику проекта.
                        </p>
                    </div>

                    <!-- 03 -->
                    <div class="md:w-6/12 lg:w-3/12 xl:w-3/12 w-full flex-[0_0_auto] !px-[15px] xl:!px-[35px] lg:!px-[20px] !mt-[30px] max-w-full !relative after:w-full after:absolute after:content-[''] after:h-px after:z-[1] after:border-t-[rgba(164,174,198,0.2)] after:border-t after:border-solid after:left-[3rem] after:top-6 after:bg-inherit max-lg:after:!hidden">

        <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mb-4 !relative z-[2] w-12 h-12 inline-flex items-center justify-center !rounded-[100%]">
          <span class="number table-cell text-center align-middle text-[1.1rem] font-bold">
            03
          </span>
        </span>

                        <h4 class="!mb-2">Реализация</h4>
                        <p class="!mb-0 text-[#60697b]">
                            Разрабатываем, тестируем и запускаем решение.
                        </p>
                    </div>

                    <!-- 04 -->
                    <div class="md:w-6/12 lg:w-3/12 xl:w-3/12 w-full flex-[0_0_auto] !px-[15px] xl:!px-[35px] lg:!px-[20px] !mt-[30px] max-w-full !relative">

        <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mb-4 !relative z-[2] w-12 h-12 inline-flex items-center justify-center !rounded-[100%]">
          <span class="number table-cell text-center align-middle text-[1.1rem] font-bold">
            04
          </span>
        </span>

                        <h4 class="!mb-2">Развитие</h4>
                        <p class="!mb-0 text-[#60697b]">
                            Поддерживаем, оптимизируем и масштабируем проект.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- CTA --}}
        @include('layouts.partials.cta-unified')
    </div>
@endsection
