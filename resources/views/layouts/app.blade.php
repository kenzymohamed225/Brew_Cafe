<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Café</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        :root { --espresso-dark: #3c2415; --cream-bg: #f8f5f0; --text-dark: #2b1a0e; }
        body { background-color: var(--cream-bg) !important; color: var(--text-dark); }
        .btn-brown { background-color: var(--espresso-dark); color: #ffffff; padding: 8px 20px; border-radius: 6px; }
        footer { background-color: var(--espresso-dark) !important; color: #e3d7cb; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    @include('layouts.navbar')

    <main class="flex-grow-1">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>