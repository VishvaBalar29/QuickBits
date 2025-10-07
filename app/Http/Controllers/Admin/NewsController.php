<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    // display news
    public function index()
    {
        // Use paginate instead of get()
        $news = News::with('category')->orderBy('created_at', 'desc')->paginate(10); // 10 news per page
        return view('admin.news.index', compact('news'));
    }

    // add news
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    // add news
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $newsData = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'short_desc' => $request->short_desc,
            'is_published' => $request->is_published ? 1 : 0,
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/news'), $imageName);
            $newsData['image'] = $imageName;
        }

        News::create($newsData);

        return redirect()->route('admin.news.index')->with('success', 'News added successfully!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);      // Get the news to edit
        $categories = Category::all();       // Get all categories for the dropdown

        return view('admin.news.edit', compact('news', 'categories'));
    }

    // update news
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $news = News::findOrFail($id);

        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->short_desc = $request->short_desc;
        $news->is_published = $request->is_published ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image && file_exists(public_path('uploads/news/' . $news->image))) {
                unlink(public_path('uploads/news/' . $news->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/news'), $imageName);
            $news->image = $imageName;
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully!');
    }

    // delete news
    public function destroy($id)
    {
        // Find the news by id
        $news = News::findOrFail($id);
        // Delete the image file if exists
        if ($news->image && file_exists(public_path('uploads/news/' . $news->image))) {
            unlink(public_path('uploads/news/' . $news->image));
        }
        // Delete the news record
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully!');
    }

}
