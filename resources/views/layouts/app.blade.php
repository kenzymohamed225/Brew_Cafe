<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Café</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS & Bootstrap Icons -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root { 
            --espresso-dark: #3c2415; 
            --espresso-hover: #2b1a0e;
            --caramel-accent: #d4a373;
            --cream-bg: #faf7f2; 
            --text-dark: #2b1a0e; 
        }
        body { 
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: var(--cream-bg) !important; 
            color: var(--text-dark); 
        }
        .btn-brown { 
            background-color: var(--espresso-dark); 
            color: #ffffff; 
            padding: 8px 20px; 
            border-radius: 8px; 
            border: 1px solid var(--espresso-dark);
            transition: all 0.2s ease;
        }
        .btn-brown:hover { 
            background-color: var(--espresso-hover); 
            color: #ffffff; 
            transform: translateY(-1px);
        }
        .btn-outline-brown {
            border: 1px solid var(--espresso-dark);
            color: var(--espresso-dark);
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.2s ease;
        }
        .btn-outline-brown:hover {
            background-color: var(--espresso-dark);
            color: #ffffff;
        }
        footer { 
            background-color: var(--espresso-dark) !important; 
            color: #e3d7cb; 
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 12px rgba(60, 36, 21, 0.05);
        }
        .nav-link {
            color: var(--text-dark);
            transition: color 0.2s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--caramel-accent) !important;
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