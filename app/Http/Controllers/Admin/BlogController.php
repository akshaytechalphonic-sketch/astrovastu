<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::orderBy('published_at', 'desc')->get();
        return view('admin.blogs.index', compact('posts'));
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

        return view('admin.blogs.create', compact('defaultSeoTemplate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'Slug' => 'nullable|string|unique:blogs,slug|max:255',
            'Excerpt' => 'required|string|max:500',
            'Content' => 'required|string',
            'Category' => 'required|string|max:100',
            'ThumbIcon' => 'nullable|string|max:50',
            'ThumbGradient' => 'nullable|string|max:100',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $slug = $request->input('Slug') ? Str::slug($request->input('Slug')) : Str::slug($request->input('Title'));
        
        // Ensure slug is unique
        $originalSlug = $slug;
        $count = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('blogs', 'public');
        }

        Blog::create([
            'title' => $request->input('Title'),
            'slug' => $slug,
            'excerpt' => $request->input('Excerpt'),
            'content' => $request->input('Content'),
            'category' => $request->input('Category'),
            'thumb_icon' => $request->input('ThumbIcon') ?: '🔮',
            'thumb_gradient' => $request->input('ThumbGradient') ?: 'saffron-mist,gold-pale',
            'alt_image' => $request->input('AltImage'),
            'image' => $imagePath,
            'seo_tags' => $request->input('SeoTags'),
            'published_at' => now(),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function edit($id)
    {
        $post = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Blog::findOrFail($id);

        $request->validate([
            'Title' => 'required|string|max:255',
            'Slug' => 'required|string|unique:blogs,slug,' . $id . '|max:255',
            'Excerpt' => 'required|string|max:500',
            'Content' => 'required|string',
            'Category' => 'required|string|max:100',
            'ThumbIcon' => 'nullable|string|max:50',
            'ThumbGradient' => 'nullable|string|max:100',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $post->image;
        if ($request->hasFile('Image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('Image')->store('blogs', 'public');
        }

        $post->update([
            'title' => $request->input('Title'),
            'slug' => Str::slug($request->input('Slug')),
            'excerpt' => $request->input('Excerpt'),
            'content' => $request->input('Content'),
            'category' => $request->input('Category'),
            'thumb_icon' => $request->input('ThumbIcon') ?: '🔮',
            'thumb_gradient' => $request->input('ThumbGradient') ?: 'saffron-mist,gold-pale',
            'alt_image' => $request->input('AltImage'),
            'image' => $imagePath,
            'seo_tags' => $request->input('SeoTags'),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
