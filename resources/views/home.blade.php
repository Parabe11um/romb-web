@extends('layouts.app')
@section('content')

    <div class="grow shrink-0">
        @include('layouts.partials.header')
        <!-- /header -->

        @include('layouts.partials.banner')
        <!-- /section with hero-block -->

        @include('layouts.partials.services')
        <!-- /section service cards-->

        @include('layouts.partials.steps')
        <!-- /section with 3 steps -->
    </div>

@endsection
