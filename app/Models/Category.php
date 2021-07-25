<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function newsCount()
    {
        return Category::withCount('news')->get()->map(fn ($category) => ['id' => $category->id, 'name' => $category->name, 'count' => $category->news_count]);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
