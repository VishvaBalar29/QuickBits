@extends('layouts.admin')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

@endpush

@section('content')
<div style="min-height: 100vh; font-family: 'Poppins', sans-serif; display: flex; justify-content: center; align-items: center; ">
    <div class="card shadow-lg p-5" style="width: 550px; border-radius: 20px; background: #ffffff;">
        <h2 class="text-center mb-4" style="font-weight: 600; color: #dc3545;">Edit News</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $news->title }}" placeholder="Enter news title" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_desc" class="form-control" rows="4" placeholder="Write a short description..." required>{{ $news->short_desc }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                @if($news->image)
                    <img src="{{ asset('uploads/news/'.$news->image) }}" width="100" alt="news image" class="rounded mb-2">
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Change Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" name="is_published" value="1" class="form-check-input" id="publishCheck" {{ $news->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="publishCheck">Publish Now</label>
            </div>

            <button type="submit" class="btn w-100" style="background: linear-gradient(90deg, #dc3545, #b71c1c); color: #fff; font-weight: 600; padding: 12px 0; border: none;">
                Update News
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

    body {
        margin: 0;
    }
</style>
@endsection
