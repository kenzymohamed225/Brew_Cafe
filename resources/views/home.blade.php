@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="card hero-card mb-5 border-0 shadow-sm"
        style="background-color: var(--espresso-dark); color: white; border-radius: 0;">
        <div class="row g-0 align-items-center container mx-auto">
            <div class="col-md-6 p-4 p-lg-5">
                <h1 class="display-5 fw-bold mb-3">Good Coffee<br>Good Mood</h1>
                <p class="text-light opacity-75 fs-6 mb-4">Start your day with the best coffee in town...</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('menu') }}" class="btn btn-outline-light">Explore Menu</a>
                    
                </div>
            </div>
            <div class="col-md-6 text-center p-3">
                <img src="{{ asset('assets/images/coffe.jpg') }}" class="img-fluid rounded-4 shadow"
                    style="max-height: 350px; object-fit: cover;" alt="Coffee Hero">
            </div>
        </div>
    </div>


    <section id="popular-items" class="container my-5">
        <div class="text-center mb-4">
            <h2 class="section-title h3">Our Popular Items</h2>
        </div>
        <div class="row g-4">
           @forelse ($items->take(4) as $item)
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <img src="{{ asset('images/' . $item->image ?? 'coffe.jpg') }}" class="card-img-top card-menu-img"
                            style="height:200px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold fs-6 mb-1">{{ $item->name }}</h5>
                            <p class="text-muted small mb-3">${{ number_format($item->price, 2) }}</p>
                            <a href="{{ route('menu') }}" class="btn btn-brown btn-sm mt-auto w-100">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No items found in the database.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Gallery Highlights Section -->
    @if (isset($galleryHighlights) && $galleryHighlights->isNotEmpty())
        <section class="py-5 bg-white border-top border-bottom my-5">
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-2">
                    <div>
                        <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-2">Moments</span>
                        <h2 class="h3 fw-bold mb-0 text-dark">Life at Brew Café</h2>
                    </div>
                    <a href="{{ route('gallery.index') }}"
                        class="btn btn-outline-brown d-inline-flex align-items-center gap-2">
                        Explore All Photos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach ($galleryHighlights as $item)
                        <div class="col-6 col-md-3">
                            <a href="{{ route('gallery.index') }}" class="text-decoration-none">
                                <div
                                    class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative h-100 gallery-preview-card">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-100"
                                        style="height: 200px; object-fit: cover;">
                                    <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient text-white"
                                        style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                        <h6 class="fw-bold mb-0 text-white text-truncate">{{ $item->title }}</h6>
                                        @if ($item->category)
                                            <span class="badge bg-warning text-dark"
                                                style="font-size: 0.7rem;">{{ $item->category }}</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
