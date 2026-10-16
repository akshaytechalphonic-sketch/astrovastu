<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share Settings with all views using caching
        $settings = \Illuminate\Support\Facades\Cache::remember('site_settings', 86400, function () {
            return \App\Models\Setting::first() ?? new \App\Models\Setting();
        });
        \Illuminate\Support\Facades\View::share('settings', $settings);

        // Share service categories
        $serviceCategories = \Illuminate\Support\Facades\Cache::remember('service_categories', 86400, function () {
            return \App\Models\ServiceCategory::orderBy('sort_order')->get();
        });
        \Illuminate\Support\Facades\View::share('serviceCategories', $serviceCategories);

        // Share page-specific banners
        $pageBanners = \Illuminate\Support\Facades\Cache::remember('page_banners', 86400, function () {
            return \App\Models\Banner::where('page_slug', '!=', 'home')->get()->keyBy('page_slug');
        });
        \Illuminate\Support\Facades\View::share('pageBanners', $pageBanners);
    }
}
