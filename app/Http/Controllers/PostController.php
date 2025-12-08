<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // dd(Category::all());
        $categories = Cache::remember('categories', now()->addDays(3), function () {
            return Category::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
        });

        // dd($categories);
        return view(
            'posts.index',
            [
                'categories' => $categories
            ]
        );
    }

    public function show(Post $post)
    {
        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cari post berdasarkan title atau body yang mengandung kata kunci
        $posts = Cache::remember("search_results_{$query}", 60, function () use ($query) {
            return Post::where('title', 'like', "%{$query}%")
                ->orWhere('body', 'like', "%{$query}%")
                ->latest()
                ->paginate(10);
        });

        return view('posts.search', compact('posts', 'query'));
    }

    public function showByCategory(Category $category)
    {
        $posts = Cache::remember("category_{$category->slug}_posts", 60, function () use ($category) {
            return $category->posts()
                ->published()
                ->latest('published_at')
                ->paginate(12);
        });

        return view('posts.category', compact('category', 'posts'));
    }

}