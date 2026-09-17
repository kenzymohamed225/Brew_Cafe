@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header & Navigation -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1 small">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}" class="text-decoration-none text-muted">Gallery</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Item</li>
                        </ol>
                    </nav>
                    <h2 class="fw-bold text-dark mb-0">Edit Gallery Image</h2>
                </div>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>

            <!-- Edit Card -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-header bg-white py-3 px-4 border-bottom">
                    <h5 class="fw-bold mb-0 text-dark">Edit: {{ $gallery->title }}</h5>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                            <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-2"></i>Please fix the following errors:</div>
                            <ul class="mb-0 ps-3 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Current & New Image -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Image File</label>
                            
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-auto">
                                    <div class="text-muted small mb-1 fw-semibold">Current Image:</div>
                                    <div class="rounded-3 overflow-hidden border shadow-sm" style="width: 120px; height: 100px;">
                                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-muted small mb-1 fw-semibold">Replace with new image (optional):</div>
                                    <input type="file" 
                                           name="image" 
                                           id="imageInput" 
                                           class="form-control @error('image') is-invalid @enderror" 
                                           accept="image/jpeg,image/png,image/webp,image/gif" 
                                           onchange="handleImagePreview(event)">
                                    <div class="form-text small text-muted">Leave empty to keep current image. Supported: JPG, PNG, WEBP, GIF (Max 5MB)</div>
                                </div>
                            </div>

                            <div id="newPreviewContainer" class="d-none p-3 bg-light rounded-3 text-center mb-2">
                                <div class="text-muted small mb-2 fw-semibold text-success"><i class="bi bi-check-circle me-1"></i> New Image Preview:</div>
                                <img id="newImagePreview" src="" alt="New Preview" class="img-fluid rounded-3 shadow-sm" style="max-height: 180px; object-fit: contain;">
                            </div>
                            
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold text-dark">
                                Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $gallery->title) }}" 
                                   required 
                                   maxlength="255">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category" class="form-label fw-semibold text-dark">Category</label>
                            <input type="text" 
                                   class="form-control @error('category') is-invalid @enderror" 
                                   id="category" 
                                   name="category" 
                                   value="{{ old('category', $gallery->category) }}" 
                                   list="categorySuggestions"
                                   maxlength="100">
                            <datalist id="categorySuggestions">
                                <option value="Coffee">
                                <option value="Cold Drinks">
                                <option value="Food">
                                <option value="Ambiance">
                                <option value="Events">
                            </datalist>
                            <div class="form-text small text-muted">Select an existing category or type a custom one.</div>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold text-dark">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="3">{{ old('description', $gallery->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Active Toggle -->
                        <div class="mb-4 p-3 bg-light rounded-3 d-flex justify-content-between align-items-center">
                            <div>
                                <label class="form-check-label fw-semibold text-dark mb-0 d-block" for="is_active">
                                    Display on Public Gallery
                                </label>
                                <span class="text-muted small">Enable this to show the photo in the public gallery view.</span>
                            </div>
                            <div class="form-check form-switch fs-5 mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-light px-4">Cancel</a>
                            <button type="submit" class="btn btn-brown px-4 d-flex align-items-center gap-2">
                                <i class="bi bi-check-lg"></i> Update Gallery Image
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleImagePreview(event) {
        const input = event.target;
        const preview = document.getElementById('newImagePreview');
        const previewContainer = document.getElementById('newPreviewContainer');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection