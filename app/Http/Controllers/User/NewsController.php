<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // Get the category filter from the query string (?category=sports)
        $categoryName = $request->query('category');

        // Base query: fetch news with their category
        $query = News::with('category')
            ->where('is_published', true); // Show only published news

        // If a category filter is applied, filter by category name
        if ($categoryName) {
            $query->whereHas('category', function ($q) use ($categoryName) {
                $q->where('name', $categoryName);
            });
        }

        // Paginate results (10 per page)
        $news = $query->orderBy('created_at', 'desc')->paginate(10);

        // Get all categories for dropdown filter
        $categories = Category::all();

        return view('user.news.index', compact('news', 'categories', 'categoryName'));
    }

    public function show($id)
    {
        $news = News::with(['category', 'comments.user'])
            ->findOrFail($id);

        // If logged in, order the current user's comments first
        if (auth()->check()) {
            $news->setRelation('comments', $news->comments->sortByDesc(function ($comment) {
                return $comment->user_id == auth()->id() ? 1 : 0;
            }));
        }

        return view('user.news.show', compact('news'));
    }



}
