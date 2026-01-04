<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of news
     */
    public function index()
    {
        try {
            $news = News::orderBy('publish_date', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'message' => 'News retrieved successfully',
                'data' => $news,
                'count' => $news->count()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve news',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created news
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'topic' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|string|max:255',
                'publish_date' => 'nullable|date',
                'author' => 'nullable|string|max:255',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $news = News::create([
                'topic' => $request->topic,
                'description' => $request->description,
                'image' => $request->image,
                'publish_date' => $request->publish_date ?? now(),
                'author' => $request->author,
                'status' => $request->status ?? true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'News created successfully',
                'data' => $news
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create news',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified news
     */
    public function show($id)
    {
        try {
            $news = News::find($id);

            if (!$news) {
                return response()->json([
                    'success' => false,
                    'message' => 'News not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'News retrieved successfully',
                'data' => $news
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve news',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified news
     */
    public function update(Request $request, $id)
    {
        try {
            $news = News::find($id);

            if (!$news) {
                return response()->json([
                    'success' => false,
                    'message' => 'News not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'topic' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'image' => 'sometimes|required|string|max:255',
                'publish_date' => 'nullable|date',
                'author' => 'nullable|string|max:255',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $news->update($request->only([
                'topic',
                'description',
                'image',
                'publish_date',
                'author',
                'status'
            ]));

            return response()->json([
                'success' => true,
                'message' => 'News updated successfully',
                'data' => $news->fresh()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update news',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified news
     */
    public function destroy($id)
    {
        try {
            $news = News::find($id);

            if (!$news) {
                return response()->json([
                    'success' => false,
                    'message' => 'News not found'
                ], 404);
            }

            $newsTopic = $news->topic;
            $news->delete();

            return response()->json([
                'success' => true,
                'message' => "News '{$newsTopic}' deleted successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete news',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}