@extends('layouts.user')

@section('content')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div style="min-height: 100vh; font-family: 'Poppins', sans-serif; padding-top: 40px;">

    <div class="d-flex justify-content-center">
        <div class="card shadow-lg p-5" style="width: 450px; border-radius: 20px; background: #ffffff;">
            <h2 class="text-center mb-4" style="font-weight: 600; color: #333;">Login</h2>

            {{-- Display all validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Display success message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                           placeholder="Enter your password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100" 
                        style="background: linear-gradient(90deg, #6a11cb, #2575fc); border: none; font-weight: 600; padding: 12px 0; transition: 0.3s;">
                    Login
                </button>

                <a href="{{ route('register') }}" class="btn btn-link w-100 mt-2 text-center" style="text-decoration: none;">
                    Don't have an account? Register
                </a>
            </form>
        </div>
    </div>
</div>

<style>
    /* Placeholder smaller */
    .card input::placeholder {
        font-size: 0.85rem;
    }

    /* Focus effect */
    .card input.form-control:focus {
        box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
        border-color: #2575fc;
    }

    /* Button hover */
    .btn-primary:hover {
        filter: brightness(1.1);
    }

    body {
        margin: 0;
    }
</style>
@endsection
