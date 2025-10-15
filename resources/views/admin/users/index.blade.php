@extends('layouts.admin')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div style="padding-top: 40px; font-family: 'Poppins', sans-serif; margin: 0; display: flex; justify-content: center;">

        <div class="card shadow-lg p-5" style="width: 800px; border-radius: 20px; background: #ffffff;">
            <h2 class="text-center mb-4" style="font-weight: 600; color: #dc3545;">All Users</h2>

            @if(session('success'))
                <div class="alert alert-success mb-3">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger mb-3">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-hover">
                <thead class="table-danger">
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th style="width: 100px;">Role</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');" style="display:inline-block;">
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
                            <td colspan="5" class="text-center text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="d-flex justify-content-center mt-4">
                {{ $users->links() }}
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