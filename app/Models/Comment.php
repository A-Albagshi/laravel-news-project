<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public static function countComments()
    {

        return collect([
            ['name' => 'Visible Comments', 'count' => Comment::where('is_visible', true)->count()],
            ['name' => 'Hidden Comments', 'count' => Comment::where('is_visible', false)->count()]
        ]);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
