<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @hasSection('seo_tags')
        @yield('seo_tags')
    @else
        {!! $settings->seo_tags ?? '' !!}
    @endif

    @include('components.styles')
</head>
<body>
    
    @include('components.header')

    @yield('content')

    @include('components.footer')

    @include('components.scripts')

</body>
</html>
