@extends('layouts.admin')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div style="padding-top: 40px; font-family: 'Poppins', sans-serif; margin: 0; display: flex; justify-content: center;">

    <div class="card shadow-lg p-5" style="width: 500px; border-radius: 20px; background: #ffffff;">
        <h2 class="text-center mb-4" style="font-weight: 600; color: #dc3545;">Add Category</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label style="font-weight: 600;">Category Name</label>
                <input type="text" name="name" placeholder="Enter category name" value="{{ old('name') }}" required
                    style="width: 100%; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
            </div>

            <div style="text-align: center;">
                <button type="submit" class="btn" style="background: linear-gradient(90deg, #dc3545, #b71c1c); color: #fff; font-weight: 600; padding: 8px 16px; border-radius: 8px;">
                    Add Category
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 14px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 14px;
    }

    body {
        margin: 0;
    }
</style>
@endsection
