<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'QuickBits')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 22px;
        }

        .profile-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        footer {
            background: #212529;
            color: #ffffff;
            padding: 30px 0;
            margin-top: 40px;
        }

        footer a {
            color: #adb5bd;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffffff;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 20px;
            padding-top: 15px;
            font-size: 14px;
            color: #bbb;
        }

        footer.footer {
            background: linear-gradient(135deg, #111 0%, #222 100%);
            font-family: 'Poppins', sans-serif;
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
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">QuickBits</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavUser"
                aria-controls="navbarNavUser" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavUser">
                {{-- Left Menu --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/news?category=Sports') }}">Sports</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ url('/news?category=Technology') }}">Technology</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/news?category=Politics') }}">Politics</a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ url('/news?category=Entertainment') }}">Entertainment</a></li>
                </ul>

                {{-- Right Menu --}}
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('user.profile') }}" class="nav-link p-0 me-2">
                                <img src="{{ asset(auth()->user()->profile_photo ?? 'uploads/users/default.png') }}"
                                    alt="Profile" class="profile-icon">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer mt-auto py-5 text-light">
        <div class="container">
            <div class="row gy-4">
                {{-- Brand Section --}}
                <div class="col-md-4">
                    <h3 class="fw-bold text-uppercase mb-3">QuickBits</h3>
                    <p class="text-white-50">
                        Stay updated with the latest headlines across Sports, Technology, Politics, and Entertainment —
                        your daily dose of quick and reliable news.
                    </p>
                </div>

                {{-- Menu Links --}}
                <div class="col-md-4">
                    <h5 class="fw-semibold mb-3">Explore</h5>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ url('/') }}" class="footer-link">Home</a>
                        <a href="{{ url('/news?category=Sports') }}" class="footer-link">Sports</a>
                        <a href="{{ url('/news?category=Technology') }}" class="footer-link">Technology</a>
                        <a href="{{ url('/news?category=Politics') }}" class="footer-link">Politics</a>
                        <a href="{{ url('/news?category=Entertainment') }}" class="footer-link">Entertainment</a>
                    </div>
                </div>

                {{-- Contact / Social --}}
                <div class="col-md-4">
                    <h5 class="fw-semibold mb-3">Connect With Us</h5>
                    <p class="text-white-50 mb-2">Follow QuickBits on social media:</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>

            <hr class="border-light my-4">

            <div class="text-center text-white-50 small">
                © {{ date('Y') }} <strong>QuickBits</strong>. All rights reserved.
            </div>
        </div>
    </footer>


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>