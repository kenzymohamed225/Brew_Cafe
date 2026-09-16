@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row bg-white shadow rounded overflow-hidden mx-auto" style="max-width: 1000px;">
        <div class="col-md-6 p-0">
            <img src="{{ asset('assets/images/login_image.webp') }}" alt="Register" class="w-100">
        </div>
        <div class="col-md-6 p-4 p-md-5 d-flex flex-column justify-content-center">
            <h1 class="text-center fw-bold mb-1">Create Account</h1>
            <p class="text-center text-secondary mb-4">Register to get started</p>

            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-brown w-100 py-2">Register</button>
            </form>

            <div class="text-center mt-4">
                <span class="text-secondary">Already have an account?</span>
                <a href="{{ route('login') }}" class="fw-bold text-decoration-none">Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
