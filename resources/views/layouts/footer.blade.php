<footer class="pt-5 pb-4 mt-auto">
    <div class="container">
        <div class="row g-4 text-center text-md-start">
            <div class="col-md-4">
                <h5 class="fw-bold text-white mb-3 d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                    <img src="{{ asset('assets/images/cafe-logo.png') }}" alt="Brew Café Logo" width="28">
                    Brew Café
                </h5>
                <p class="small opacity-75">Crafting perfection in every cup. Visit us daily for fresh coffee, artisanal pastries, and a cozy atmosphere.</p>
            </div>
            <div class="col-md-4 text-center">
                <h6 class="fw-bold text-white mb-3">Quick Links</h6>
                <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ route('home') }}" class="text-decoration-none text-light opacity-75">Home</a></li>
                    <li><a href="{{ route('menu') }}" class="text-decoration-none text-light opacity-75">Menu</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="text-decoration-none text-light opacity-75">Photo Gallery</a></li>
                    <li><a href="{{ route('about') }}" class="text-decoration-none text-light opacity-75">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-decoration-none text-light opacity-75">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-md-end text-center">
                <h6 class="fw-bold text-white mb-3">Subscribe & Connect</h6>
                <div class="input-group input-group-sm mb-3">
                    <input type="email" class="form-control" placeholder="Enter your email" aria-label="Email">
                    <button class="btn btn-warning text-dark fw-semibold" type="button">Join</button>
                </div>
                <div class="d-flex justify-content-center justify-content-md-end gap-3 text-light opacity-75">
                    <a href="#" class="text-light"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-twitter-x fs-5"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-secondary my-4 opacity-25">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center small opacity-50">
            <p class="mb-0">&copy; {{ date("Y") }} Brew Café. All Rights Reserved.</p>
            <p class="mb-0 mt-2 mt-sm-0">Fresh Coffee Daily</p>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>