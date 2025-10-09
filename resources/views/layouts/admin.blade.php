<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    {{-- News Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('admin.news.index') }}" role="button" >
                            News
                        </a>
                    </li>

                    {{-- Category Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('admin.category.index') }}" role="button">
                            Category
                        </a>                       
                    </li>

                    {{-- Users Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('admin.users.index') }}" id="usersDropdown" role="button">
                            Users
                        </a>
                    </li>

                    {{-- Logout --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
