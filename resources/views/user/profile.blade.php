<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <div class="profile-container">
        <h1>My Profile</h1>
        <div class="profile-item">
            <label>Username:</label> <span>{{ $user->username }}</span>
        </div>
        <div class="profile-item">
            <label>Email:</label> <span>{{ $user->email }}</span>
        </div>
        <div class="profile-item">
            <label>Role:</label> <span>{{ ucfirst($user->role) }}</span>
        </div>
        <div class="profile-item">
            <label>Member Since:</label> <span>{{ $user->created_at->format('d M, Y') }}</span>
        </div>
    </div>
</body>
</html>
