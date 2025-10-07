@extends('layouts.admin')

@section('content')
<!-- Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; 
            font-family: 'Poppins', sans-serif; background-color: #f5f5f5;">

    <div class="card shadow-lg p-5" style="width: 550px; border-radius: 20px; background: #ffffff;">
        <h2 class="text-center mb-4" style="font-weight: 600; color: #333;">Add News</h2>

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

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                       placeholder="Enter news title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
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

            {{-- Short Description --}}
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_desc" class="form-control @error('short_desc') is-invalid @enderror" 
                          rows="4" placeholder="Write news description...">{{ old('short_desc') }}</textarea>
                @error('short_desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Publish Checkbox --}}
            <div class="mb-3 form-check">
                <input type="checkbox" name="is_published" value="1" class="form-check-input" id="publishCheck" {{ old('is_published') ? 'checked' : '' }}>
                <label class="form-check-label" for="publishCheck">Publish Now</label>
            </div>

            <button type="submit" class="btn btn-primary w-100" 
                    style="background: linear-gradient(90deg, #6a11cb, #2575fc); border: none; font-weight: 600; padding: 12px 0; transition: 0.3s;">
                Add News
            </button>
        </form>
    </div>
</div>

<style>
    /* Placeholder font smaller */
    .card input::placeholder,
    .card textarea::placeholder {
        font-size: 0.85rem;
    }

    /* Focus effect for inputs */
    .card input.form-control:focus,
    .card textarea.form-control:focus,
    .card select.form-control:focus {
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
