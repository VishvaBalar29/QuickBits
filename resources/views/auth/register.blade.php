@extends('layouts.admin')

@section('content')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div style="min-height: 100vh; font-family: 'Poppins', sans-serif; background-color: #f5f5f5; padding-top: 40px;">

    <div class="d-flex justify-content-center">
        <div class="card shadow-lg p-5" style="width: 500px; border-radius: 20px; background: #ffffff;">
            <h2 class="text-center mb-4" style="font-weight: 600; color: #333;">Create Account</h2>

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

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Username --}}
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" 
                           value="{{ old('username') }}" placeholder="Enter your username">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

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
                           placeholder="Enter password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" 
                           placeholder="Re-enter password">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100" 
                        style="background: linear-gradient(90deg, #6a11cb, #2575fc); border: none; font-weight: 600; padding: 12px 0; transition: 0.3s;">
                    Register
                </button>

                <a href="{{ route('login') }}" class="btn btn-link w-100 mt-2 text-center" style="text-decoration: none; color: #2575fc;">
                    Already have an account? Login
                </a>
            </form>
        </div>
    </div>
</div>

<style>
    /* Smaller placeholder font */
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
