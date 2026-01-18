<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('created_at', 'desc')->get();
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'qualification' => 'required|string',
            'image' => 'nullable|string',
            'location' => 'nullable|string',
            'job_type' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'status' => 'nullable|boolean'
        ]);

        $validated['status'] = $request->has('status');

        Career::create($validated);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career created successfully');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'qualification' => 'required|string',
            'image' => 'nullable|string',
            'location' => 'nullable|string',
            'job_type' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'status' => 'nullable|boolean'
        ]);

        $validated['status'] = $request->has('status');

        $career->update($validated);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career updated successfully');
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career deleted successfully');
    }
}