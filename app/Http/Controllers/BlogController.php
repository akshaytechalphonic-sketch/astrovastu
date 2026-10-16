<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $catFilter = $request->query('category');
        $query = Blog::orderBy('published_at', 'desc');

        if ($catFilter) {
            $query->where('category', 'like', $catFilter);
        }

        $posts = $query->paginate(6);

        return view('blog', compact('posts', 'catFilter'));
    }

    public function show($slug)
    {
        $post = Blog::where('slug', $slug)->firstOrFail();
        
        // Eager increment view count
        $post->increment('view_count');

        $recentPosts = Blog::where('id', '!=', $post->id)->orderBy('published_at', 'desc')->take(3)->get();

        return view('blog-detail', compact('post', 'recentPosts'));
    }
}
