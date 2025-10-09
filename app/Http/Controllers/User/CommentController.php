<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $newsId)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $news = News::findOrFail($newsId);

        $news->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Only allow the owner of the comment to delete
        if ($comment->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

}
