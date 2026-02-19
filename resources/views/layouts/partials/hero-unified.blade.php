@php
    $heroImage = $heroImage ?? null;
    $hasImage = !empty($heroImage);
@endphp


<section class="relative w-full min-h-[380px] md:min-h-[420px] flex items-center
    {{ $hasImage ? '' : 'bg-[#edf2fc]' }}">

    {{-- Background --}}
    @if($hasImage)
        <div class="absolute inset-0">
            <img src="{{ asset('storage/' . $heroImage) }}"
                 class="w-full h-full object-cover"
                 alt="">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
    @else
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-32 -left-32 w-[520px] h-[520px]
                bg-[#3f78e0]/30 rounded-full blur-[120px]"></div>
            <div class="absolute -bottom-32 -right-32 w-[520px] h-[520px]
                bg-[#5eb9f0]/30 rounded-full blur-[120px]"></div>
        </div>
    @endif

    {{-- Content --}}
    <div class="relative container py-24 md:py-32 text-center">

        <div class="max-w-2xl mx-auto">

            @if(!empty($breadcrumbs))
                <div class="mb-6 text-sm
                {{ $hasImage ? 'text-white/80' : 'text-[#60697b]' }}">
                    @include('layouts.partials.breadcrumbs', [
                        'breadcrumbs' => $breadcrumbs
                    ])
                </div>
            @endif


            <h1 class="text-3xl md:text-4xl font-bold mb-4
                {{ $hasImage ? 'text-white' : 'text-[#343f52]' }}">
                {{ $heroTitle }}
            </h1>

            @if(!empty($heroSubtitle))
                <p class="text-base md:text-lg mb-6
                    {{ $hasImage ? 'text-white/90' : 'text-[#60697b]' }}">
                    {{ $heroSubtitle }}
                </p>
            @endif

                @isset($heroButtons)
                    <div class="mt-6 flex justify-center gap-4 flex-wrap">
                        {!! $heroButtons !!}
                    </div>
                @endisset

        </div>
    </div>
</section>
