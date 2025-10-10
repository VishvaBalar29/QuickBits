<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            margin-bottom: 20px;
        }
        main {
            flex: 1;
        }

        /* Footer Styles */
        footer.footer {
            background: linear-gradient(135deg, #111 0%, #222 100%);
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            padding: 50px 0 30px;
            margin-top: auto;
        }
        .footer-link {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-link:hover {
            color: #fff;
        }
        .social-link {
            font-size: 1.4rem;
            color: #ccc;
            transition: color 0.3s ease;
        }
        .social-link:hover {
            color: #fff;
        }
        .footer hr {
            border-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    {{-- News --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.news.index') }}">News</a>
                    </li>

                    {{-- Category --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">Category</a>
                    </li>

                    {{-- Users --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                    </li>

                    {{-- Logout --}}
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="container mb-5">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer mt-auto py-5 text-light">
        <div class="container">
            <div class="row gy-4">
                {{-- Brand Section --}}
                <div class="col-md-4">
                    <h3 class="fw-bold text-uppercase mb-3">QuickBits Admin</h3>
                    <p class="text-white-50">
                        Manage all news, categories, and users efficiently from one centralized dashboard.
                    </p>
                </div>

                {{-- Menu Links --}}
                <div class="col-md-4">
                    <h5 class="fw-semibold mb-3">Navigate</h5>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('admin.news.index') }}" class="footer-link">News</a>
                        <a href="{{ route('admin.category.index') }}" class="footer-link">Categories</a>
                        <a href="{{ route('admin.users.index') }}" class="footer-link">Users</a>
                        <a href="{{ url('/') }}" class="footer-link">Back to Website</a>
                    </div>
                </div>

                {{-- Social Links --}}
                <div class="col-md-4">
                    <h5 class="fw-semibold mb-3">Follow Us</h5>
                    <p class="text-white-50 mb-2">Stay connected with QuickBits:</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <hr class="border-light my-4">

            <div class="text-center text-white-50 small">
                © {{ date('Y') }} <strong>QuickBits Admin Panel</strong>. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
