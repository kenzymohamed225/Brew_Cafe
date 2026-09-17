<nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/cafe-logo.png') }}" alt="Brew Café Logo" width="40">
            <span>Brew Café</span>
        </a>

        <div class="navbar-nav ms-auto align-items-center gap-3">
            <a class="nav-link fw-semibold" href="{{ route('home') }}">Home</a>
            <a class="nav-link fw-semibold" href="{{ route('menu') }}">Menu</a>
            <a class="nav-link fw-semibold {{ request()->routeIs('gallery.*') ? 'active text-primary' : '' }}"
                href="{{ route('gallery.index') }}">
                <i class="bi bi-camera me-1 d-none d-lg-inline"></i>Gallery
            </a>

            @auth
                <a class="nav-link fw-semibold" href="{{ route('cart.index') }}">Cart</a>
            @endauth

            <a class="nav-link fw-semibold" href="{{ route('about') }}">About Us</a>
            <a class="nav-link fw-semibold" href="{{ route('contact') }}">Contact Us</a>

            <li class="nav-item dropdown">
                <a id="dropdown" class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @auth
                        <img width="40" height="40"
                            src="{{ Auth::user()->image_url ?? asset('assets/images/default-avatar.svg') }}"
                            alt="">
                        {{ Auth::user()->name }}
                    @else
                        Guest
                    @endauth
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2">
                    @auth
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2"
                                href="{{ route('profile.edit') }}">
                                <i class="bi bi-person-circle text-secondary"></i> My Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                        <li class="dropdown-header text-muted small fw-semibold">Admin & Actions</li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2"
                                href="{{ route('admin.gallery.index') }}">
                                <i class="bi bi-images text-warning"></i> Manage Gallery
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2"
                                href="{{ route('admin.gallery.create') }}">
                                <i class="bi bi-plus-circle text-primary"></i> Add Gallery Image
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('product.add') }}">Add Product</a>
                        </li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        <li><hr class="dropdown-divider"></li>
                          <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('admin.gallery.index') }}">
                                    <i class="bi bi-images text-muted"></i> Gallery Admin
                                </a>
                            </li>
                    @endauth
                </ul>
            </li>
        </div>
    </div>
</nav>