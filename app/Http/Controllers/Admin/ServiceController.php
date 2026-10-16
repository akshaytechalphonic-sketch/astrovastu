<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::orderBy('sort_order')->get();
        
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

        return view('admin.services.create', compact('categories', 'defaultSeoTemplate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'TitleHindi' => 'nullable|string|max:255',
            'Slug' => 'nullable|string|unique:services,slug|max:255',
            'ServiceCategoryId' => 'required|exists:service_categories,id',
            'Icon' => 'required|string|max:50',
            'ColorClass' => 'required|string|max:50',
            'ShortDescription' => 'nullable|string|max:500',
            'FullDescription' => 'nullable|string',
            'IsActive' => 'nullable|boolean',
            'ShowOnHome' => 'nullable|boolean',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $slug = $request->input('Slug') ? Str::slug($request->input('Slug')) : Str::slug($request->input('Title'));
        
        // Ensure slug is unique
        $originalSlug = $slug;
        $count = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('services', 'public');
        }

        Service::create([
            'category_id' => $request->input('ServiceCategoryId'),
            'title' => $request->input('Title'),
            'title_hindi' => $request->input('TitleHindi'),
            'slug' => $slug,
            'icon' => $request->input('Icon'),
            'color_class' => $request->input('ColorClass'),
            'short_description' => $request->input('ShortDescription'),
            'full_description' => $request->input('FullDescription'),
            'is_active' => $request->has('IsActive'),
            'show_on_home' => $request->has('ShowOnHome'),
            'alt_image' => $request->input('AltImage'),
            'image' => $imagePath,
            'seo_tags' => $request->input('SeoTags'),
            'sort_order' => Service::max('sort_order') + 1,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = ServiceCategory::orderBy('sort_order')->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'Title' => 'required|string|max:255',
            'TitleHindi' => 'nullable|string|max:255',
            'Slug' => 'required|string|unique:services,slug,' . $id . '|max:255',
            'ServiceCategoryId' => 'required|exists:service_categories,id',
            'Icon' => 'required|string|max:50',
            'ColorClass' => 'required|string|max:50',
            'ShortDescription' => 'nullable|string|max:500',
            'FullDescription' => 'nullable|string',
            'IsActive' => 'nullable|boolean',
            'ShowOnHome' => 'nullable|boolean',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $service->image;
        if ($request->hasFile('Image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('Image')->store('services', 'public');
        }

        $service->update([
            'category_id' => $request->input('ServiceCategoryId'),
            'title' => $request->input('Title'),
            'title_hindi' => $request->input('TitleHindi'),
            'slug' => Str::slug($request->input('Slug')),
            'icon' => $request->input('Icon'),
            'color_class' => $request->input('ColorClass'),
            'short_description' => $request->input('ShortDescription'),
            'full_description' => $request->input('FullDescription'),
            'is_active' => $request->has('IsActive'),
            'show_on_home' => $request->has('ShowOnHome'),
            'alt_image' => $request->input('AltImage'),
            'image' => $imagePath,
            'seo_tags' => $request->input('SeoTags'),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
