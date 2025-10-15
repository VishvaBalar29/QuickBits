@extends('layouts.user')

@section('content')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div style="min-height: 100vh; font-family: 'Poppins', sans-serif; display: flex; justify-content: center; align-items: center;">

    <div class="card shadow-lg p-5" style="width: 500px; border-radius: 20px; background: #ffffff;">
        <h2 class="text-center mb-4" style="font-weight: 600; color: #333;">Create Account</h2>

        <!-- {{-- Display all validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" 
                       value="{{ old('username') }}" placeholder="Enter your username">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" placeholder="Enter your email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Enter password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" 
                       placeholder="Re-enter password">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100" 
                    style="background: linear-gradient(90deg, #e63946, #b71c1c); border: none; font-weight: 600; padding: 12px 0; transition: 0.3s;">
                Register
            </button>

            <a href="{{ route('login') }}" class="btn btn-link w-100 mt-2 text-center red-link">
                Already have an account? Login
            </a>
        </form>
    </div>
</div>

<style>
    .card input::placeholder {
        font-size: 0.85rem;
    }

    .card input.form-control:focus {
        box-shadow: 0 0 5px rgba(230, 57, 70, 0.5); 
        border-color: #e63946;
    }

    .btn-primary:hover {
        filter: brightness(1.1);
    }

    body {
        margin: 0;
    }

    .red-link {
        color: #e63946;
        font-weight: 500;
        text-decoration: none;
    }

    .red-link:hover {
        color: #c00f1e;
        text-decoration: underline;
    }
</style>
@endsection
