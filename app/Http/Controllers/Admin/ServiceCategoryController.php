<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::orderBy('sort_order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $defaultSeoTemplate = '<!-- Meta Tags -->
<title>Best Astrology, Vastu & Online Pooja Services | Astro Vastu Pooja</title>

<meta name="description" content="Astro Vastu Pooja offers expert astrology consultations, Vastu solutions, online pooja services, horoscope analysis, kundli matching, and spiritual remedies to bring peace, prosperity, and positive energy into your life.">

<meta name="keywords" content="Astrology Services, Vastu Consultant, Online Pooja, Astro Vastu Pooja, Kundli Matching, Horoscope Reading, Vastu Shastra, Spiritual Remedies, Pandit for Pooja, Astrology Consultation">

<meta name="robots" content="index, follow, max-image-preview:large">

<link rel="canonical" href="https://astrovastupooja.com/">

<!-- Open Graph -->
<meta property="og:title" content="Best Astrology, Vastu & Online Pooja Services | Astro Vastu Pooja">
<meta property="og:description" content="Get expert astrology guidance, Vastu consultation, online pooja services, kundli analysis, and spiritual remedies from Astro Vastu Pooja.">
<meta property="og:url" content="https://astrovastupooja.com/">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Astro Vastu Pooja">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Best Astrology, Vastu & Online Pooja Services | Astro Vastu Pooja">
<meta name="twitter:description" content="Expert astrology consultation, Vastu guidance, online pooja services, kundli matching, and spiritual remedies.">

<!-- Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "Astro Vastu Pooja",
  "url": "https://astrovastupooja.com/",
  "description": "Astro Vastu Pooja provides professional astrology consultations, Vastu guidance, online pooja services, horoscope reading, kundli matching, and spiritual solutions.",
  "serviceType": [
    "Astrology Consultation",
    "Vastu Consultation",
    "Online Pooja Services",
    "Horoscope Reading",
    "Kundli Matching"
  ],
  "provider": {
    "@type": "Organization",
    "name": "Astro Vastu Pooja",
    "url": "https://astrovastupooja.com/"
  }
}
</script>';

        return view('admin.categories.create', compact('defaultSeoTemplate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'NameHindi' => 'nullable|string|max:255',
            'Slug' => 'nullable|string|unique:service_categories,slug|max:255',
            'Icon' => 'required|string|max:50',
            'ColorClass' => 'required|string|max:50',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $slug = $request->input('Slug') ? Str::slug($request->input('Slug')) : Str::slug($request->input('Name'));
        
        $originalSlug = $slug;
        $count = 1;
        while (ServiceCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('categories', 'public');
        }

        ServiceCategory::create([
            'name' => $request->input('Name'),
            'name_hindi' => $request->input('NameHindi'),
            'slug' => $slug,
            'icon' => $request->input('Icon'),
            'color_class' => $request->input('ColorClass'),
            'seo_tags' => $request->input('SeoTags'),
            'image' => $imagePath,
            'alt_image' => $request->input('AltImage'),
            'sort_order' => ServiceCategory::max('sort_order') + 1,
        ]);

        Cache::forget('service_categories');

        return redirect()->route('admin.categories.index')->with('success', 'Service category created successfully.');
    }

    public function edit($id)
    {
        $category = ServiceCategory::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ServiceCategory::findOrFail($id);

        $request->validate([
            'Name' => 'required|string|max:255',
            'NameHindi' => 'nullable|string|max:255',
            'Slug' => 'required|string|unique:service_categories,slug,' . $id . '|max:255',
            'Icon' => 'required|string|max:50',
            'ColorClass' => 'required|string|max:50',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $category->image;
        if ($request->hasFile('Image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('Image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->input('Name'),
            'name_hindi' => $request->input('NameHindi'),
            'slug' => Str::slug($request->input('Slug')),
            'icon' => $request->input('Icon'),
            'color_class' => $request->input('ColorClass'),
            'seo_tags' => $request->input('SeoTags'),
            'image' => $imagePath,
            'alt_image' => $request->input('AltImage'),
        ]);

        Cache::forget('service_categories');

        return redirect()->route('admin.categories.index')->with('success', 'Service category updated successfully.');
    }

    public function destroy($id)
    {
        $category = ServiceCategory::findOrFail($id);
        
        if ($category->services()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'Cannot delete category because it has active services associated with it.');
        }

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();
        Cache::forget('service_categories');

        return redirect()->route('admin.categories.index')->with('success', 'Service category deleted successfully.');
    }
}
