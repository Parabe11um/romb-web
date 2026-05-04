<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    {{-- Title --}}
    <title>@yield('title', config('app.name'))</title>

    {{-- Description --}}
    <meta name="description"
          content="@yield('meta_description', 'Создаём, развиваем и поддерживаем digital-проекты под задачи бизнеса.')">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(app()->environment('production') && in_array(request()->getHost(), ['romb-web.ru', 'www.romb-web.ru']))
    <meta name="yandex-verification" content="d91865dce341a36e" />
    @endif

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/android-chrome-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('title', config('app.name'))">
    <meta property="og:description" content="@yield('meta_description', '')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>

            .logo { font-weight: 600; }
            .nav  { font-weight: 200; }
            body  { font-weight: 400; }

            .swiper-container.nav-color .swiper-button.swiper-button-disabled, .swiper-container.nav-color .swiper-slide figure .item-link.swiper-button-disabled {
                background: #5eb9f0b3 !important;
            }

            .swiper-container.nav-color .swiper-button, .swiper-container.nav-color .swiper-slide figure .item-link {
                background: #5eb9f0e6 !important;
                color: #ffffff !important;
            }

            .swiper-container.nav-color .swiper-button:hover, .swiper-container.nav-color .swiper-slide figure .item-link:hover {
                background: #5eb9f0 !important;
            }

            .navbar.navbar-light.fixed .btn:not(.btn-expand):not(.btn-gradient) {
                background: #5eb9f0 !important;
                border-color: #5eb9f0 !important;
                color: #ffffff !important;
            }

            .accordion-wrapper .card-header button {
                color: #5eb9f0;
            }

            @media (min-width: 992px) {
                .navbar-expand-lg.navbar-light .dropdown:not(.dropdown-submenu) > .dropdown-toggle:after {
                    color: #5eb9f0;
                }
            }

            @media (max-width: 991.98px) {
                .navbar-expand-lg .navbar-collapse .dropdown-toggle:after {
                    color: #ffffff !important;
                }
            }
        </style>


    @if(app()->environment('production') && in_array(request()->getHost(), ['romb-web.ru', 'www.romb-web.ru']))
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            window.dataLayer = window.dataLayer || [];

            (function(m,e,t,r,i,k,a){
                m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();
                for (var j = 0; j < document.scripts.length; j++) {
                    if (document.scripts[j].src === r) { return; }
                }
                k=e.createElement(t),
                    a=e.getElementsByTagName(t)[0],
                    k.async=1,
                    k.src=r,
                    a.parentNode.insertBefore(k,a)
            })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=109043441', 'ym');

            ym(109043441, 'init', {
                ssr: true,
                webvisor: true,
                clickmap: true,
                ecommerce: "dataLayer",
                referrer: document.referrer,
                url: location.href,
                accurateTrackBounce: true,
                trackLinks: true
            });
        </script>
        <noscript>
            <div>
                <img src="https://mc.yandex.ru/watch/109043441" style="position:absolute; left:-9999px;" alt="" />
            </div>
        </noscript>
        <!-- /Yandex.Metrika counter -->
    @endif

    </head>
    <body>
        @include('layouts.partials.header')
        @yield('content')
        @include('layouts.partials.footer')
        @include('layouts.partials.cookie')
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
        <script src="{{ asset('js/animation.js') }}"></script>
        @stack('scripts')
    </body>
</html>
