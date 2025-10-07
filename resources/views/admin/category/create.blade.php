@extends('layouts.admin')

@section('content')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div style="min-height: 100vh; font-family: 'Poppins', sans-serif; background-color: #f5f5f5; padding-top: 40px;">

    <div class="d-flex justify-content-center">
        <div class="card shadow-lg p-5" style="width: 450px; border-radius: 20px; background: #ffffff;">
            <h2 class="text-center mb-4" style="font-weight: 600; color: #333;">Add Category</h2>

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

            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" placeholder="Enter category name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100" 
                        style="background: linear-gradient(90deg, #6a11cb, #2575fc); border: none; font-weight: 600; padding: 12px 0; transition: 0.3s;">
                    Add Category
                </button>
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
