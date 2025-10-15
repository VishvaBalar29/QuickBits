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
        $categoryName = $request->query('category');
        $query = News::with('category')
            ->where('is_published', true); 
        if ($categoryName) {
            $query->whereHas('category', function ($q) use ($categoryName) {
                $q->where('name', $categoryName);
            });
        }
        $news = $query->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();

        return view('user.news.index', compact('news', 'categories', 'categoryName'));
    }

    public function show($id)
    {
        $news = News::with(['category', 'comments.user'])
            ->findOrFail($id);
        if (auth()->check()) {
            $news->setRelation('comments', $news->comments->sortByDesc(function ($comment) {
                return $comment->user_id == auth()->id() ? 1 : 0;
            }));
        }

        return view('user.news.show', compact('news'));
    }



}
