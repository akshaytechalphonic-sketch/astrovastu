<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Page;
use App\Models\Blog;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $banners = Banner::where('page_slug', 'home')->orderBy('id', 'asc')->get();
        $featuredServices = Service::where('is_active', true)->where('show_on_home', true)->orderBy('sort_order')->take(8)->get();
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        $recentBlogs = Blog::orderBy('published_at', 'desc')->take(3)->get();

        return view('index', compact('banners', 'featuredServices', 'testimonials', 'recentBlogs'));
    }


    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $page->load('sections');
        $testimonials = \App\Models\Testimonial::orderBy('id', 'asc')->get();

        return view('dynamic-page', compact('page', 'testimonials'));
    }

    public function newPage()
    {
        
        return view('astrovastupooja.index');
    }
    
    public function vastuConsultantDelhiNcr()
    {
        return view('astrovastupooja.delhi-ncr');
    }

    public function astrodhiraj(){
        return view('astrovastu-puja.index');
    }
}
