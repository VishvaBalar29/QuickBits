@extends('layouts.admin')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div style="min-height: 100vh; font-family: 'Poppins', sans-serif; display: flex; justify-content: center; align-items: center;">
    <div class="card shadow-lg p-5" style="width: 550px; border-radius: 20px; background: #ffffff;">
        <h2 class="text-center mb-4" style="font-weight: 600; color: #dc3545;">Add News</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Enter news title" value="{{ old('title') }}" >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_desc" class="form-control @error('short_desc') is-invalid @enderror" rows="4"
                    placeholder="Write news description..." >{{ old('short_desc') }}</textarea>
                @error('short_desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" name="is_published" value="1" class="form-check-input" id="publishCheck"
                    {{ old('is_published') ? 'checked' : '' }}>
                <label class="form-check-label" for="publishCheck">Publish Now</label>
            </div>

            <button type="submit" class="btn w-100"
                style="background: linear-gradient(90deg, #dc3545, #b71c1c); color: #fff; font-weight: 600; padding: 12px 0; border: none;">
                Add News
            </button>
        </form>
    </div>
</div>

<style>
    .card input::placeholder,
    .card textarea::placeholder {
        font-size: 0.85rem;
    }

    .card input.form-control:focus,
    .card textarea.form-control:focus,
    .card select.form-control:focus {
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
        border-color: #dc3545;
    }

    .btn:hover {
        filter: brightness(1.1);
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 14px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 14px;
    }

    body {
        margin: 0;
    }
</style>
@endsection
