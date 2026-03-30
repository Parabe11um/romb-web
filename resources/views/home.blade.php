@extends('layouts.app')


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
