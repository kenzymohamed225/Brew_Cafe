@extends('layouts.app')

@section('content')

<div class="container-fluid py-5" style="background-color: #faf7f2;">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h1 class="display-4 fw-bold" style="color: #35180c;">
                    Our Menu
                </h1>

                <p class="text-secondary fs-5">
                    Choose your favorite coffee and enjoy
                    <br>
                    the best taste around.
                </p>

            </div>

            <div class="col-md-4 text-center">

                <img
                    src="{{ asset('assets/images/cafe-logo.png') }}"
                    alt="Coffee"
                    class="img-fluid"
                    style="width: 300px; height: 190px; object-fit: cover; border-radius: 50%;"
                >

            </div>

        </div>

    </div>

</div>
<div class="container text-end mt-4">

    <a
        href="{{ route('cart.index') }}"
        class="btn text-white"
        style="background-color: #5b270b;"
    >
        View Cart
    </a>

</div>

@if(session('success'))

    <div class="container mt-4">

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    </div>

@endif

<div class="container py-5">

    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-lg-4 col-md-6">

                <div class="card h-100 shadow-sm">

                    <div class="card-body d-flex align-items-center">

                      @if ($product->image)
    <img
        src="{{ asset('images/' . basename($product->image)) }}"
        alt="{{ $product->name }}"
        class="rounded"
        style="width: 100px; height: 100px; object-fit: cover;"
    >
@else
    <img
        src="{{ asset('images/no-image.png') }}"
        alt="No Image"
        class="rounded"
        style="width: 100px; height: 100px; object-fit: cover;"
    >
@endif

                        <div class="flex-grow-1 ms-3">

                            <h5 style="color: #35180c;">
                                {{ $product->name }}
                            </h5>

                            <span style="color: #a66b45;">
                                ${{ number_format($product->price, 2) }}
                            </span>

                            <p class="text-secondary small mb-0">
                                Fresh coffee made with care.
                            </p>

                        </div>

                        <div class="text-end">

                            <strong>
                                ${{ number_format($product->price, 2) }}
                            </strong>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">

                          @csrf

                          <button
                             type="submit"
                             class="btn text-white"
                             style="background-color: #5b270b;">+</button>

                              </form>
                          

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center">

                <h3>
                    No products available.
                </h3>

            </div>

        @endforelse

    </div>

</div>

@endsection