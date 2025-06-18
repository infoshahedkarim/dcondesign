@extends('layouts.master')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')

@section('body')
<body>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header text-white rounded-top-4">
            <h4 class="mb-0">📥 Contact Form Submissions</h4>
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
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->category }}</td>
                                <td class="text-start">{{ $message->msg }}</td>
                                <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>
                                <td>
                                    <form action="{{ route('contact.delete', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($messages->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center text-muted">No messages found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
