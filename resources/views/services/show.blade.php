@extends('layouts.app')

@section('header_variant', 'dark')

@section('content')
    <div class="page-wrapper">

        {{-- 1) Главное изображение услуги (как на проектах) --}}
        <section class="page-banner-section style-two"
                 style="background-image: url('{{ asset('images/service_0_0.jpg') }}');">
            <div class="auto-container">
                <div class="title">Услуга</div>
                <h1>Домашние кинотеатры и кинозалы</h1>
            </div>

            <!-- Scroll Down Btn -->
            <div class="mouse-btn-down scroll-to-target">
                <div class="chevron"></div>
                <div class="chevron"></div>
                <div class="chevron"></div>
            </div>
        </section>

        {{-- 2) Хлебные крошки --}}
        <section class="page-title-two-section">
            <div class="auto-container">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('services.index') }}">Услуги</a></li>
                    <li>Домашние кинотеатры</li>
                </ul>
            </div>
        </section>

        {{-- 3) Описание услуги // верхнее --}}
        <section class="service-description-section">
            <div class="auto-container">
                <div class="row">
                    <h3 class="mt-4 mb-4">О технологии</h3>
                    <div class="col-lg-12 col-md-12">
                        <p>
                            Проектируем и внедряем домашние кинотеатры «под ключ»: акустика, экраны/проекции,
                            акустическая обработка, сценарии освещения и единая система управления.
                            Согласовываем решения с архитекторами и строителями, ведём авторский надзор и пуско-наладку.
                        </p>
                        <p>
                            Результат — киноопыт студийного уровня в жилом пространстве, где звук, свет и эргономика
                            работают как единый сценарий.
                        </p>
                    </div>
                </div>
            </div>
        </section>



        {{-- 4) Слайдер примеров реализации (фото/детали решений) --}}
        <section class="examples-carousel-section">
            <div class="auto-container">
                <h3 class="mt-4 mb-4">Примеры реализации</h3>

                <div class="examples-carousel owl-carousel owl-theme">
                    @foreach ([
                        'images/service_0_1.jpg',
                        'images/service_0_2.jpg',
                        'images/service_0_3.jpg',
                        'images/service_0_4.jpg',
                        'images/service_0_5.jpg',
                    ] as $img)
                        <div class="example-slide">
                            <div class="image no-radius ratio-16x9">
                                <img src="{{ asset($img) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 5) Описание услуги // нижнее --}}
        <section class="service-description-section">
            <div class="auto-container">
                <div class="row">
                    <h3 class="mt-4 mb-4">Описание системы</h3>
                    <div class="col-lg-12 col-md-12">
                        <p>
                            Проектируем и внедряем домашние кинотеатры «под ключ»: акустика, экраны/проекции,
                            акустическая обработка, сценарии освещения и единая система управления.
                            Согласовываем решения с архитекторами и строителями, ведём авторский надзор и пуско-наладку.
                        </p>
                        <p>
                            Результат — киноопыт студийного уровня в жилом пространстве, где звук, свет и эргономика
                            работают как единый сценарий.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        {{-- 6) Слайдер реализованных проектов --}}
        <section class="projects-slider-section">
            <div class="auto-container">
                <h3 class="mt-4 mb-4">Проекты с этой системой</h3>

                <div class="projects-carousel owl-carousel owl-theme">
                    {{-- Слайды: используем знакомую карточку gallery-block с overlay, чтобы стили совпали --}}
                    @foreach ([
                        ['img' => 'images/azarovo.png',   'title' => 'Вилла Азарово'],
                        ['img' => 'images/barviha.jpg',   'title' => 'Вилла Барвиха XXI'],
                        ['img' => 'images/zhukovka.jpg',  'title' => 'Вилла Жуковка'],
                        ['img' => 'images/city.png',      'title' => 'Москва-Сити, апартаменты'],
                    ] as $p)
                        <div class="gallery-block col-12">
                            <div class="inner-box">
                                <div class="image no-radius ratio-16x9">
                                    <div class="hover-color-layer"></div>
                                    <a class="arrow ion-android-arrow-forward" href="{{ route('projects.show') }}"></a>
                                    <img src="{{ asset($p['img']) }}" alt="">
                                    <div class="overlay-box fade-on-hover">
                                        <div class="content">
                                            <h3><a href="{{ route('projects.show') }}">{{ $p['title'] }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- New Projects Section -->
        <div class="new-projects-section">
            <div class="image-layer" style="background-image: url({{ asset('images/detail/01.jpg') }})"></div>
            <div class="auto-container">
                <div class="clearfix">
                    <div class="post pull-left">
                        <a href="{{ route('services.show') }}">Предыдущая</a>
                    </div>
                    <div class="post next pull-right">
                        <a href="{{ route('services.show') }}">Следующая</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End New Projects Section -->
    </div>

    <style>
        /* === Images & ratios ==================================================== */
        .image.no-radius,
        .image.no-radius img,
        .image.no-radius .overlay-box,
        .image.no-radius .hover-color-layer { border-radius: 0 !important; }

        .ratio-16x9, .ratio-21x9 {
            position: relative; width: 100%; overflow: hidden; background: #f3f3f3;
        }
        .ratio-16x9  { padding-top: 56.25%; }         /* 16:9 */
        .ratio-21x9  { padding-top: 20%; }            /* компактные карточки навигации */

        .ratio-16x9 img, .ratio-21x9 img {
            position: absolute; inset: 0; width: 100%; height: 100%;
            object-fit: cover; display: block;
        }

        /* на карточках проектов убираем «серую шапку», если есть в теме */
        .projects-carousel .hover-color-layer { display: none !important; }

        /* === Owl carousels: базовые вещи ======================================== */
        .projects-carousel, .examples-carousel { position: relative; isolation: isolate; }
        .projects-carousel .owl-stage-outer,
        .examples-carousel .owl-stage-outer { overflow: hidden !important; }

        /* Кнопки навигации — большие, оранжевые */
        .projects-carousel .owl-nav button,
        .examples-carousel .owl-nav button{
            width: 56px; height: 56px; border-radius: 50%;
            background: #dc4600; border: 0;
            box-shadow: 0 4px 12px rgba(220,70,0,.35);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
        }
        .projects-carousel .owl-nav button:hover,
        .examples-carousel .owl-nav button:hover{
            background: #bf3c00; transform: scale(1.06);
            box-shadow: 0 6px 16px rgba(220,70,0,.45);
        }
        .projects-carousel .owl-nav .ion-ios-arrow-left,
        .projects-carousel .owl-nav .ion-ios-arrow-right,
        .examples-carousel .owl-nav .ion-ios-arrow-left,
        .examples-carousel .owl-nav .ion-ios-arrow-right{
            color: #dc4600; font-size: 3rem; line-height: 1;
        }

        /* Расположение навигации:
           - У проектов — СНАРУЖИ изображения (по бокам)
           - У примеров — ВНУТРИ слайдера */
        .projects-carousel .owl-nav,
        .examples-carousel .owl-nav{
            position: absolute; top: 50%;
            transform: translateY(-50%);
            z-index: 9999; display: flex; justify-content: space-between; align-items: center;
        }

        /* Проекты: вынесено за края слайда */
        .projects-carousel .owl-nav{ left: -56px; right: -56px; }

        /* Примеры: внутри контейнера */
        .examples-carousel .owl-nav{ left: 0; right: 0; padding: 0 12px; }

        @media (min-width:1400px){
            .projects-carousel .owl-nav{ left: -64px; right: -64px; }
        }
        @media (max-width:1199.98px){
            .projects-carousel .owl-nav{ left: -44px; right: -44px; }
        }
        @media (max-width:767.98px){
            .projects-carousel .owl-nav{ left: -28px; right: -28px; }
        }
        @media (max-width:575px){
            .projects-carousel .owl-nav button,
            .examples-carousel .owl-nav button{ width: 48px; height: 48px; }
            .projects-carousel .owl-nav .ion-ios-arrow-left,
            .projects-carousel .owl-nav .ion-ios-arrow-right,
            .examples-carousel .owl-nav .ion-ios-arrow-left,
            .examples-carousel .owl-nav .ion-ios-arrow-right{ font-size: 22px; }
        }

        /* === Prev / Next service: компактнее и с отступом ======================= */
        .service-nav-section{ margin-top: 48px; }
        .srv-nav-card .image.ratio-21x9{ padding-top: 20% !important; }
        @media (min-width:1200px){
            .srv-nav-card .image.ratio-21x9{ padding-top: 18% !important; }
        }
        .srv-nav-card .overlay-box{ background: rgba(0,0,0,.45); padding: 16px; }
        .srv-nav-card .overlay-box .nav-kicker{ opacity: .9; font-size: 11px; margin-bottom: 4px; }
        .srv-nav-card .overlay-box h3{ font-size: 18px; margin: 0; }

        .projects-carousel .ratio-16x9{
            padding-top: 0%;
        }

        .projects-carousel .owl-nav{
            top: 40%!important;
        }

        /* --- HOVER-АНИМАЦИЯ для карточек в слайдере "Проекты с этой системой" --- */
        .projects-slider-section .gallery-block .image{ position:relative; overflow:hidden; }
        .projects-slider-section .gallery-block .image img{
            transition: transform .6s cubic-bezier(.2,.65,.2,1);
        }
        .projects-slider-section .gallery-block .hover-color-layer{
            position:absolute; inset:0;
            background: rgba(220,70,0,.85);        /* #dc4600 с прозрачностью */
            opacity:0; transform: translateY(12%);
            transition: opacity .35s ease, transform .35s ease;
            z-index:1;                              /* ниже текста, выше картинки */
        }
        .projects-slider-section .gallery-block .overlay-box{
            background: transparent;                /* чтобы оранжевый был виден */
            z-index:2;
        }
        .projects-slider-section .gallery-block .image:hover .hover-color-layer{
            opacity:1; transform: translateY(0);
        }
        .projects-slider-section .gallery-block .image:hover img{
            transform: scale(1.04);
        }


        /* ----- HOVER как на странице "Проекты" (только для блока "Проекты с этой системой") */
        .projects-slider-section .gallery-block .image{ position:relative; overflow:hidden; }
        .projects-slider-section .gallery-block .image img{
            transition: transform .6s cubic-bezier(.2,.65,.2,1);
        }
        .projects-slider-section .gallery-block .overlay-box{
            background: transparent !important;   /* убираем чёрную плашку */
            z-index: 2;
        }

        /* включаем и настраиваем цветной слой */
        .projects-slider-section .gallery-block .hover-color-layer{
            display: block !important;            /* перебьёт старое display:none */
            position: absolute; inset: 0;
            background: #dc4600;
            opacity: 0;
            transform: translateY(12%);           /* лёгкий подъезд, как в теме */
            transition: opacity .35s ease, transform .35s ease;
            z-index: 1;                           /* между картинкой и текстом */
        }

        /* ховер-состояние: цветная заливка + лёгкий зум изображения */
        .projects-slider-section .gallery-block .image:hover .hover-color-layer{
            opacity: 0.95;
            transform: translateY(0);
        }
        .projects-slider-section .gallery-block .image:hover img{
            transform: scale(1.04);
        }

        /* стрелка поверх заливки (если используется иконка-стрелка в правом верхнем углу) */
        .projects-slider-section .gallery-block .arrow{
            position: absolute; top: 18px; right: 20px; z-index: 3;
            color: #fff; text-decoration: none;
        }


        /* Быстрая заливка слева-направо для карточек в слайдере "Проекты с этой системой" */
        .projects-slider-section .gallery-block .image{ position:relative; overflow:hidden; }
        .projects-slider-section .gallery-block .overlay-box{ background:transparent !important; z-index:2; }

        .projects-slider-section .gallery-block .hover-color-layer{
            display:block !important;
            position:absolute; inset:0;
            background:#dc4600;                 /* оранжевая плашка */
            opacity:.95 !important;             /* постоянная непрозрачность */
            transform-origin:left center;
            transform:scaleX(0);                /* старт: скрыта слева */
            transition:transform .22s ease-out; /* быстрее, чем было */
            will-change:transform;
            z-index:1;                          /* между картинкой и текстом */
        }

        .projects-slider-section .gallery-block .image:hover .hover-color-layer,
        .projects-slider-section .gallery-block .image:focus-visible .hover-color-layer{
            transform:scaleX(1);                /* финиш: заливка на всю карточку */
        }

        /* лёгкий зум картинки, чтобы «жило», но не мешал скорости */
        .projects-slider-section .gallery-block .image img{
            transition:transform .4s cubic-bezier(.2,.65,.2,1);
        }
        .projects-slider-section .gallery-block .image:hover img,
        .projects-slider-section .gallery-block .image:focus-visible img{
            transform:scale(1.02);
        }

        /* Примеры реализации — стрелки СНАРУЖИ и кликабельные */
        .examples-carousel{
            position: relative;
            overflow: visible; /* стрелки можно выпускать за кадр */
        }
        .examples-carousel .owl-stage-outer{
            overflow: hidden !important; /* лента остаётся в «маске» */
        }
        .examples-carousel .owl-nav{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: -56px;
            right: -56px;
            z-index: 10000;                   /* поверх любых слоёв */
            display: flex;
            justify-content: space-between;
            align-items: center;
            pointer-events: auto !important;  /* сам контейнер принимает клики */
            padding: 0 !important;
        }
        .examples-carousel .owl-nav button{
            pointer-events: auto !important;  /* сами кнопки кликабельные */
            position: relative;
            z-index: 10001;                   /* ещё выше на всякий */
        }
        .examples-carousel .owl-nav button span{
            pointer-events: none !important;  /* клики не «уезжают» на иконку */
        }

        /* адаптивный вынос */
        @media (min-width:1400px){
            .examples-carousel .owl-nav{ left:-64px; right:-64px; }
        }
        @media (max-width:1199.98px){
            .examples-carousel .owl-nav{ left:-44px; right:-44px; }
        }
        @media (max-width:767.98px){
            .examples-carousel .owl-nav{ left:-28px; right:-28px; }
        }


        /* Hero услуги — во всю высоту окна (как на главной) */
        .page-banner-section.style-two{
            position: relative;
            /* надёжно для разных мобильных браузеров */
            min-height: 100vh;
            min-height: 100svh;
            min-height: 100dvh;

            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;

            display: flex;
            align-items: center;           /* выравнивание текста по вертикали (можно flex-end, если нужно ниже) */
            padding: 6rem 0;               /* немного воздуха внутри */
        }

        /* контейнер на баннере растягиваем на всю высоту, чтобы центрирование работало стабильно */
        .page-banner-section.style-two .auto-container{
            width: 100%;
        }

        /* на всякий — контент читаемый поверх фото */
        .page-banner-section.style-two .title,
        .page-banner-section.style-two h1{
            color: #fff;
        }

        /* если есть тёмная подложка на главной — можно включить и здесь */
        .page-banner-section.style-two::before{
            content:"";
            position:absolute; inset:0;
            background: rgba(0,0,0,.25);   /* сделай .35 если нужно темнее */
            pointer-events:none;
        }

        .page-banner-section .mouse-btn-down {
            position: absolute;
            left: 50%;
            margin-left: -20px;
            bottom: 20px;
            width: 30px;
            height: 68px;
            display: block;
            z-index: 1;
            cursor: pointer;
        }


    </style>

    {{-- Инициализация Owl (идентично подходу на проектах) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            if (window.jQuery && jQuery.fn && jQuery.fn.owlCarousel) {
                // карусель проектов: 3/2/1
                jQuery('.projects-carousel').owlCarousel({
                    loop:true, margin:24, nav:true, dots:false,
                    navText:['<span class="ion-ios-arrow-left"></span>','<span class="ion-ios-arrow-right"></span>'],
                    responsive:{ 0:{items:1}, 768:{items:2}, 1200:{items:3} }
                });

                // карусель примеров: 1 (с отступом), можно включить center:true если нужно
                jQuery('.examples-carousel').owlCarousel({
                    loop:true, margin:16, nav:true, dots:true,
                    navText:['<span class="ion-ios-arrow-left"></span>','<span class="ion-ios-arrow-right"></span>'],
                    responsive:{ 0:{items:1}, 768:{items:1}, 1200:{items:1} }
                });
            } else {
                console.warn('[service.show] Owl Carousel не подключён — подключи тот же бандл, что на странице проектов.');
            }
        });
    </script>
@endsection
