<section class="wrapper bg-gradient-sky pb-24">
    <div class="container">
        <div class="grid md:grid-cols-3 gap-16 text-center">

            @foreach($services as $i => $service)
                <div class="group" data-reveal data-delay="{{ $i * 80 }}">

                    @if($service->image)
                        <figure class="mb-8">
                            <img class="mx-auto transition duration-300 group-hover:scale-105"
                                 src="{{ asset('storage/' . $service->image) }}"
                                 alt="{{ $service->title }}">
                        </figure>
                    @endif

                    <h3 class="text-xl font-semibold text-[#343f52] mb-4">
                        {{ $service->title }}
                    </h3>

                    <p class="text-[#60697b] mb-4 leading-relaxed">
                        {{ $service->excerpt }}
                    </p>

                    <a href="{{ route('services.show', $service) }}"
                       class="text-[#3f78e0] font-medium hover:underline">
                        Подробнее →
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
