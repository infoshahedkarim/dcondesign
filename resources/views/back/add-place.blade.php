@extends('layouts.master')

@section('title', 'Add Place')
@section('page-title', 'Add Place')

@section('body')
@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header text-white rounded-top-4">
            <h4 class="mb-0">📍 Add New Place</h4>
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
                    <strong>Please fix the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('back.pstore') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Place Title <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Place Name" onkeyup="generateSlug()" required>
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Tag (Slug)</label>
                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Auto-generated" readonly>
                </div>

                {{-- Icon Upload --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Icon <span class="text-muted small">(Max 2MB)</span></label>
                    <input type="file" name="img" id="image" accept="image/*" class="form-control" onchange="previewImage(event)">
                    <img id="imagePreview" class="img-thumbnail mt-2" style="max-width: 200px; display: none;">
                </div>

                {{-- Submit --}}
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-outline-success waves-effect waves-light">
                        <i class="bi bi-check-circle me-1"></i> Save Place
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Slug Generator --}}
<script>
    let debounceTimer;

    function generateSlug() {
        const name = document.getElementById("name").value;
        let baseSlug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^[-]+|[-]+$/g, '');

        clearTimeout(debounceTimer);

        if (baseSlug.length > 0) {
            debounceTimer = setTimeout(function () {
                checkSlug(baseSlug).then(finalSlug => {
                    document.getElementById("slug").value = finalSlug;
                });
            }, 500);
        } else {
            document.getElementById("slug").value = '';
        }
    }

    async function checkSlug(baseSlug) {
        let slug = baseSlug;
        let count = 0;
        let exists = true;

        while (exists) {
            const response = await fetch(`{{ url('/slug-check') }}/${slug}`);
            const data = await response.json();
            exists = data.exists;

            if (exists) {
                count++;
                slug = `${baseSlug}-${count}`;
            }
        }

        if (slug !== baseSlug) {
            alert("Slug already exists. A unique one was generated.");
        }

        return slug;
    }
</script>

{{-- Image Preview --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const file = input.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (file.size > maxSize) {
                alert("Image too large! Max allowed size is 2MB.");
                input.value = "";
                preview.src = "";
                preview.style.display = "none";
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
