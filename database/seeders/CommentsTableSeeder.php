<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        Comment::create([
            'news_id' => 1,
            'user_id' => 2, // John
            'comment' => 'Great news summary!'
        ]);

        Comment::create([
            'news_id' => 2,
            'user_id' => 2,
            'comment' => 'Interesting update!'
        ]);
    }
}
