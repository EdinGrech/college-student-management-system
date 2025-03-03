@extends('layouts.app')

@section('title', 'Add College')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h2 class="mb-0">Add New College</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('colleges.store') }}" method="POST">
            @csrf
            @include('colleges.form')
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('colleges.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Colleges
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save College
                </button>
            </div>
        </form>
    </div>
</div>
@endsection