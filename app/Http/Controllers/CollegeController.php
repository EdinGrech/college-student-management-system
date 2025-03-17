<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CollegeController extends Controller
{
    /**
     * Display a listing of the colleges.
     */
    public function index()
    {
        $colleges = College::orderBy('name')->paginate(10);
        return view('colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new college.
     */
    public function create()
    {
        return view('colleges.create');
    }

    /**
     * Store a newly created college in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:colleges,name',
            'address' => 'required|string',
        ]);

        College::create($validated);

        return redirect()->route('colleges.index')
            ->with('success', 'College created successfully.');
    }

    /**
     * Show the form for editing the specified college.
     */
    public function edit(College $college)
    {
        return view('colleges.update', compact('college'));
    }

    /**
     * Update the specified college in storage.
     */
    public function update(Request $request, College $college)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:colleges,name,'.$college->id,
            'address' => 'required|string',
        ]);

        $college->update($validated);

        return redirect()->route('colleges.index')
            ->with('success', 'College updated successfully.');
    }

    /**
     * Delete college and students related.
     */
    public function destroy(College $college)
    {
        $college->delete();
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully.');
    }

    /**
     * Count students in a college.
     */
    public function studentCount(College $college)
    {
        return response()->json([
            'count' => $college->students()->count()
        ]);
    }
}