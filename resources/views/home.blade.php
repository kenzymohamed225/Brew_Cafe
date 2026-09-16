@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="card hero-card mb-5 border-0 shadow-sm" style="background-color: var(--espresso-dark); color: white; border-radius: 0;">
    <div class="row g-0 align-items-center container mx-auto">
        <div class="col-md-6 p-4 p-lg-5">
            <h1 class="display-5 fw-bold mb-3">Good Coffee<br>Good Mood</h1>
            <p class="text-light opacity-75 fs-6 mb-4">Start your day with the best coffee in town...</p>
            <div class="d-flex gap-3">
                <a href="{{ route('menu') }}" class="btn btn-outline-light">Explore Menu</a>
                <a href="{{ route('register') }}" class="btn btn-brown border-light">Register</a>
            </div>
        </div>
        <div class="col-md-6 text-center p-3">
            <img src="{{ asset('assets/images/coffe.jpg') }}" class="img-fluid rounded-4 shadow" style="max-height: 350px; object-fit: cover;" alt="Coffee Hero">
        </div>
    </div>
</div>


<section id="popular-items" class="container my-5">
    <div class="text-center mb-4">
        <h2 class="section-title h3">Our Popular Items</h2>
    </div>
    <div class="row g-4">
        {{-- Laravel Blade Foreach loop --}}
        @forelse ($items as $item)
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <img src="{{ asset('assets/images/' . $item->image ?? 'coffe.jpg') }}" class="card-img-top card-menu-img" style="height:200px; object-fit:cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold fs-6 mb-1">{{ $item->name }}</h5>
                        <p class="text-muted small mb-3">${{ number_format($item->price, 2) }}</p>
                        <a href="{{ url('menu/' . $item->id) }}" class="btn btn-brown btn-sm mt-auto w-100">View Details</a>
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

@endsection
