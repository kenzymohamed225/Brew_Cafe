@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <h1 class="text-center mb-4" style="color:#35180c;">
                Add Product
            </h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <form action="{{ route('product.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Product Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Price
                            </label>

                            <input type="number"
                                   name="price"
                                   class="form-control"
                                   step="0.01"
                                   value="{{ old('price') }}"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Product Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control"
                                   accept="image/*"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn text-white w-100"
                                style="background-color:#5b270b;">
                            Add Product
                        </button>

                    </form>

                    <div class="text-center mt-3">

                        <a href="{{ route('menu') }}"
                           class="btn btn-secondary">
                            Go To Menu
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection