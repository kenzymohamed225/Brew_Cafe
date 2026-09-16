@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1 small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gallery Management</li>
                </ol>
            </nav>
            <h2 class="fw-bold text-dark mb-0">
                <i class="bi bi-images text-warning me-2"></i>Gallery Management
            </h2>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('gallery.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2" target="_blank">
                <i class="bi bi-eye"></i> View Public Gallery
            </a>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-brown d-flex align-items-center gap-2 shadow-sm">
                <i class="bi bi-plus-circle"></i> Add New Image
            </a>
        </div>
    </div>

    <!-- Alert Notifications -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill fs-5 text-success"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
            <div>{{ session('error') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Statistics Overview Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
                <div class="text-muted small fw-semibold">Total Items</div>
                <div class="h3 fw-bold mb-0 text-dark">{{ $galleryItems->count() }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
                <div class="text-muted small fw-semibold">Active Items</div>
                <div class="h3 fw-bold mb-0 text-success">{{ $galleryItems->where('is_active', true)->count() }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
                <div class="text-muted small fw-semibold">Hidden Items</div>
                <div class="h3 fw-bold mb-0 text-secondary">{{ $galleryItems->where('is_active', false)->count() }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
                <div class="text-muted small fw-semibold">Categories</div>
                <div class="h3 fw-bold mb-0 text-primary">{{ $galleryItems->pluck('category')->filter()->unique()->count() }}</div>
            </div>
        </div>
    </div>

    <!-- Gallery Table / Items List -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white py-3 px-4 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0 text-dark">All Gallery Items</h5>
            <span class="badge bg-secondary-subtle text-secondary px-2.5 py-1.5 rounded-pill">
                {{ $galleryItems->count() }} items found
            </span>
        </div>

        @if($galleryItems->isEmpty())
            <div class="text-center py-5 my-3">
                <div class="display-3 text-muted mb-3 opacity-25"><i class="bi bi-images"></i></div>
                <h5 class="fw-bold text-muted">No gallery items uploaded yet</h5>
                <p class="text-muted small">Start by adding your first café photo to the gallery.</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-brown btn-sm mt-2">
                    <i class="bi bi-plus-lg me-1"></i> Add First Image
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th class="ps-4" style="width: 80px;">Preview</th>
                            <th>Title & Details</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleryItems as $item)
                            <tr>
                                <td class="ps-4">
                                    <div class="rounded-3 overflow-hidden shadow-sm" style="width: 60px; height: 60px;">
                                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $item->title }}</div>
                                    @if($item->description)
                                        <div class="text-muted small text-truncate" style="max-width: 320px;">
                                            {{ $item->description }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if($item->category)
                                        <span class="badge bg-info-subtle text-info-emphasis px-2.5 py-1 rounded-pill fw-semibold">
                                            {{ $item->category }}
                                        </span>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->is_active)
                                        <span class="badge bg-success-subtle text-success px-2.5 py-1 rounded-pill fw-semibold">
                                            <i class="bi bi-check-circle-fill me-1"></i> Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary px-2.5 py-1 rounded-pill fw-semibold">
                                            <i class="bi bi-eye-slash-fill me-1"></i> Hidden
                                        </span>
                                    @endif
                                </td>
                                <td class="text-muted small">
                                    {{ $item->created_at ? $item->created_at->format('M d, Y') : 'N/A' }}
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('admin.gallery.edit', $item) }}" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1 rounded-2">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this gallery image? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1 rounded-2">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
