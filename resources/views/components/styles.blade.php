<link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@stack('styles')
@if(isset($settings->custom_css) && !empty($settings->custom_css))
    <style>
        {!! $settings->custom_css !!}
    </style>
@endif
