@stack('scripts')
@if(isset($settings->custom_js) && !empty($settings->custom_js))
    <script>
        {!! $settings->custom_js !!}
    </script>
@endif
@if(isset($settings->analytics_code) && !empty($settings->analytics_code))
    {!! $settings->analytics_code !!}
@endif
