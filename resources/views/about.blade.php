@extends('layouts.app')

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



    {{-- ================= О КОМПАНИИ ================= --}}
    <section class="wrapper bg-white py-24">
        <div class="container max-w-4xl text-center">

            <h2 class="text-3xl font-bold mb-6 text-[#343f52]">
                Мы — romb web
            </h2>

            <p class="text-lg text-[#60697b] leading-relaxed">
                Команда разработчиков и digital-специалистов, которая помогает бизнесу
                запускать, масштабировать и улучшать онлайн-проекты.
            </p>

            <p class="mt-6 text-[#60697b] leading-relaxed">
                Мы работаем на стыке стратегии, дизайна и технологий,
                создавая решения, которые не просто выглядят красиво,
                а приносят измеримый результат.
            </p>

        </div>
    </section>



    {{-- ================= НАШ ПОДХОД ================= --}}
    <section class="wrapper !bg-[#edf2fc] py-24">
        <div class="container">

            <h2 class="text-3xl font-bold text-center mb-16 text-[#343f52]">
                Наш подход
            </h2>

            <div class="grid md:grid-cols-3 gap-12 text-center">

                <div>
                    <div class="w-14 h-14 mx-auto mb-6 rounded-full bg-[#3f78e0]/10 flex items-center justify-center text-[#3f78e0] font-bold text-xl">
                        01
                    </div>
                    <h4 class="font-semibold mb-3">Погружение в бизнес</h4>
                    <p class="text-[#60697b]">
                        Анализируем цели, аудиторию и процессы, чтобы
                        создать стратегически верное решение.
                    </p>
                </div>

                <div>
                    <div class="w-14 h-14 mx-auto mb-6 rounded-full bg-[#3f78e0]/10 flex items-center justify-center text-[#3f78e0] font-bold text-xl">
                        02
                    </div>
                    <h4 class="font-semibold mb-3">Разработка и запуск</h4>
                    <p class="text-[#60697b]">
                        Проектируем архитектуру, разрабатываем,
                        тестируем и внедряем.
                    </p>
                </div>

                <div>
                    <div class="w-14 h-14 mx-auto mb-6 rounded-full bg-[#3f78e0]/10 flex items-center justify-center text-[#3f78e0] font-bold text-xl">
                        03
                    </div>
                    <h4 class="font-semibold mb-3">Рост и развитие</h4>
                    <p class="text-[#60697b]">
                        Оптимизируем, масштабируем и поддерживаем
                        проекты после запуска.
                    </p>
                </div>

            </div>

        </div>
    </section>



    {{-- ================= ПОЧЕМУ МЫ ================= --}}
    <section class="wrapper bg-white py-24">
        <div class="container max-w-5xl">

            <h2 class="text-3xl font-bold text-center mb-16 text-[#343f52]">
                Почему выбирают нас
            </h2>

            <div class="grid md:grid-cols-2 gap-12">

                <div>
                    <h4 class="font-semibold mb-3">Системность</h4>
                    <p class="text-[#60697b]">
                        Мы выстраиваем процессы, а не просто закрываем задачи.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold mb-3">Технологичность</h4>
                    <p class="text-[#60697b]">
                        Используем современные инструменты и архитектуру,
                        ориентированную на масштабирование.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold mb-3">Прозрачность</h4>
                    <p class="text-[#60697b]">
                        Чёткие этапы, понятная структура и регулярная коммуникация.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold mb-3">Ориентация на результат</h4>
                    <p class="text-[#60697b]">
                        Каждый проект направлен на рост показателей бизнеса.
                    </p>
                </div>

            </div>

        </div>
    </section>

    
    {{-- ================= CTA ================= --}}
    @include('layouts.partials.cta-unified')

@endsection
