@extends('layouts.app')

@include('layouts.partials.seo', [
    'title' => 'Romb Web — разработка сайтов и digital-решений',
    'description' => 'Разработка корпоративных сайтов, интернет-магазинов и веб-приложений. Дизайн, программирование, поддержка и SEO. Работаем прозрачно и по этапам.'
])


@section('content')

    <div data-reveal="fade">
        @include('layouts.partials.banner')
    </div>

    <div data-reveal>
        @include('layouts.partials.services', ['services' => $services])
    </div>

    <div data-reveal>
        @include('layouts.partials.projects', ['projects' => $projects])
    </div>

    <div data-reveal>
        @include('layouts.partials.articles', ['articles' => $articles])
    </div>

    <div data-reveal>
        @include('layouts.partials.steps')
    </div>
@endsection
