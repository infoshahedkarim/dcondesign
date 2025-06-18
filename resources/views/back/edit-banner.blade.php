@extends('layouts.master')

@section('title', 'Edit banner')
@section('page-title', 'Edit banner')

@section('body')
@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header text-white rounded-top-4">
            <h4 class="mb-0">🛠️ Edit banner</h4>
        </div>

        <div class="card-body p-4">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Existing Icon --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Current Image</label><br>
                    <img src="{{ asset('storage/' . $banner->img) }}" alt="varabikroy" class="img-thumbnail" style="max-width: 120px;">
                </div>

                {{-- Upload New Icon --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload New Image</label>
                    <input type="file" name="img" id="image" accept="image/*" class="form-control" onchange="previewImage(event)">
                    <img id="imagePreview" class="img-thumbnail mt-2" style="max-width: 200px; display: none;" alt="Image Preview">
                </div>

                {{-- Submit Button --}}
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-outline-success waves-effect waves-light">
                        <i class="bi bi-check-circle me-1"></i> Save Changes
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


{{-- Preview Image Script --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const file = input.files[0];
            const maxSize = 2 * 1024 * 1024;

            if (file.size > maxSize) {
                alert("Image too large! Maximum size allowed is 2MB.");
                input.value = "";
                preview.src = "";
                preview.style.display = "none";
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
