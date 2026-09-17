@extends('layouts.app')

@section('content')
<div class="py-5" style="background-color: var(--cream-bg);">
    <div class="container">

        <div class="text-center mb-5">
            <h1 class="fw-bold display-6" style="color: var(--espresso-dark);">Contact Us</h1>
            <p class="text-muted fs-6">We'd love to hear from you! Leave us a message or visit our café.</p>
            <div style="width: 60px; height: 3px; background-color: var(--espresso-dark); margin: 0 auto; border-radius: 2px;"></div>
        </div>

        <div class="row g-4 justify-content-center">
            
            <div class="col-lg-4 col-md-5">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 text-white" style="background-color: var(--espresso-dark);">
                    <h4 class="fw-bold mb-4 border-bottom pb-2 border-secondary">Get In Touch</h4>
                    
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="fs-4">📍</div>
                        <div>
                            <h6 class="fw-bold mb-1">Our Location</h6>
                            <p class="small text-light opacity-75 mb-0">Ahl Masr Walkway - Cairo - Egypt</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="fs-4">📞</div>
                        <div>
                            <h6 class="fw-bold mb-1">Call Us</h6>
                            <p class="small text-light opacity-75 mb-0">+2 0155 773 9622 - BREW</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="fs-4">✉️</div>
                        <div>
                            <h6 class="fw-bold mb-1">Email Us</h6>
                            <p class="small text-light opacity-75 mb-0">contact@brewcafe.com</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <div class="fs-4">🕒</div>
                        <div>
                            <h6 class="fw-bold mb-1">Working Hours</h6>
                            <p class="small text-light opacity-75 mb-0">
                                Sat - Wed: 7:00 AM - 9:00 PM<br>
                                Thu - Fri: 10:00 AM - 2:00 AM
                            </p>
                        </div>
                    </div>

                    <div class="mt-auto pt-4 text-center border-top border-secondary">
                        <small class="text-light opacity-75">Always fresh, always warm ☕</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
                    
                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 d-flex align-items-center gap-2" role="alert">
                            <span class="fs-5">✅</span>
                            <div>{{ session('success') }}</div>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="fw-bold mb-4" style="color: var(--text-dark);">Send Us a Message</h3>

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold small">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Your name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold small">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="subject" class="form-label fw-semibold small">Subject <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" placeholder="What is this regarding?" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold small">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control rounded-3 @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-brown px-4 py-2 w-100 fw-semibold shadow-sm">
                                    Send Message ☕
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
