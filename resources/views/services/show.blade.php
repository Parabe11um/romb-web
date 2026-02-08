@extends('layouts.app')

@section('content')
    <section class="wrapper !bg-[#edf2fc]">
        <div class="container pt-20 pb-32">

            <h1 class="!text-[2.4rem] font-bold !mb-6 text-center">
                {{ $service->title }}
            </h1>

            @if($service->image)
                <img
                    src="{{ asset('storage/' . $service->image) }}"
                    class="rounded-xl mx-auto mb-10"
                    alt="{{ $service->title }}">
            @endif

            <div class="prose max-w-3xl mx-auto">
                {!! $service->content !!}
            </div>

        </div>
    </section>
@endsection
