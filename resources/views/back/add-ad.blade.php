@extends('layouts.master')

@section('title', 'Add an AD')
@section('page-title', 'Add an AD')

@section('body')
@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header text-white rounded-top-4">
            <h4 class="mb-0">📝 Post a New Advertisement</h4>
        </div>
        <div class="card-body p-4">

            {{-- Success Message --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- Error Messages --}}
            @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Whoops!</strong> Please fix the following:
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                    <li class="small">{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ route('back.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title & Slug --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Ad Title"
                            onkeyup="generateSlug()" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Meta Tag (Slug)</label>
                        <input type="text" id="slug" name="slug" class="form-control" readonly
                            placeholder="Auto-generated">
                    </div>
                </div>

                {{-- Subtitle --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Address <span class="text-danger">*</span></label>
                    <textarea name="subtitle" class="form-control" rows="2" placeholder="Ad Address or Short Note" required></textarea>
                </div>

                {{-- Main Banner --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Main Banner</label>
                    <input type="file" name="img" id="image" accept="image/*" class="form-control"
                        onchange="previewImage(event)">
                    <img id="imagePreview" class="img-thumbnail mt-2" style="max-width: 200px; display: none;">
                </div>

                {{-- Additional Images --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Gallery Images</label>
                    <input type="file" name="images[]" multiple accept="image/*" class="form-control"
                        onchange="previewMultipleImages(event)">
                    <div id="imagePreviewContainer" class="d-flex flex-wrap gap-2 mt-2"></div>
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Price</label>
                    <input type="text" name="price" class="form-control" placeholder="৳ Price">
                </div>

                {{-- Place & Category --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Select Place</label>
                        <select name="place_id" class="form-select">
                            <option value="">-- Choose Place --</option>
                            @foreach ($places as $place)
                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Select Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Choose Category --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="des" id="des" class=" form-control" placeholder="Full Description"></textarea>
                </div>


                {{-- Contact --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Contact Number</label>
                    <input type="number" name="contact" class="form-control" placeholder="Phone Number">
                </div>

                {{-- Premium Ad --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Is it a Premium Ad?</label>
                    <select name="premium_ads" class="form-select" required>
                        <option value="">-- Select Option --</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                {{-- Submit Button --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-outline-success waves-effect waves-light">
                        <i class="bi bi-check-circle me-1"></i> Submit AD
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Include CKEditor --}}
<!-- CKEditor init -->
<!-- Latest LTS version with full-all -->
<script src="https://cdn.ckeditor.com/4.22.1/full-all/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('des', {
            extraPlugins: 'colorbutton,justify,clipboard,font',
            removePlugins: 'pastefromword',
            allowedContent: true,
            height: 300,
            toolbar: [{
                    name: 'document',
                    items: ['Source', '-', 'NewPage', 'Preview', 'Print']
                },
                {
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'Undo', 'Redo']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'styles',
                    items: ['FontSize']
                }, // Added FontSize here
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                }
            ],
            on: {
                instanceReady: function() {
                    const editor = this;
                    editor.editable().on('touchstart', function() {
                        setTimeout(() => editor.focus(), 100);
                    });
                }
            }
        });
    });
</script>






{{-- Slug Generation & Validation --}}




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
        let slug = baseSlug,
            count = 0,
            exists = true;
        while (exists) {
            const response = await fetch(`{{ url('/ad-slug-check') }}/${slug}`);
            const data = await response.json();
            exists = data.exists;
            if (exists) {
                count++;
                slug = `${baseSlug}-${count}`;
            }
        }
        if (slug !== baseSlug) {
            alert("Slug already exists. Generated new unique slug.");
        }
        return slug;
    }
</script>

{{-- Image Previews --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const file = input.files[0];
            if (file.size > 2 * 1024 * 1024) {
                alert("Image too large! Max allowed size is 2MB.");
                input.value = "";
                preview.src = "";
                preview.style.display = "none";
                return;
            }
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    }

    function previewMultipleImages(event) {
        const input = event.target;
        const container = document.getElementById('imagePreviewContainer');
        container.innerHTML = '';
        if (input.files) {
            for (const file of input.files) {
                if (file.size > 2 * 1024 * 1024) {
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
                    img.style.maxWidth = '120px';
                    container.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    }
</script>


@endsection