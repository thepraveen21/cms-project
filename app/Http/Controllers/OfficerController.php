<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfficerController extends Controller
{
    /**
     * Display a listing of officers
     */
    public function index()
    {
        try {
            $officers = Officer::orderBy('created_at', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Officers retrieved successfully',
                'data' => $officers,
                'count' => $officers->count()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve officers',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created officer
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $officer = Officer::create([
                'name' => $request->name,
                'position' => $request->position,
                'location' => $request->location,
                'description' => $request->description,
                'image' => $request->image,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status ?? true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Officer created successfully',
                'data' => $officer
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create officer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified officer
     */
    public function show($id)
    {
        try {
            $officer = Officer::find($id);

            if (!$officer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Officer not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Officer retrieved successfully',
                'data' => $officer
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve officer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified officer
     */
    public function update(Request $request, $id)
    {
        try {
            $officer = Officer::find($id);

            if (!$officer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Officer not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'position' => 'sometimes|required|string|max:255',
                'location' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'image' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $officer->update($request->only([
                'name',
                'position',
                'location',
                'description',
                'image',
                'email',
                'phone',
                'status'
            ]));

            return response()->json([
                'success' => true,
                'message' => 'Officer updated successfully',
                'data' => $officer->fresh()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update officer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified officer
     */
    public function destroy($id)
    {
        try {
            $officer = Officer::find($id);

            if (!$officer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Officer not found'
                ], 404);
            }

            $officerName = $officer->name;
            $officer->delete();

            return response()->json([
                'success' => true,
                'message' => "Officer '{$officerName}' deleted successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete officer',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}