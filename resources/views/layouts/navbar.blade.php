<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/cafe-logo.png') }}" alt="Brew Café Logo" width="40">
            <span class="fs-5">Brew Café</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="navbar-nav ms-auto align-items-lg-center gap-2 gap-lg-3 py-2 py-lg-0">
                <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active text-primary' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link fw-semibold {{ request()->routeIs('menu') ? 'active text-primary' : '' }}" href="{{ route('menu') }}">Menu</a>
                <a class="nav-link fw-semibold {{ request()->routeIs('gallery.*') ? 'active text-primary' : '' }}" href="{{ route('gallery.index') }}">
                    <i class="bi bi-camera me-1 d-none d-lg-inline"></i>Gallery
                </a>

                @auth
                    <a class="nav-link fw-semibold {{ request()->routeIs('cart') ? 'active text-primary' : '' }}" href="{{ route('cart') }}">
                        <i class="bi bi-bag me-1"></i>Cart
                    </a>
                @endauth

                <a class="nav-link fw-semibold {{ request()->routeIs('about') ? 'active text-primary' : '' }}" href="{{ route('about') }}">About Us</a>
                <a class="nav-link fw-semibold {{ request()->routeIs('contact') ? 'active text-primary' : '' }}" href="{{ route('contact') }}">Contact Us</a>

                <li class="nav-item dropdown">
                    <a id="userDropdown" class="nav-link dropdown-toggle fw-semibold d-flex align-items-center gap-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        <span>
                            @auth
                                {{ Auth::user()->name }}
                            @else
                                Account
                            @endauth
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2">
                        @auth
                            <li class="dropdown-header text-muted small fw-semibold">Admin & Actions</li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('admin.gallery.index') }}">
                                    <i class="bi bi-images text-warning"></i> Manage Gallery
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('admin.gallery.create') }}">
                                    <i class="bi bi-plus-circle text-primary"></i> Add Gallery Image
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('product.add') }}">
                                    <i class="bi bi-box-seam text-success"></i> Add Product
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('login') }}">
                                    <i class="bi bi-box-arrow-in-right"></i> Login
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('register') }}">
                                    <i class="bi bi-person-plus"></i> Register
                                </a>
                            </li>
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
    </div>
</nav>