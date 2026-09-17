@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <h1 class="text-center mb-4" style="color:#35180c;">
                My Profile
            </h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <img width="90" height="90" class="rounded-circle border"
                            style="object-fit: cover;"
                            src="{{ $user->image ? Storage::url('users/' . $user->image) : asset('assets/images/default-avatar.svg') }}"
                            alt="Profile photo">
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn w-100" style="background-color:#35180c; color:#fff;">
                            Save Changes
                        </button>

                    </form>

                </div>
            </div>

            <div class="card border-danger shadow-sm">
                <div class="card-body p-4">

                    <h5 class="text-danger mb-2">Delete Account</h5>
                    

                    <form action="{{ route('profile.destroy') }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete your account?')">
                        @csrf
                        @method('DELETE')

                        <label class="form-label">Enter your password to delete your account</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-outline-danger mt-3">
                            Delete Account
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection