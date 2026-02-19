@extends('layouts.app')
@section('content')
        @include('layouts.partials.banner')
        <!-- /section with hero-block -->

        @include('layouts.partials.services', ['services' => $services])
        <!-- /section service cards-->

        @include('layouts.partials.projects', ['projects' => $projects])
        <!-- /section project cards-->

        @include('layouts.partials.articles', ['articles' => $articles])
        <!-- /section article cards-->

        @include('layouts.partials.steps')
        <!-- /section with 3 steps -->
@endsection
