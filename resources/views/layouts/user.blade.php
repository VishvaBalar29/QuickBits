<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'QuickBits')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Simple navbar styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }
        .navbar ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 20px;
        }
        .navbar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        .navbar ul li a:hover {
            color: #0275d8;
        }
        .navbar-right {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .profile-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo">QuickBits</a>

        <ul class="menu">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/news?category=Sports') }}">Sports</a></li>
            <li><a href="{{ url('/news?category=Technology') }}">Technology</a></li>
            <li><a href="{{ url('/news?category=Politics') }}">Politics</a></li>
            <li><a href="{{ url('/news?category=Entertainment') }}">Entertainment</a></li>
        </ul>

        <div class="navbar-right">
            @auth
                <a href="{{ route('user.profile') }}">
                    <img src="{{ asset(auth()->user()->profile_photo ?? 'uploads/users/default.png') }}" alt="Profile" class="profile-icon">
                </a>
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
