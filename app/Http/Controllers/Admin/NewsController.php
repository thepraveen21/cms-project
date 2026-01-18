<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('publish_date', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
            'publish_date' => 'nullable|date',
            'author' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $validated['status'] = $request->has('status');
        $validated['publish_date'] = $validated['publish_date'] ?? now();

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News created successfully');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
            'publish_date' => 'nullable|date',
            'author' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $validated['status'] = $request->has('status');

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News updated successfully');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News deleted successfully');
    }
}