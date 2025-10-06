<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        // Sports news
        News::create([
            'title' => 'India beats Australia in thrilling Cricket Test',
            'category_id' => 2, // Sports
            'short_desc' => 'In an exhilarating match that kept fans on the edge of their seats, India defeated Australia by 7 wickets in the third Test. The team displayed exceptional performance with both bat and ball, securing a decisive series win. Key players contributed crucial runs and wickets, making this victory a memorable one for cricket enthusiasts across the country.',
            'image' => 'india-australia.jpg',
            'is_published' => true
        ]);

        // Technology news
        News::create([
            'title' => 'New AI Tool Promises Faster Coding Assistance',
            'category_id' => 3, // Technology
            'short_desc' => 'A revolutionary AI-powered coding tool has been released, designed to help developers write code faster and more efficiently. It offers intelligent suggestions, automated code completion, and debugging assistance. Early testers report significant reductions in development time, improved code quality, and a smoother workflow. The tool is expected to transform software development practices in the coming months.',
            'image' => 'ai-tool.jpg',
            'is_published' => true
        ]);

        // Politics news
        News::create([
            'title' => 'Parliament Approves New Digital Regulation Bill',
            'category_id' => 1, // Politics
            'short_desc' => 'The parliament has passed a comprehensive digital regulation bill aimed at enhancing online safety and data protection. The legislation introduces new guidelines for social media platforms, stricter data privacy rules, and measures to curb cybercrime. Lawmakers believe the bill will provide citizens with better security while promoting responsible use of digital technology. Experts say implementation will be key to its success.',
            'image' => 'parliament.jpg',
            'is_published' => true
        ]);

        // Entertainment news
        News::create([
            'title' => 'Famous Actor Announces Highly Anticipated New Movie',
            'category_id' => 4, // Entertainment
            'short_desc' => 'Fans were thrilled as the renowned actor officially announced the release of their upcoming movie. The film promises an engaging storyline, impressive performances, and high-quality production values. The announcement included a teaser poster and the official release date, generating excitement across social media. Industry insiders predict the movie will become a major hit, attracting audiences nationwide and internationally.',
            'image' => 'movie-release.jpg',
            'is_published' => true
        ]);
    }
}
