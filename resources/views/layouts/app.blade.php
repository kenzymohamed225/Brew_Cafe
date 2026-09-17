<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Café</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --espresso-dark: #3c2415;
            --cream-bg: #f8f5f0;
            --text-dark: #2b1a0e;
        }

        body {
            background-color: var(--cream-bg) !important;
            color: var(--text-dark);
        }

        .navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #eae3d9;
            
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-size: 0.95rem;
            transition: color 0.2s ease-in-out;
        }

        .dropdown {
            color: #26160b;
            font-weight: bold;
        }

        .nav-link:hover {
            color: #8c5a36 !important;
        }

        .btn-brown {
            background-color: var(--espresso-dark);
            color: #ffffff;
            padding: 8px 20px;
            border-radius: 6px;
        }

        footer {
            background-color: var(--espresso-dark) !important;
            color: #e3d7cb;
        }

        .gallery-preview-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-preview-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(60, 36, 21, 0.15) !important;
        }
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
