@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row bg-white shadow rounded overflow-hidden mx-auto" style="max-width: 1000px;">
        <div class="col-md-6 p-0">
            <img src="{{ asset('assets/images/login_image.webp') }}" alt="Login" class="w-100 h-100" style="object-fit: cover;">
        </div>
        <div class="col-md-6 p-4 p-md-5 d-flex flex-column justify-content-center">
            <h1 class="text-center fw-bold mb-1">Welcome Back</h1>
            <p class="text-center text-secondary mb-4">Login to your account</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Enter Your Password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-brown w-100 py-2">Login</button>
            </form>

            <div class="text-center mt-4">
                @if (Route::has('register'))
                    <span class="text-secondary">Don't have an account?</span>
                    <a href="{{ route('register') }}" class="fw-bold text-decoration-none">Register</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection