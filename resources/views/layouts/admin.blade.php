<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Montserrat:wght@600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    @stack('styles')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafc;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .navbar {
            background: linear-gradient(90deg, #c82333, #dc3545);
            padding: 0.5rem 1rem;
            /* reduced from 0.8rem */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }


        .navbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 26px;
            letter-spacing: 1px;
            color: #ffffff;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand i {
            font-size: 28px;
            color: #fff;
        }

        .navbar-brand:hover {
            color: #ffe6e6;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            margin: 0 10px;
            color: #ffffff !important;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffe6e6 !important;
        }

        .navbar-toggler {
            border: none;
            filter: brightness(0) invert(1);
        }

        .footer {
            background: linear-gradient(135deg, #0b0c10, #1f2833);
            color: #fff;
            padding: 60px 0 30px;
        }

        .footer h4,
        .footer h3 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        .footer p {
            color: #cccccc;
            font-size: 15px;
        }

        .footer a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #fff;
        }

        .footer-bottom {
            text-align: center;
            color: #bbb;
            font-size: 14px;
            padding-top: 15px;
        }
    </style>
</head>

<body>

    <!-- ===== ADMIN NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-speedometer2"></i> QUICKBITS ADMIN
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="adminNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.news.index') }}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer mt-auto">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h3>QuickBits Admin</h3>
                    <p>Manage all news, categories, and users efficiently.</p>
                </div>
                <div class="col-md-4">
                    <h4>Navigate</h4>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('admin.news.index') }}">News</a>
                        <a href="{{ route('admin.category.index') }}">Categories</a>
                        <a href="{{ route('admin.users.index') }}">Users</a>
                        <a href="{{ url('/') }}">Back to Website</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Follow Us</h4>
                    <div class="d-flex gap-3">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="footer-bottom">
                © {{ date('Y') }} <strong>QuickBits Admin Panel</strong>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>