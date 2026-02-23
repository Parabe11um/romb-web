@extends('layouts.app')

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
                            <p>London, United Kingdom</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="text-[#3f78e0] text-xl mt-1">📞</div>
                        <div>
                            <h5 class="font-semibold text-[#343f52] mb-1">Телефон</h5>
                            <p>+44 00 0000 0000</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="text-[#3f78e0] text-xl mt-1">✉️</div>
                        <div>
                            <h5 class="font-semibold text-[#343f52] mb-1">Email</h5>
                            <p>hello@romb-web.com</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Правая колонка — форма --}}
            <div class="bg-[#edf2fc] rounded-2xl p-10 shadow-sm">

                <h3 class="text-2xl font-bold mb-6 text-[#343f52]">
                    Напишите нам
                </h3>

                <form method="POST" action="/" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium mb-2 text-[#343f52]">
                            Имя
                        </label>
                        <input type="text" name="name"
                               class="w-full rounded-lg border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3f78e0]/30">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2 text-[#343f52]">
                            Email
                        </label>
                        <input type="email" name="email"
                               class="w-full rounded-lg border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3f78e0]/30">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2 text-[#343f52]">
                            Сообщение
                        </label>
                        <textarea name="message" rows="4"
                                  class="w-full rounded-lg border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3f78e0]/30"></textarea>
                    </div>

                    <button type="submit"
                            class="w-full px-8 py-3 bg-[#5eb9f0] text-white rounded-full font-medium hover:shadow-lg transition">
                        Отправить сообщение
                    </button>

                </form>

            </div>

        </div>

    </div>
</section>

@endsection
