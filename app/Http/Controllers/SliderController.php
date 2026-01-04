<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        return response()->json([
            'success' => true,
            'data' => $sliders
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $slider = Slider::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Slider created successfully',
            'data' => $slider
        ], 201);
    }

    public function show($id)
    {
        $slider = Slider::find($id);

        if (!$slider) {
            return response()->json([
                'success' => false,
                'message' => 'Slider not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $slider
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        if (!$slider) {
            return response()->json([
                'success' => false,
                'message' => 'Slider not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'sometimes|required|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $slider->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Slider updated successfully',
            'data' => $slider
        ], 200);
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);

        if (!$slider) {
            return response()->json([
                'success' => false,
                'message' => 'Slider not found'
            ], 404);
        }

        $slider->delete();

        return response()->json([
            'success' => true,
            'message' => 'Slider deleted successfully'
        ], 200);
    }
}