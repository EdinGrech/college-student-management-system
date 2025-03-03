<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students with optional college filtering.
     */
    public function index(Request $request)
    {
        $query = Student::with('college');
        
        if ($request->has('college_id') && $request->college_id) {
            $query->where('college_id', $request->college_id);
        }
        
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');
        
        $allowedSortFields = ['name', 'email', 'dob', 'created_at'];
        if (in_array($sortField, $allowedSortFields)) {
            $query->orderBy($sortField, $sortDirection);
        } else {
            $query->orderBy('name', 'asc');
        }
        
        $students = $query->paginate(15);
        $colleges = College::orderBy('name')->get(); //? For the filter dropdown
        
        return view('students.index', compact('students', 'colleges'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $colleges = College::orderBy('name')->get();
        return view('students.create', compact('colleges'));
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email|max:255',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:11',
            'dob' => 'required|date|before:today',
            'college_id' => 'required|exists:colleges,id',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        $colleges = College::orderBy('name')->get();
        return view('students.edit', compact('student', 'colleges'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$student->id.'|max:255',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
            'dob' => 'required|date|before:today',
            'college_id' => 'required|exists:colleges,id',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}