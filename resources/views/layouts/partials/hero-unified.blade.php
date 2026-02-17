<section class="wrapper bg-[#edf2fc]">
    <div class="container
                py-16 md:h-[360px]
                md:flex md:items-center md:justify-center
                text-center">

        <div class="max-w-2xl mx-auto">

            {{-- Label --}}
            @isset($heroLabel)
                <div class="uppercase tracking-[0.08em] text-xs text-[#aab0bc] mb-3">
                    {{ $heroLabel }}
                </div>
            @endisset

            {{-- Title --}}
            <h1 class="text-3xl md:text-4xl font-bold text-[#343f52] mb-4 leading-tight">
                {{ $heroTitle }}
            </h1>

            {{-- Subtitle --}}
            @if(!empty($heroSubtitle))
                <p class="text-[#60697b] text-base md:text-lg leading-relaxed mb-4">
                    {{ $heroSubtitle }}
                </p>
            @endif

            {{-- Breadcrumbs --}}
            @if(isset($breadcrumbs))
                <div class="flex justify-center">
                    @include('layouts.partials.breadcrumbs')
                </div>
            @endif

            {{-- Buttons --}}
            @isset($heroButtons)
                <div class="flex justify-center gap-4 mt-6 flex-wrap">
                    {!! $heroButtons !!}
                </div>
            @endisset

        </div>
    </div>
</section>
