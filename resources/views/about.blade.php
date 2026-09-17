@extends('layouts.app')

@section('content')
<main class="container my-5 flex-grow-1">
    <div class="card hero-card mb-5 border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="row g-0 align-items-center p-4 p-lg-5">
            <div class="col-lg-7 text-start">
                <span class="badge bg-light text-dark px-3 py-2 rounded-pill mb-3 fw-semibold">Our Journey</span>
                <h1 class="display-5 fw-bold mb-3">Passion in Every Bean,<br>Love in Every Cup</h1>
                <p class="text-light opacity-75 fs-6 mb-4 pe-lg-4">
                    Founded with a deep love for authentic coffee culture, Brew Café is more than just a coffee shop. It's a sanctuary for dreamers, creators, and coffee enthusiasts who appreciate true craftsmanship.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('menu') }}" class="btn btn-outline-brown text-white border-white">Explore Menu</a>
                    <a href="{{ route('contact') }}" class="btn btn-brown">Visit Us</a>
                </div>
            </div>
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <img src="{{ asset('assets/images/coffe.jpg') }}" class="img-fluid rounded-4 shadow" style="max-height: 320px; width: 100%; object-fit: cover;" alt="About Brew Café">
            </div>
        </div>
    </div>

    <section class="mb-5">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/login_image.webp') }}" class="img-fluid rounded-4 shadow-sm w-100" style="max-height: 400px; object-fit: cover;" alt="Our Story">
            </div>
            <div class="col-md-6">
                <h6 class="text-uppercase fw-bold" style="color: #8c5a36; letter-spacing: 1px;">Our Story</h6>
                <h2 class="fw-bold mb-3">{{ $about->title ?? 'From a Small Coffee Cart to Your Favorite Daily Spot' }}</h2>
                
                <p class="text-muted leading-relaxed mb-3">
                    {{ $about->story_p1 ?? "Brew Café started with a simple belief: everyone deserves an exceptional cup of coffee made without shortcuts. We traveled to the world's renowned coffee-growing regions to source single-origin, ethically harvested beans." }}
                </p>
                <p class="text-muted leading-relaxed mb-4">
                    {{ $about->story_p2 ?? "Every batch is roasted in small quantities to preserve its unique aroma and rich notes. Whether you're stopping by for your morning espresso or settling in for an afternoon study session, our cozy ambiance and passionate baristas are here to welcome you." }}
                </p>

                <div class="row text-center g-3">
                    <div class="col-4">
                        <div class="p-3 bg-white rounded-3 shadow-sm border border-light">
                            <h3 class="fw-bold mb-0" style="color: var(--espresso-dark);">{{ $about->organic_beans ?? '100%' }}</h3>
                            <small class="text-muted">Organic Beans</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 bg-white rounded-3 shadow-sm border border-light">
                            <h3 class="fw-bold mb-0" style="color: var(--espresso-dark);">{{ $about->coffee_blends ?? '15+' }}</h3>
                            <small class="text-muted">Coffee Blends</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 bg-white rounded-3 shadow-sm border border-light">
                            <h3 class="fw-bold mb-0" style="color: var(--espresso-dark);">{{ $about->happy_guests ?? '50K+' }}</h3>
                            <small class="text-muted">Happy Guests</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="text-center mb-5">
            <h6 class="text-uppercase fw-bold" style="color: #8c5a36; letter-spacing: 1px;">What Makes Us Special</h6>
            <h2 class="fw-bold">Why People Love Brew Café</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <div class="mb-3 fs-1">🌱</div>
                    <h5 class="fw-bold mb-2">Ethically Sourced</h5>
                    <p class="text-muted small mb-0">We partner directly with sustainable coffee farmers around the globe, ensuring fair wages and premium quality.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <div class="mb-3 fs-1">☕</div>
                    <h5 class="fw-bold mb-2">Master Baristas</h5>
                    <p class="text-muted small mb-0">Our skilled team brews every cup with precision, calibrated water temperatures, and artistic passion.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <div class="mb-3 fs-1">🍰</div>
                    <h5 class="fw-bold mb-2">Fresh Baked Daily</h5>
                    <p class="text-muted small mb-0">From cheesecakes to artisanal croissants, our bakery items are made fresh every morning.</p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection