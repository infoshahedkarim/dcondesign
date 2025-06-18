@extends('layouts.master')

@section('title', 'Place')
@section('page-title', 'Place')

@section('body')
<body>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header text-white rounded-top-4">
            <h4 class="mb-0">📌 Place List</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Meta Tag</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($places as $place)
                            <tr>
                                <td>{{ $place->id }}</td>
                                <td>{{ $place->name }}</td>
                                <td>{{ $place->slug }}</td>
                                <td>
                                    @if($place->img)
                                        <img src="{{ asset('storage/' . $place->img) }}" alt="{{ $place->name }}" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('place.edit', $place->slug) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('place.delete', $place->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash3"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted">No places found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
