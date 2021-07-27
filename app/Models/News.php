<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query->whereHas('category', fn ($query) =>
            $query->where('slug', $category)
        )
    );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('name', 'like', '%' . $author . '%')
            )
        );
    }

    public static function getSimilarNews($news)
    {
        $similarNews = News::where('category_id', '=', $news->category_id)->where('id', '!=', $news->id)->with(['category', 'comments','author'])->get();
        $News = collect($similarNews);
        if ($similarNews->count() < 2) {
            $News =[...$News,...News::with(['category', 'comments','author'])->latest()->skip(1)->where('id', '!=', $news->id)->take(2 - $similarNews->count())->get()];
        }
        return $News;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
