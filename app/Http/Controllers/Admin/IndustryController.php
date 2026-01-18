<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('created_at', 'desc')->get();
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:industries,name',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $validated['status'] = $request->has('status');

        Industry::create($validated);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry created successfully');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:industries,name,' . $industry->id,
            'description' => 'required|string',
            'image' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $validated['status'] = $request->has('status');

        $industry->update($validated);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry updated successfully');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry deleted successfully');
    }
}