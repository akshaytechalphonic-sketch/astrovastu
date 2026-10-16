<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $newInquiriesCount = Inquiry::where('status', 'New')->count();
        $totalInquiriesCount = Inquiry::count();
        $servicesCount = Service::count();
        $blogsCount = Blog::count();
        $testimonialsCount = Testimonial::count();
        $galleryCount = GalleryItem::count();

        $recentInquiries = Inquiry::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'newInquiriesCount',
            'totalInquiriesCount',
            'servicesCount',
            'blogsCount',
            'testimonialsCount',
            'galleryCount',
            'recentInquiries'
        ));
    }
}
