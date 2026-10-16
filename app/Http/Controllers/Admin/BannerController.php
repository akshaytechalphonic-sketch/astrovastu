<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id', 'asc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'LinkUrl' => 'nullable|string|max:255',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'required|image|max:2048',
            'PageSlug' => 'required|string|max:100',
            'Heading' => 'nullable|string|max:255',
            'Description' => 'nullable|string',
        ]);

        $imagePath = $request->file('Image')->store('banners', 'public');

        // Store relative path in public format for consistency with static assets or standard URL
        $relativePublicPath = 'storage/' . $imagePath;

        Banner::create([
            'title' => $request->input('Title'),
            'image_url' => $relativePublicPath,
            'link_url' => $request->input('LinkUrl'),
            'alt_image' => $request->input('AltImage'),
            'page_slug' => $request->input('PageSlug'),
            'heading' => $request->input('Heading'),
            'description' => $request->input('Description'),
        ]);

        Cache::forget('page_banners');

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'Title' => 'required|string|max:255',
            'LinkUrl' => 'nullable|string|max:255',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
            'PageSlug' => 'required|string|max:100',
            'Heading' => 'nullable|string|max:255',
            'Description' => 'nullable|string',
        ]);

        $imagePath = $banner->image_url;
        if ($request->hasFile('Image')) {
            // Delete old storage file if it exists and was uploaded
            if (str_starts_with($imagePath, 'storage/')) {
                $actualStoragePath = substr($imagePath, 8); // remove 'storage/'
                Storage::disk('public')->delete($actualStoragePath);
            }
            $newPath = $request->file('Image')->store('banners', 'public');
            $imagePath = 'storage/' . $newPath;
        }

        $banner->update([
            'title' => $request->input('Title'),
            'image_url' => $imagePath,
            'link_url' => $request->input('LinkUrl'),
            'alt_image' => $request->input('AltImage'),
            'page_slug' => $request->input('PageSlug'),
            'heading' => $request->input('Heading'),
            'description' => $request->input('Description'),
        ]);

        Cache::forget('page_banners');

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $imagePath = $banner->image_url;
        if (str_starts_with($imagePath, 'storage/')) {
            $actualStoragePath = substr($imagePath, 8); // remove 'storage/'
            Storage::disk('public')->delete($actualStoragePath);
        }
        $banner->delete();

        Cache::forget('page_banners');

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
