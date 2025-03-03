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
            @include('colleges.form')
            
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