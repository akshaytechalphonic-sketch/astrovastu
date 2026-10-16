<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ClientName' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'Quote' => 'required|string',
            'Initials' => 'required|string|max:4',
            'AvatarColor' => 'required|string|max:50',
            'Rating' => 'required|integer|min:1|max:5',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('testimonials', 'public');
        }

        Testimonial::create([
            'client_name' => $request->input('ClientName'),
            'location' => $request->input('Location'),
            'quote' => $request->input('Quote'),
            'initials' => $request->input('Initials'),
            'avatar_color' => $request->input('AvatarColor'),
            'rating' => $request->input('Rating'),
            'alt_image' => $request->input('AltImage'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'ClientName' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'Quote' => 'required|string',
            'Initials' => 'required|string|max:4',
            'AvatarColor' => 'required|string|max:50',
            'Rating' => 'required|integer|min:1|max:5',
            'AltImage' => 'nullable|string|max:255',
            'Image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $testimonial->image;
        if ($request->hasFile('Image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('Image')->store('testimonials', 'public');
        }

        $testimonial->update([
            'client_name' => $request->input('ClientName'),
            'location' => $request->input('Location'),
            'quote' => $request->input('Quote'),
            'initials' => $request->input('Initials'),
            'avatar_color' => $request->input('AvatarColor'),
            'rating' => $request->input('Rating'),
            'alt_image' => $request->input('AltImage'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
