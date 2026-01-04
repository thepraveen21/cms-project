<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of partners
     */
    public function index()
    {
        try {
            $partners = Partner::orderBy('created_at', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Partners retrieved successfully',
                'data' => $partners,
                'count' => $partners->count()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve partners',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created partner
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|string|max:255',
                'website' => 'nullable|url|max:255',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $partner = Partner::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $request->image,
                'website' => $request->website,
                'status' => $request->status ?? true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Partner created successfully',
                'data' => $partner
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create partner',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified partner
     */
    public function show($id)
    {
        try {
            $partner = Partner::find($id);

            if (!$partner) {
                return response()->json([
                    'success' => false,
                    'message' => 'Partner not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Partner retrieved successfully',
                'data' => $partner
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve partner',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified partner
     */
    public function update(Request $request, $id)
    {
        try {
            $partner = Partner::find($id);

            if (!$partner) {
                return response()->json([
                    'success' => false,
                    'message' => 'Partner not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'image' => 'sometimes|required|string|max:255',
                'website' => 'nullable|url|max:255',
                'status' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $partner->update($request->only([
                'name',
                'description',
                'image',
                'website',
                'status'
            ]));

            return response()->json([
                'success' => true,
                'message' => 'Partner updated successfully',
                'data' => $partner->fresh()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update partner',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified partner
     */
    public function destroy($id)
    {
        try {
            $partner = Partner::find($id);

            if (!$partner) {
                return response()->json([
                    'success' => false,
                    'message' => 'Partner not found'
                ], 404);
            }

            $partnerName = $partner->name;
            $partner->delete();

            return response()->json([
                'success' => true,
                'message' => "Partner '{$partnerName}' deleted successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete partner',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
