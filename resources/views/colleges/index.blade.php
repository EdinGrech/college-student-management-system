@extends('layouts.app')

@section('title', 'Colleges')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Colleges</h1>
    <a href="{{ route('colleges.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New College
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($colleges as $college)
                        <tr>
                            <td>{{ $loop->iteration + ($colleges->currentPage() - 1) * $colleges->perPage() }}</td>
                            <td>{{ $college->name }}</td>
                            <td>{{ $college->address }}</td>
                            <td>{{ $college->students_count ?? $college->students->count() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('students.index', ['college_id' => $college->id]) }}" class="btn btn-sm btn-info btn-action">
                                        <i class="fas fa-users"></i> Students
                                    </a>
                                    <a href="{{ route('colleges.edit', $college) }}" class="btn btn-sm btn-warning btn-action">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No colleges found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $colleges->links() }}
</div>
@endsection