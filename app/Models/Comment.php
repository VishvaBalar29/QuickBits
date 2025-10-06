<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\News;

class Comment extends Model
{
    protected $fillable = [
        'news_id',
        'user_id',
        'comment',
    ];

    // Relationship: Comment belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relationship: Comment belongs to news
    public function news() {
        return $this->belongsTo(News::class);
    }
}
