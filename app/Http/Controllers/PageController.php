<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function editorial()
    {
        return view('pages.editorial');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function sitemap()
    {
        $categories = \App\Models\Category::all();
        $posts = \App\Models\Post::published()->latest('published_at')->take(10)->get();

        return view('pages.sitemap', compact('categories', 'posts'));
    }
}
