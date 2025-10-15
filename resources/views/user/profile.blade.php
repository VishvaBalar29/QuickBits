@extends('layouts.user')

@section('title', 'My Profile')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div style="padding-top: 40px; font-family: 'Poppins', sans-serif; margin: 0; display: flex; justify-content: center;">

    <div class="card shadow-lg p-5" style="width: 500px; border-radius: 20px; background: #ffffff;">
        <h2 class="text-center mb-4" style="font-weight: 600; color: #dc3545;">My Profile</h2>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600;">Username:</label>
            <div style="color: #333;">{{ $user->username }}</div>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600;">Email:</label>
            <div style="color: #333;">{{ $user->email }}</div>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600;">Role:</label>
            <div style="color: #333;">{{ ucfirst($user->role) }}</div>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600;">Member Since:</label>
            <div style="color: #333;">{{ $user->created_at->format('d M, Y') }}</div>
        </div>
    </div>
</div>

<style>
    body {
        margin: 0;
    }
</style>
@endsection
