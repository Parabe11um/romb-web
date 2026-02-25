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
