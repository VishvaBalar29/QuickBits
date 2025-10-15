@extends('layouts.admin')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div style="padding-top: 40px; font-family: 'Poppins', sans-serif; margin: 0; display: flex; justify-content: center;">

        <div class="card shadow-lg p-5" style="width: 700px; border-radius: 20px; background: #ffffff;">
            <h2 class="text-center mb-4" style="font-weight: 600; color: #dc3545;">All Categories</h2>

            @if (session('success'))
                <div class="alert alert-success mb-3">{{ session('success') }}</div>
            @endif

            <div class="text-end mb-3">
                <a href="{{ route('admin.category.create') }}" class="btn"
                    style="background: linear-gradient(90deg, #dc3545, #b71c1c); color: #fff; font-weight: 600; padding: 8px 16px; border-radius: 8px; text-decoration: none;">
                    + Add Category
                </a>
            </div>

            <table class="table table-bordered table-hover">
                <thead class="table-danger">
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Name</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="text-warning me-2"
                                    title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                    style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon text-danger" title="Delete"
                                        style="background:none; border:none;">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="d-flex justify-content-center mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>

    <style>
        .btn-icon:hover i {
            opacity: 0.8;
            transform: scale(1.1);
            transition: all 0.2s ease;
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