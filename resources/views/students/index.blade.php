@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Student
    </a>
</div>

<div class="card mb-4">
    <div class="card-header bg-light">
        <h5 class="mb-0">Filter and Sort</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('students.index') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <label for="college_id" class="form-label">Filter by College</label>
                <select name="college_id" id="college_id" class="form-select">
                    <option value="">All Colleges</option>
                    @foreach($colleges as $college)
                        <option value="{{ $college->id }}" {{ request('college_id') == $college->id ? 'selected' : '' }}>
                            {{ $college->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="sort" class="form-label">Sort By</label>
                <select name="sort" id="sort" class="form-select">
                    <option value="name" {{ request('sort') == 'name' || !request('sort') ? 'selected' : '' }}>Name</option>
                    <option value="email" {{ request('sort') == 'email' ? 'selected' : '' }}>Email</option>
                    <option value="dob" {{ request('sort') == 'dob' ? 'selected' : '' }}>Date of Birth</option>
                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Date Created</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="direction" class="form-label">Direction</label>
                <select name="direction" id="direction" class="form-select">
                    <option value="asc" {{ request('direction') == 'asc' || !request('direction') ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Apply</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>College</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->dob->format('M d, Y') }}</td>
                            <td>{{ $student->college->name }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning btn-action">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-action">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $students->withQueryString()->links() }}
</div>
@endsection