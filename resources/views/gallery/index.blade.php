@extends('layouts.app')

@section('content')
<!-- Gallery Hero Section -->
<section class="gallery-hero py-5 text-white position-relative" style="background: linear-gradient(rgba(43, 26, 14, 0.88), rgba(60, 36, 21, 0.92)), url('{{ asset('assets/images/coffe.jpg') }}') center/cover no-repeat;">
    <div class="container py-4 text-center">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-semibold mb-3 shadow-sm">
            <i class="bi bi-camera-fill me-1"></i> Moments & Brews
        </span>
        <h1 class="display-4 fw-bold mb-3">Our Photo Gallery</h1>
        <p class="lead opacity-85 mx-auto mb-4" style="max-width: 650px;">
            Step into the world of Brew Café. From hand-poured artisanal coffee to handcrafted pastries and cozy ambiance, explore our curated gallery of daily moments.
        </p>

        <!-- Category Filter Buttons -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mt-4" id="galleryFilterNav">
            <button class="btn btn-sm btn-filter active" data-filter="all">
                <i class="bi bi-grid-fill me-1"></i> All Items
            </button>
            @php
                $categories = $galleryItems->pluck('category')->filter()->unique();
            @endphp
            @foreach($categories as $category)
                <button class="btn btn-sm btn-filter" data-filter="{{ Str::slug($category) }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Grid Section -->
<section class="py-5 bg-light-warm">
    <div class="container">
        @if($galleryItems->isEmpty())
            <div class="text-center py-5 my-5">
                <div class="display-1 text-muted mb-3 opacity-50">
                    <i class="bi bi-images"></i>
                </div>
                <h4 class="fw-bold text-secondary">No gallery items yet</h4>
                <p class="text-muted">Check back soon for freshly brewed photos and cozy moments!</p>
                <a href="{{ route('home') }}" class="btn btn-brown mt-3">Return to Home</a>
            </div>
        @else
            <div class="row g-4" id="galleryGrid">
                @foreach($galleryItems as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 gallery-item-wrapper" data-category="{{ Str::slug($item->category ?? 'other') }}">
                        <div class="card h-100 border-0 shadow-sm gallery-card overflow-hidden rounded-4">
                            <div class="gallery-img-container position-relative overflow-hidden">
                                <img src="{{ $item->image_url }}" 
                                     class="card-img-top gallery-img w-100" 
                                     alt="{{ $item->title }}"
                                     loading="lazy"
                                     style="height: 240px; object-fit: cover;">
                                
                                <div class="gallery-overlay d-flex flex-column justify-content-end p-3">
                                    @if($item->category)
                                        <span class="badge bg-light text-dark align-self-start mb-2 px-2 py-1 small rounded-pill shadow-sm">
                                            {{ $item->category }}
                                        </span>
                                    @endif
                                    <h5 class="text-white fw-bold mb-1 fs-6">{{ $item->title }}</h5>
                                    @if($item->description)
                                        <p class="text-white-50 small mb-2 text-truncate">{{ $item->description }}</p>
                                    @endif
                                    
                                    <button type="button" 
                                            class="btn btn-sm btn-light rounded-pill align-self-start mt-1 fw-semibold d-inline-flex align-items-center gap-1 shadow-sm"
                                            onclick="openLightbox('{{ $item->image_url }}', '{{ addslashes($item->title) }}', '{{ addslashes($item->category ?? '') }}', '{{ addslashes($item->description ?? '') }}')">
                                        <i class="bi bi-arrows-fullscreen"></i> View
                                    </button>
                                </div>
                            </div>
                            
                            <div class="card-body p-3 bg-white d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h6 class="fw-bold mb-0 text-dark">{{ $item->title }}</h6>
                                    @if($item->category)
                                        <span class="badge bg-secondary-subtle text-secondary small px-2 py-1 rounded-pill" style="font-size: 0.75rem;">
                                            {{ $item->category }}
                                        </span>
                                    @endif
                                </div>
                                @if($item->description)
                                    <p class="text-muted small mb-0 mt-1" style="font-size: 0.85rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $item->description }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Lightbox Modal -->
<div class="modal fade" id="galleryLightboxModal" tabindex="-1" aria-labelledby="lightboxTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0 text-white rounded-4 overflow-hidden shadow-lg">
            <div class="modal-header border-0 pb-0 position-absolute top-0 end-0 z-3 p-3">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center bg-black position-relative d-flex align-items-center justify-content-center" style="min-height: 380px; max-height: 75vh;">
                <img id="lightboxImage" src="" alt="" class="img-fluid" style="max-height: 75vh; width: auto; object-fit: contain;">
            </div>
            <div class="modal-footer border-0 bg-dark p-4 d-flex flex-column align-items-start">
                <div class="d-flex align-items-center gap-2 mb-2 w-100">
                    <span id="lightboxCategory" class="badge bg-warning text-dark px-2.5 py-1 rounded-pill fw-semibold"></span>
                    <h5 id="lightboxTitle" class="modal-title fw-bold text-white mb-0"></h5>
                </div>
                <p id="lightboxDescription" class="text-light opacity-75 small mb-0 w-100 text-start"></p>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-light-warm {
        background-color: #faf7f2;
    }
    .btn-filter {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 50rem;
        padding: 6px 18px;
        font-weight: 500;
        transition: all 0.25s ease;
        backdrop-filter: blur(4px);
    }
    .btn-filter:hover {
        background-color: rgba(255, 255, 255, 0.3);
        color: #fff;
        transform: translateY(-1px);
    }
    .btn-filter.active {
        background-color: #d4a373;
        color: #2b1a0e;
        border-color: #d4a373;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .gallery-card {
        transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.3s ease;
    }
    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(60, 36, 21, 0.12) !important;
    }
    .gallery-img {
        transition: transform 0.4s ease;
    }
    .gallery-card:hover .gallery-img {
        transform: scale(1.06);
    }
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(43, 26, 14, 0.85) 0%, rgba(43, 26, 14, 0.2) 60%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const filterButtons = document.querySelectorAll('.btn-filter');
        const galleryItems = document.querySelectorAll('.gallery-item-wrapper');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const filterValue = this.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        item.classList.add('animate__fadeIn');
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });

    function openLightbox(imageUrl, title, category, description) {
        const modalElement = document.getElementById('galleryLightboxModal');
        const modal = new bootstrap.Modal(modalElement);
        
        document.getElementById('lightboxImage').src = imageUrl;
        document.getElementById('lightboxTitle').textContent = title;
        
        const catBadge = document.getElementById('lightboxCategory');
        if (category) {
            catBadge.textContent = category;
            catBadge.style.display = 'inline-block';
        } else {
            catBadge.style.display = 'none';
        }

        const descElem = document.getElementById('lightboxDescription');
        if (description) {
            descElem.textContent = description;
            descElem.style.display = 'block';
        } else {
            descElem.style.display = 'none';
        }

        modal.show();
    }
</script>
@endsection
