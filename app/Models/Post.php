<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Bootstrap the model and its traits.
     * Clear homepage cache when posts are created, updated, or deleted.
     */
    protected static function boot()
    {
        parent::boot();

        // Clear homepage cache when post is saved (created or updated)
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('featuredPosts');
            \Illuminate\Support\Facades\Cache::forget('latestPosts');
        });

        // Clear homepage cache when post is deleted
        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('featuredPosts');
            \Illuminate\Support\Facades\Cache::forget('latestPosts');
        });
    }

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'body',
        'published_at',
        'featured',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }


    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function scopePopular($query)
    {
        $query->withCount('likes')
            ->orderBy("likes_count", 'desc');
    }

    public function scopeSearch($query, string $search = '')
    {
        $query->where('title', 'like', "%{$search}%");
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getReadingTime()
    {
        $mins = round(str_word_count($this->body) / 250);

        return ($mins < 1) ? 1 : $mins;
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        // Jika URL sudah ada (mungkin file sudah diupload), kembalikan URL tersebut
        if ($isUrl) {
            return $this->image;
        }

        // Jika file ada di local storage, kembalikan URL dari public disk
        return url(Storage::disk('public')->url($this->image));
    }
}