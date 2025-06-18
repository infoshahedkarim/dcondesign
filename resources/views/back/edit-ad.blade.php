@extends('layouts.master')

@section('title', 'Edit AD')
@section('page-title', 'Edit AD')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header text-white rounded-top-4">
            <h4 class="mb-0">✏️ Edit Advertisement</h4>
        </div>

        <div class="card-body p-4">
            {{-- Error --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Please fix the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('ad.update', $ad->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $ad->title }}" onkeyup="generateSlug()" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Tag (Slug)</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $ad->slug }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Address</label>
                    <textarea name="subtitle" class="form-control" rows="2" required>{{ $ad->subtitle }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Main Image</label>
                    <input type="file" name="img" class="form-control">
                    @if($ad->img)
                        <img src="{{ asset('storage/' . $ad->img) }}" class="img-thumbnail mt-2" width="120">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Additional Images</label>
                    <input type="file" name="images[]" multiple accept="image/*" class="form-control" onchange="previewMultipleImages(event)">
                    <div id="imagePreviewContainer" class="d-flex flex-wrap gap-2 mt-2"></div>

                    @if($ad->images && $ad->images->count())
                        <label class="form-label mt-3">Previously Uploaded Images:</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($ad->images as $img)
                                <div style="position: relative; display: inline-block;">
                                    <img src="{{ asset($img->image_path) }}" width="80" class="img-thumbnail">
                                    <button type="button"
                                            onclick="deleteImage('{{ route('ads.deleteImage', $img->id) }}')"
                                            class="btn btn-sm btn-danger"
                                            style="position: absolute; top: -8px; right: -8px; border-radius: 50%; width: 22px; height: 22px; padding: 0;">
                                        &times;
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $ad->price }}">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Select Place</label>
                        <select name="place_id" class="form-select" >
                            <option value="">-- Select a Place --</option>
                            @foreach($places as $place)
                                <option value="{{ $place->id }}" {{ $ad->place_id == $place->id ? 'selected' : '' }}>{{ $place->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Select Category</label>
                        <select name="category_id" class="form-select" >
                            <option value="">-- Select a Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $ad->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="des" class="ckeditor form-control " rows="4">{{ $ad->des }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Contact</label>
                    <input type="number" name="contact" class="form-control" value="{{ $ad->contact }}" >
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Premium Ad?</label>
                    <select name="premium_ads" class="form-select" required>
                        <option value="1" {{ $ad->premium_ads ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$ad->premium_ads ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="text-end">
                   <button type="submit" class="btn btn-outline-success waves-effect waves-light">
                        <i class="bi bi-check-circle me-1"></i> Update Ad
                    </button>
                </div>
            </form>

            {{-- Hidden Form for Deleting Images --}}
            <form id="delete-image-form" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script src="/ckeditor/ckeditor.js"></script>

<script>
    let debounceTimer;

    function generateSlug() {
        const name = document.getElementById("title").value;
        let baseSlug = name.toLowerCase().replace(/[^a-z0-9\u0980-\u09FF]+/g, '-').replace(/^[-]+|[-]+$/g, '');
        clearTimeout(debounceTimer);
        if (baseSlug.length > 0) {
            debounceTimer = setTimeout(() => {
                checkSlug(baseSlug).then(finalSlug => {
                    document.getElementById("slug").value = finalSlug;
                });
            }, 500);
        } else {
            document.getElementById("slug").value = '';
        }
    }

    async function checkSlug(baseSlug) {
        let slug = baseSlug, count = 0, exists = true;
        while (exists) {
            const response = await fetch(`/ad-slug-check/${slug}`);
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

    function previewMultipleImages(event) {
        const input = event.target;
        const container = document.getElementById('imagePreviewContainer');
        container.innerHTML = '';
        const maxSize = 2 * 1024 * 1024;

        if (input.files) {
            for (const file of input.files) {
                if (file.size > maxSize) {
                    alert(`Image "${file.name}" exceeds 2MB limit!`);
                    input.value = "";
                    container.innerHTML = "";
                    return;
                }

                const reader = new FileReader();
                reader.onload = e => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail';
                    img.style.maxWidth = '80px';
                    img.style.margin = '5px';
                    container.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    }

    function deleteImage(url) {
        if (confirm('Delete this image?')) {
            const form = document.getElementById('delete-image-form');
            form.action = url;
            form.submit();
        }
    }
</script>
@endsection
