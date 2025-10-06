<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;

class News extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'short_desc',
        'image',
        'is_published',
    ];

    // Relationship: News belongs to a category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Relationship: News has many comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
