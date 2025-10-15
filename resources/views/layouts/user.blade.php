<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'QuickBits')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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

        /* ===== NAVBAR ===== */
        .navbar {
            background: linear-gradient(90deg, #c82333, #dc3545);
            padding: 0.8rem 1rem;
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

        .my-5{
            margin-top: 0px !important;
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

        .profile-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
        }

        .navbar-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        /* ===== FOOTER ===== */
        footer.footer {
            background: linear-gradient(135deg, #0b0c10, #1f2833);
            color: #fff;
            padding: 60px 0 30px;
            font-family: 'Poppins', sans-serif;
        }

        .footer h5,
        .footer h3 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #ffffff;
        }

        .footer p {
            color: #cccccc;
            font-size: 15px;
        }

        .footer-link {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #fff;
        }

        .social-link {
            font-size: 1.5rem;
            color: #aaa;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .social-link:hover {
            color: #dc3545;
            transform: scale(1.1);
        }

        hr {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
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

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container position-relative">

            <!-- Left side -->
            <div class="d-flex align-items-center">
                @auth
                    <a href="{{ route('user.profile') }}" class="nav-link me-2 p-0">
                        <img src="{{ asset(auth()->user()->profile_photo ?? 'uploads/users/default.png') }}" class="profile-icon" alt="Profile">
                    </a>
                @endauth
            </div>

            <!-- Centered Brand -->
            <a class="navbar-brand navbar-center" href="{{ url('/news') }}">
                <i class="bi bi-lightning-charge-fill"></i> QUICKBITS
            </a>

            <!-- Right side menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavUser">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavUser">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="container main-container my-5">
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer mt-auto">
        <div class="container">
            <div class="row gy-4">
                <!-- About -->
                <div class="col-md-4">
                    <h3 class="mb-3">QuickBits</h3>
                    <p>Your daily source of lightning-fast, trustworthy updates in Sports, Tech, Politics & Entertainment.</p>
                </div>

                <!-- Links -->
                <div class="col-md-4">
                    <h5 class="mb-3">Explore</h5>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ url('/') }}" class="footer-link">Home</a>
                        <a href="{{ url('/news?category=Sports') }}" class="footer-link">Sports</a>
                        <a href="{{ url('/news?category=Technology') }}" class="footer-link">Technology</a>
                        <a href="{{ url('/news?category=Politics') }}" class="footer-link">Politics</a>
                        <a href="{{ url('/news?category=Entertainment') }}" class="footer-link">Entertainment</a>
                    </div>
                </div>

                <!-- Social -->
                <div class="col-md-4">
                    <h5 class="mb-3">Connect with Us</h5>
                    <p class="mb-2 text-secondary">Follow QuickBits for instant updates</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="footer-bottom">
                © {{ date('Y') }} <strong>QuickBits</strong>. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
