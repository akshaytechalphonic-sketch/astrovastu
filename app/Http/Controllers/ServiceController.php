<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Faq;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $activeSlug = $request->query('category');
        $categories = ServiceCategory::orderBy('sort_order')->get();
        
        $activeCategory = null;
        if ($activeSlug) {
            $activeCategory = $categories->where('slug', $activeSlug)->first();
        }
        
        if (!$activeCategory && $categories->count() > 0) {
            $activeCategory = $categories->first();
        }

        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        $faqs = Faq::orderBy('sort_order')->get();

        return view('services', compact('categories', 'activeCategory', 'services', 'faqs'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        
        // Fetch related services (in same category, excluding current one)
        $relatedServices = Service::where('category_id', $service->category_id)
            ->where('id', '!=', $service->id)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('service-detail', compact('service', 'relatedServices'));
    }
}
