<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/cafe-logo.png') }}" alt="Brew Café Logo" width="40">
            <span>Brew Café</span>
        </a>

        <div class="navbar-nav ms-auto align-items-center gap-3">
            <a class="nav-link fw-semibold" href="{{ route('home') }}">Home</a>
            <a class="nav-link fw-semibold" href="{{ route('menu') }}">Menu</a>

            @auth
                <a class="nav-link fw-semibold" href="{{ route('cart') }}">Cart</a>
            @endauth

            <a class="nav-link fw-semibold" href="{{ route('about') }}">About Us</a>
            <a class="nav-link fw-semibold" href="{{ route('contact') }}">Contact Us</a>

            <li class="nav-item dropdown">
                <a id="dropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Guest
                    @endauth
                </a>

                <ul class="dropdown-menu">
                    @auth
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('product.add') }}">Add Product</a>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </li>
        </div>
    </div>
</nav>