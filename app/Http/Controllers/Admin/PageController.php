<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('id', 'asc')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'Slug' => 'required|string|max:255|unique:pages,slug',
            'SeoTags' => 'nullable|string',
        ]);

        $page = Page::create([
            'title' => $request->input('Title'),
            'slug' => Str::slug($request->input('Slug')),
            'seo_tags' => $request->input('SeoTags'),
        ]);

        return redirect()->route('admin.pages.edit', $page->id)->with('success', 'Page created successfully. Now you can add sections.');
    }

    public function edit($id)
    {
        $page = Page::with('sections')->findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'Title' => 'required|string|max:255',
            'Slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'SeoTags' => 'nullable|string',
            'sections' => 'nullable|array',
            'sections.*.type' => 'required|string',
            'sections.*.title' => 'nullable|string|max:255',
            'sections.*.subtitle' => 'nullable|string|max:255',
            'sections.*.content' => 'nullable|string',
            'sections.*.button_text' => 'nullable|string|max:255',
            'sections.*.button_link' => 'nullable|string|max:255',
            'sections.*.sort_order' => 'required|integer',
            'sections.*.image_position' => 'nullable|string|in:left,right,center',
        ]);

        $page->update([
            'title' => $request->input('Title'),
            'slug' => Str::slug($request->input('Slug')),
            'seo_tags' => $request->input('SeoTags'),
        ]);

        $updatedSectionIds = [];
        $sectionsData = $request->input('sections', []);
        $sectionsFiles = $request->file('sections', []);

        foreach ($sectionsData as $index => $secData) {
            $sectionId = $secData['id'] ?? null;

            // Handle file upload
            $imageUrl = $secData['existing_image_url'] ?? null;
            if (isset($sectionsFiles[$index]['image']) && $sectionsFiles[$index]['image']->isValid()) {
                // Delete old image if exists
                if ($imageUrl && str_starts_with($imageUrl, 'storage/')) {
                    Storage::disk('public')->delete(substr($imageUrl, 8));
                }
                $path = $sectionsFiles[$index]['image']->store('sections', 'public');
                $imageUrl = 'storage/' . $path;
            }

            $data = [
                'type' => $secData['type'],
                'title' => $secData['title'] ?? null,
                'subtitle' => $secData['subtitle'] ?? null,
                'content' => $secData['content'] ?? null,
                'image_url' => $imageUrl,
                'image_position' => $secData['image_position'] ?? 'center',
                'button_text' => $secData['button_text'] ?? null,
                'button_link' => $secData['button_link'] ?? null,
                'sort_order' => intval($secData['sort_order'] ?? 0),
            ];

            if ($sectionId) {
                $section = Section::findOrFail($sectionId);
                $section->update($data);
                $updatedSectionIds[] = $section->id;
            } else {
                $section = $page->sections()->create($data);
                $updatedSectionIds[] = $section->id;
            }
        }

        // Delete sections that were removed
        $sectionsToDelete = $page->sections()->whereNotIn('id', $updatedSectionIds)->get();
        foreach ($sectionsToDelete as $sectionToDelete) {
            if ($sectionToDelete->image_url && str_starts_with($sectionToDelete->image_url, 'storage/')) {
                Storage::disk('public')->delete(substr($sectionToDelete->image_url, 8));
            }
            $sectionToDelete->delete();
        }

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        // Delete section images
        foreach ($page->sections as $section) {
            if ($section->image_url && str_starts_with($section->image_url, 'storage/')) {
                Storage::disk('public')->delete(substr($section->image_url, 8));
            }
        }

        $page->delete(); // Cascades deletes sections automatically due to constrained foreign key onDelete cascade

        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully.');
    }
}
