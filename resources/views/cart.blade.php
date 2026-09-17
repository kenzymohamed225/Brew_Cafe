@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1 class="text-center mb-5" style="color: #35180c;">
        Your Cart
    </h1>


    @if(count($cart) > 0)

        <div class="row g-4">

            @foreach($cart as $id => $item)

                <div class="col-md-6">

                    <div class="card shadow-sm">

                        <div class="card-body d-flex align-items-center">

                            @if($item['image'])

                                <img
                                    src="{{ asset('images/' . basename($item['image'])) }}"
                                    alt="{{ $item['name'] }}"
                                    class="rounded"
                                    style="width: 100px; height: 100px; object-fit: cover;"
                                >

                            @endif


                            <div class="ms-3 flex-grow-1">

                                <h5 style="color: #35180c;">
                                    {{ $item['name'] }}
                                </h5>

                                <p style="color: #a66b45;">
                                    ${{ number_format($item['price'], 2) }}
                                </p>

                                <div class="d-flex align-items-center gap-2">

                                    <form
                                        action="{{ route('cart.decrease', $id) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn btn-sm"
                                            style="background-color: #f1e3d1;"
                                        >
                                            -
                                        </button>

                                    </form>

                                    <span class="fw-bold">
                                        {{ $item['quantity'] }}
                                    </span>

                                    <form
                                        action="{{ route('cart.increase', $id) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn btn-sm text-white"
                                            style="background-color: #5b270b;"
                                        >
                                            +
                                        </button>

                                    </form>

                                </div>

                            </div>

                            <div class="text-end">

                                <strong>
                                    ${{ number_format(
                                        $item['price'] * $item['quantity'],
                                        2
                                    ) }}
                                </strong>


                                <form
                                    action="{{ route('cart.remove', $id) }}"
                                    method="POST"
                                    class="mt-3"
                                >

                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                    >
                                        Remove
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="text-end mt-5">

            <h3 style="color: #35180c;">
                Total:
                ${{ number_format($total, 2) }}
            </h3>


            <a
                href="{{ route('menu') }}"
                class="btn btn-secondary mt-3"
            >
                Continue Shopping
            </a>


            <button
                class="btn text-white mt-3"
                style="background-color: #5b270b;"
            >
                Checkout
            </button>

        </div>

    @else

        <div class="text-center">

            <h4 class="text-secondary">
                Your cart is empty.
            </h4>

            <a
                href="{{ route('menu') }}"
                class="btn text-white mt-3"
                style="background-color: #5b270b;"
            >
                Go To Menu
            </a>

        </div>

    @endif

</div>

@endsection