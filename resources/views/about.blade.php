@extends('layouts.app')

@include('layouts.partials.seo', [
    'title' => 'О нас — разработка и сопровождение сайтов | Romb Web',
    'description' => 'Создаём и развиваем digital-проекты под задачи бизнеса: проектирование, дизайн, разработка и поддержка сайтов. Работаем системно и прозрачно.'
])

@section('content')

    {{-- ================= HERO ================= --}}
    @php
        $heroTitle = 'О нас';
        $heroSubtitle = 'Создаём, развиваем и поддерживаем digital-проекты, которые работают на бизнес.';
        $breadcrumbs = [
            ['title' => 'Главная', 'url' => route('home')],
            ['title' => 'О нас']
        ];
    @endphp

    @include('layouts.partials.hero-unified', [
        'heroTitle' => $heroTitle,
        'heroSubtitle' => $heroSubtitle,
        'breadcrumbs' => $breadcrumbs,
    ])

    <section class="wrapper pt-16">
        <div class="container !pb-[4.5rem] xl:!pb-24 lg:!pb-24 md:!pb-24">

            <h2 class="text-center !text-[.75rem] uppercase !text-[#5eb9f0] !tracking-[0.02rem] !leading-[1.35] !mb-3">
                Почему выбирают нас
            </h2>

            <div class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px] !mt-[-50px] items-center">
                <div
                    class="xl:w-7/12 lg:w-7/12 w-full flex-[0_0_auto] xl:!px-[35px] lg:!px-[20px] !px-[15px] !mt-[50px] max-w-full">
                    <figure class="m-0 p-0 flex justify-center">
                        <img
                            class="img-auto w-full max-w-[420px] xl:max-w-[460px]"
                            src="images/i22.png"
                            srcset="images/i22%402x.png 2x"
                            alt="image"
                        >
                    </figure>
                </div>
                <!--/column -->

                <div
                    class="xl:w-5/12 lg:w-5/12 w-full flex-[0_0_auto] xl:!px-[35px] lg:!px-[20px] !px-[15px] !mt-[50px] max-w-full">



                    <h3 class="xl:!text-[2.1rem] !text-[calc(1.335rem_+_1.02vw)] !leading-[1.2] !mb-7">
                        Понятные решения, точная реализация и гибкое развитие проекта
                    </h3>

                    <div class="accordion accordion-wrapper" id="accordionExample">

                        <!-- 1 -->
                        <div class="card plain accordion-item">
                            <div class="card-header !mb-0 !p-[0_0_.8rem_0] !border-0 !bg-inherit" id="headingOne">
                                <button
                                    class="accordion-button !text-[0.9rem] hover:!text-[#5eb9f0] before:!text-[#5eb9f0]"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne"
                                    aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Профессиональный дизайн
                                </button>
                            </div>

                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="card-body !p-[0_0_0_1.1rem]">
                                    <p class="text-[#60697b] leading-relaxed">
                                        Дизайн у нас начинается не с «красивой картинки», а с понимания задачи: кто будет
                                        читать страницу, что человеку нужно сделать и какие сомнения важно снять. Мы
                                        собираем логику экрана, продумываем структуру блоков, акценты и сценарии — чтобы
                                        сайт был понятным с первого взгляда и уверенно вёл к действию. Отдельно следим за
                                        типографикой, сеткой, ритмом и визуальной иерархией: заголовки, подзаголовки,
                                        списки, карточки и кнопки должны работать как единая система. В результате дизайн
                                        выглядит современно, но остаётся функциональным — без перегруза эффектами, которые
                                        мешают воспринимать смысл и отвлекают от сути.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 2 -->
                        <div class="card plain accordion-item">
                            <div class="card-header !mb-0 !p-[0_0_.8rem_0] !border-0 !bg-inherit" id="headingTwo">
                                <button
                                    class="collapsed !text-[0.9rem] hover:!text-[#5eb9f0] before:!text-[#5eb9f0]"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo"
                                    aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Поддержка и сопровождение
                                </button>
                            </div>

                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="card-body !p-[0_0_0_1.1rem]">
                                    <p class="text-[#60697b] leading-relaxed">
                                        После запуска проект не заканчивается. Мы остаёмся на связи: помогаем с правками,
                                        консультируем по контенту и дорабатываем интерфейс, когда появляются новые задачи.
                                        Если нужно — подключаем аналитику, настраиваем цели и события, смотрим, где
                                        пользователи теряются, и предлагаем улучшения, которые заметно влияют на
                                        конверсию. Важно и техническое сопровождение: обновления, резервные копии,
                                        безопасность, скорость загрузки, корректная работа форм и интеграций. Так сайт
                                        остаётся живым инструментом бизнеса, а не статичной витриной, к которой страшно
                                        прикасаться.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 3 -->
                        <div class="card plain accordion-item">
                            <div class="card-header !mb-0 !p-[0_0_.8rem_0] !border-0 !bg-inherit" id="headingThree">
                                <button
                                    class="collapsed !text-[0.9rem] hover:!text-[#5eb9f0] before:!text-[#5eb9f0]"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree"
                                    aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Гибкость и расширяемость
                                </button>
                            </div>

                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="card-body !p-[0_0_0_1.1rem]">
                                    <p class="text-[#60697b] leading-relaxed">
                                        Мы проектируем решения так, чтобы их было удобно развивать: добавлять новые
                                        страницы, разделы, кейсы, статьи и сервисные блоки без переписывания половины
                                        сайта. Вёрстка и компоненты собираются аккуратно и предсказуемо, а контентные
                                        разделы настраиваются так, чтобы менеджер мог обновлять информацию самостоятельно
                                        через админку. Если появляются новые направления, услуги или языковые версии, мы
                                        заранее учитываем это в структуре и навигации. Такой подход экономит время и бюджет
                                        в будущем: сайт спокойно масштабируется вместе с задачами и ростом бизнеса.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/.accordion -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->

        <div class="overflow-hidden">
            <div class="divider !text-[#fefefe] mx-[-0.5rem]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
                    <path fill="currentColor"
                          d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z"></path>
                </svg>
            </div>
        </div>
        <!-- /.overflow-hidden -->
    </section>
    @include('layouts.partials.cta-unified')

@endsection
