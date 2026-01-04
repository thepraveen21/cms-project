<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndustryController extends Controller
{
    /**
     * Display a listing of industries
     */
    public function index()
    {
        try {
            $industries = Industry::orderBy('created_at', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Industries retrieved successfully',
                'data' => $industries,
                'count' => $industries->count()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve industries',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created industry
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:industries,name',
                'description' => 'required|string',
                'image' => 'nullable|string|max:255',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $industry = Industry::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $request->image,
                'status' => $request->status ?? true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Industry created successfully',
                'data' => $industry
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create industry',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified industry
     */
    public function show($id)
    {
        try {
            $industry = Industry::find($id);

            if (!$industry) {
                return response()->json([
                    'success' => false,
                    'message' => 'Industry not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Industry retrieved successfully',
                'data' => $industry
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve industry',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified industry
     */
    public function update(Request $request, $id)
    {
        try {
            $industry = Industry::find($id);

            if (!$industry) {
                return response()->json([
                    'success' => false,
                    'message' => 'Industry not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255|unique:industries,name,' . $id,
                'description' => 'sometimes|required|string',
                'image' => 'nullable|string|max:255',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $industry->update($request->only([
                'name',
                'description',
                'image',
                'status'
            ]));

            return response()->json([
                'success' => true,
                'message' => 'Industry updated successfully',
                'data' => $industry->fresh()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update industry',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified industry
     */
    public function destroy($id)
    {
        try {
            $industry = Industry::find($id);

            if (!$industry) {
                return response()->json([
                    'success' => false,
                    'message' => 'Industry not found'
                ], 404);
            }

            $industryName = $industry->name;
            $industry->delete();

            return response()->json([
                'success' => true,
                'message' => "Industry '{$industryName}' deleted successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete industry',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}