<section class="relative w-full min-h-[380px] md:min-h-[420px] flex items-center bg-[#edf2fc] overflow-hidden">

    {{-- Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-32 -left-32 w-[520px] h-[520px]
            bg-[#3f78e0]/30 rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-32 -right-32 w-[520px] h-[520px]
            bg-[#5eb9f0]/30 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative container text-center py-12">

        <div class="max-w-2xl mx-auto">

            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#343f52]">
                Обсудим ваш проект?
            </h2>

            <p class="text-base md:text-lg mb-8 text-[#60697b]">
                Подготовим предложение с понятной структурой и этапами работ.
            </p>

            <div class="flex justify-center">
                <a href="{{ route('contacts') }}"
                   class="px-8 py-3 bg-[#5eb9f0] text-white rounded-full font-medium hover:shadow-lg transition">
                    Связаться с нами
                </a>
            </div>

        </div>

    </div>
</section>
