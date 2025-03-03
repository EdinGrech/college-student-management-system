@extends('layouts.app')

@section('title', 'Edit College')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h2 class="mb-0">Edit College: {{ $college->name }}</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('colleges.update', $college) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">College Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $college->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address', $college->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('colleges.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Colleges
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update College
                </button>
            </div>
        </form>
    </div>
</div>
@endsection