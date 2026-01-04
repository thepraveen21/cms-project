<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    /**
     * Display a listing of careers
     */
    public function index()
    {
        try {
            $careers = Career::orderBy('created_at', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Careers retrieved successfully',
                'data' => $careers,
                'count' => $careers->count()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve careers',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created career
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'qualification' => 'required|string',
                'image' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'job_type' => 'nullable|string|max:100',
                'salary' => 'nullable|numeric|min:0',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $career = Career::create([
                'title' => $request->title,
                'description' => $request->description,
                'qualification' => $request->qualification,
                'image' => $request->image,
                'location' => $request->location,
                'job_type' => $request->job_type,
                'salary' => $request->salary,
                'status' => $request->status ?? true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Career created successfully',
                'data' => $career
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create career',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified career
     */
    public function show($id)
    {
        try {
            $career = Career::find($id);

            if (!$career) {
                return response()->json([
                    'success' => false,
                    'message' => 'Career not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Career retrieved successfully',
                'data' => $career
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve career',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified career
     */
    public function update(Request $request, $id)
    {
        try {
            $career = Career::find($id);

            if (!$career) {
                return response()->json([
                    'success' => false,
                    'message' => 'Career not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'title' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'qualification' => 'sometimes|required|string',
                'image' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'job_type' => 'nullable|string|max:100',
                'salary' => 'nullable|numeric|min:0',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $career->update($request->only([
                'title',
                'description',
                'qualification',
                'image',
                'location',
                'job_type',
                'salary',
                'status'
            ]));

            return response()->json([
                'success' => true,
                'message' => 'Career updated successfully',
                'data' => $career->fresh()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update career',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified career
     */
    public function destroy($id)
    {
        try {
            $career = Career::find($id);

            if (!$career) {
                return response()->json([
                    'success' => false,
                    'message' => 'Career not found'
                ], 404);
            }

            $careerTitle = $career->title;
            $career->delete();

            return response()->json([
                'success' => true,
                'message' => "Career '{$careerTitle}' deleted successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete career',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}