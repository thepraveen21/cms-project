<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::orderBy('created_at', 'desc')->get();
        return view('admin.officers.index', compact('officers'));
    }

    public function create()
    {
        return view('admin.officers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $validated['status'] = $request->has('status');

        Officer::create($validated);

        return redirect()->route('admin.officers.index')
            ->with('success', 'Officer created successfully');
    }

    public function edit(Officer $officer)
    {
        return view('admin.officers.edit', compact('officer'));
    }

    public function update(Request $request, Officer $officer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $validated['status'] = $request->has('status');

        $officer->update($validated);

        return redirect()->route('admin.officers.index')
            ->with('success', 'Officer updated successfully');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();

        return redirect()->route('admin.officers.index')
            ->with('success', 'Officer deleted successfully');
    }
}