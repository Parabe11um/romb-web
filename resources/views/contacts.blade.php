@extends('layouts.app')

@include('layouts.partials.seo', [
    'title' => 'Контакты — обсудить проект | Romb Web',
    'description' => 'Свяжитесь с нами, чтобы обсудить разработку сайта или развитие проекта. Отвечаем оперативно и предлагаем понятный план действий.'
])

@section('content')

@include('layouts.partials.hero-unified', [
    'heroTitle' => 'Контакты',
    'heroSubtitle' => 'Открыты к диалогу и новым проектам.',
    'breadcrumbs' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Контакты']
    ]
])


<section class="wrapper bg-white py-24">
    <div class="container">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

            {{-- Левая колонка --}}
            <div>
                <h2 class="text-3xl font-bold mb-8 text-[#343f52]">
                    Давайте обсудим ваш проект
                </h2>

                <div class="space-y-8 text-[#60697b]">

                    <div class="flex items-start gap-4">
                        <div class="text-[#3f78e0] text-xl mt-1">📍</div>
                        <div>
                            <h5 class="font-semibold text-[#343f52] mb-1">Адрес</h5>
                            <p>г. Москва, Раменский бульвар, д. 1. </br>
                                Кластер «Ломоносов»</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="text-[#3f78e0] text-xl mt-1">📞</div>
                        <div>
                            <h5 class="font-semibold text-[#343f52] mb-1">Телефон</h5>
                            <p>+7 916 972 97 19</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="text-[#3f78e0] text-xl mt-1">✉️</div>
                        <div>
                            <h5 class="font-semibold text-[#343f52] mb-1">Email</h5>
                            <p>info@romb-web.ru</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Правая колонка — форма --}}
            <div class="bg-[#edf2fc] rounded-2xl p-10 shadow-sm">

                <h3 class="text-2xl font-bold mb-6 text-[#343f52]">
                    Напишите нам
                </h3>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium mb-2 text-[#343f52]">
                            Имя
                        </label>
                        <input type="text" name="name"
                               class="w-full bg-white rounded-lg border border-gray-200 px-4 py-3 shadow-sm
            focus:outline-none focus:ring-2 focus:ring-[#3f78e0]/30 focus:border-[#3f78e0]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2 text-[#343f52]">
                            Email
                        </label>
                        <input type="email" name="email"
                               class="w-full bg-white rounded-lg border border-gray-200 px-4 py-3 shadow-sm
            focus:outline-none focus:ring-2 focus:ring-[#3f78e0]/30 focus:border-[#3f78e0]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2 text-[#343f52]">
                            Сообщение
                        </label>
                        <textarea name="message" rows="4"
                                  class="w-full bg-white rounded-lg border border-gray-200 px-4 py-3 shadow-sm
            focus:outline-none focus:ring-2 focus:ring-[#3f78e0]/30 focus:border-[#3f78e0]"></textarea>
                    </div>

                    <div class="text-sm contact-policy">
                        <label for="policy" class="contact-policy__label">
                            <input type="checkbox" id="policy" name="policy" required class="contact-policy__input">

                            <span class="contact-policy__box" aria-hidden="true">
            <svg class="contact-policy__check" viewBox="0 0 24 24" fill="none">
                <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>

                            <span class="contact-policy__text">
            Я согласен с
            <a href="{{ route('privacy.policy') }}" class="text-[#3f78e0] hover:underline">
                политикой обработки персональных данных
            </a>
        </span>
                        </label>
                    </div>

                    <button type="submit"
                            class="btn btn-lg btn-sky !text-white !bg-[#5eb9f0] border-[#5eb9f0] hover:text-white hover:!bg-[#5eb9f0] hover:!border-[#5eb9f0] focus:shadow-[rgba(88,167,216,1)] active:text-white active:!bg-[#5eb9f0] active:border-[#5eb9f0] disabled:text-white disabled:!bg-[#5eb9f0] disabled:border-[#5eb9f0]  !rounded-[50rem] !mr-2">
                        Отправить сообщение
                    </button>
                </form>

            </div>

        </div>

    </div>
</section>

@endsection
