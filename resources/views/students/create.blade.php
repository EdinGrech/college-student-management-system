@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h2 class="mb-0">Add New Student</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            @include('students.form')
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Students
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Student
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
