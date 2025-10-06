<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    // Relationship: A category has many news
    public function news() {
        return $this->hasMany(News::class);
    }
}
