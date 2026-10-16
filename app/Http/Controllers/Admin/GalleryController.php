<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::orderBy('sort_order')->get();
        return view('admin.gallery.index', compact('galleryItems'));
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

        return view('admin.gallery.create', compact('defaultSeoTemplate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'Icon' => 'nullable|string|max:50',
            'GradientColors' => 'nullable|string|max:100',
            'Category' => 'required|string|max:100',
            'IsSpan2' => 'nullable|boolean',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('gallery', 'public');
        }

        GalleryItem::create([
            'title' => $request->input('Title'),
            'icon' => $request->input('Icon') ?: '🙏',
            'gradient_colors' => $request->input('GradientColors') ?: 'saffron-mist,teal-mist',
            'category' => $request->input('Category'),
            'is_span2' => $request->has('IsSpan2'),
            'alt_image' => $request->input('AltImage'),
            'image' => $imagePath,
            'seo_tags' => $request->input('SeoTags'),
            'sort_order' => GalleryItem::max('sort_order') + 1,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item created successfully.');
    }

    public function edit($id)
    {
        $item = GalleryItem::findOrFail($id);
        return view('admin.gallery.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = GalleryItem::findOrFail($id);

        $request->validate([
            'Title' => 'required|string|max:255',
            'Icon' => 'nullable|string|max:50',
            'GradientColors' => 'nullable|string|max:100',
            'Category' => 'required|string|max:100',
            'IsSpan2' => 'nullable|boolean',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $item->image;
        if ($request->hasFile('Image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('Image')->store('gallery', 'public');
        }

        $item->update([
            'title' => $request->input('Title'),
            'icon' => $request->input('Icon') ?: '🙏',
            'gradient_colors' => $request->input('GradientColors') ?: 'saffron-mist,teal-mist',
            'category' => $request->input('Category'),
            'is_span2' => $request->has('IsSpan2'),
            'alt_image' => $request->input('AltImage'),
            'image' => $imagePath,
            'seo_tags' => $request->input('SeoTags'),
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy($id)
    {
        $item = GalleryItem::findOrFail($id);
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item deleted successfully.');
    }
}
