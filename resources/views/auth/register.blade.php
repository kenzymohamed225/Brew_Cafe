@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row bg-white shadow rounded overflow-hidden mx-auto" style="max-width: 1000px;">
            <div class="col-md-6 p-0">
                <img src="{{ asset('assets/images/login_image.webp') }}" alt="Register" class="w-100 h-100"
                    style="object-fit: cover;">
            </div>
            <div class="col-md-6 p-4 p-md-5 d-flex flex-column justify-content-center">
                <h1 class="text-center fw-bold mb-1">Create Account</h1>
                <p class="text-center text-secondary mb-4">Register to get started</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4 text-center">
                        <label class="form-label d-block">Profile Photo (optional)</label>
                        <img id="registerImagePreview" src="{{ asset('assets/images/default-avatar.svg') }}"
                            alt="Preview" class="rounded-circle border mb-2"
                            style="width: 90px; height: 90px; object-fit: cover;">
                        <input type="file" id="image" name="image" accept="image/*"
                            class="form-control @error('image') is-invalid @enderror" style="max-width: 260px; margin: 0 auto;">

                        @error('image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required
                            autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                            autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                            required autocomplete="new-password">
                    </div>

                    <button type="submit" class="btn btn-brown w-100 py-2">Register</button>
                </form>

                <div class="text-center mt-4">
                    <span class="text-secondary">Already have an account?</span>
                    <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: #6f4e37;">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = ev => document.getElementById('registerImagePreview').src = ev.target.result;
            reader.readAsDataURL(file);
        });
    </script>
@endsection
