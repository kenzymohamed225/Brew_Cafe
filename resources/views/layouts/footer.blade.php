<footer class="pt-5 pb-4 mt-auto">
    <div class="container">
        <div class="row g-4 text-center text-md-start">
            <div class="col-md-4">
                <h5 class="fw-bold text-white mb-3">☕ Brew Café</h5>
                <p class="small opacity-75">Crafting perfection in every cup. Visit us daily for fresh coffee, artisanal pastries, and a cozy atmosphere.</p>
            </div>
            <div class="col-md-4 text-center">
                <h6 class="fw-bold text-white mb-3">Quick Links</h6>
                <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                    <li><a href="{{ route('menu') }}" class="text-decoration-none">Menu</a></li>
                    <li><a href="{{ route('about') }}" class="text-decoration-none">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-decoration-none">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-md-end text-center">
                <h6 class="fw-bold text-white mb-3">Subscribe</h6>
                <div class="input-group input-group-sm">
                    <input type="email" class="form-control" placeholder="Enter your email">
                    <button class="btn btn-outline-light" type="button">Join</button>
                </div>
            </div>
        </div>
        <hr class="border-secondary my-4 opacity-25">
        <p class="text-center small opacity-50 mb-0">&copy; {{ date("Y") }} Brew Café. All Rights Reserved.</p>
    </div>
</footer>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>