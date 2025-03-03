@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h2 class="mb-0">Edit Student: {{ $student->name }}</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            @include('students.form')
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Students
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update Student
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
