@extends('layouts.master')

@section('title', 'All ADs')
@section('page-title', 'All ADs')

@section('body')
<body>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header text-white rounded-top-4">
            <h4 class="mb-0">📢 All Ads</h4>
        </div>

        <div class="card-body">
            {{-- Success Message --}}
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
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Subtitle</th>
                            <th>Images</th>
                            <th>Price</th>
                            <th>Place</th>
                            <th>Category</th>
                            <th>Contact</th>
                            <th>Premium</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ads as $index => $ad)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $ad->title }}</td>
                                <td>{{ $ad->slug }}</td>
                                <td>{{ $ad->subtitle }}</td>
                                <td class="d-flex flex-wrap justify-content-center gap-1">
                                    @if($ad->img)
                                        <img src="{{ asset('storage/' . $ad->img) }}" alt="Main" width="60" class="rounded shadow-sm">
                                    @endif
                                    @foreach($ad->images as $img)
                                        <img src="{{ asset($img->image_path) }}" alt="Extra" width="60" class="rounded shadow-sm">
                                    @endforeach
                                </td>
                                <td>{{ $ad->price }}</td>
                                <td>{{ optional($places->find($ad->place_id))->name ?? 'N/A' }}</td>
                                <td>{{ optional($categories->find($ad->category_id))->name ?? 'N/A' }}</td>
                                <td>{{ $ad->contact }}</td>
                                <td>
                                    <form action="{{ route('ads.togglePremium', $ad->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="premium_ads" onchange="this.form.submit()" class="form-select form-select-sm">
                                            <option value="1" {{ $ad->premium_ads ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ !$ad->premium_ads ? 'selected' : '' }}>No</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('ad.edit', $ad->slug) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('ad.delete', $ad->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash3"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
