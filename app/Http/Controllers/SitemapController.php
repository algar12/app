<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        // Get all published posts
        $posts = Post::published()
            ->orderBy('updated_at', 'desc')
            ->get();

        // Get all categories
        $categories = Category::all();

        // Create XML content
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Homepage
        $xml .= '<url>';
        $xml .= '<loc>' . url('/') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';

        // Blog Index
        $xml .= '<url>';
        $xml .= '<loc>' . route('posts.index') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>0.9</priority>';
        $xml .= '</url>';

        // All published posts
        foreach ($posts as $post) {
            $xml .= '<url>';
            $xml .= '<loc>' . route('posts.show', $post->slug) . '</loc>';
            $xml .= '<lastmod>' . $post->updated_at->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

        // All categories
        foreach ($categories as $category) {
            $xml .= '<url>';
            $xml .= '<loc>' . route('posts.category', $category->slug) . '</loc>';
            $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.7</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        // Clear output buffer to remove any accidental whitespace/newlines from other files
        if (ob_get_length()) {
            ob_clean();
        }

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
