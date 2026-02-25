@php
    $seoTitle = $title ?? null;
    $seoDescription = $description ?? null;
@endphp

@section('title', $seoTitle ?: config('app.name'))
@section('meta_description', $seoDescription ?: 'Создаём, развиваем и поддерживаем сайты и digital-проекты под задачи бизнеса.')
