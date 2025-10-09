<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }
        .error-box {
            background: white;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #d9534f;
        }
        a {
            text-decoration: none;
            color: #0275d8;
        }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>{{ session('error') ?? 'Something went wrong!' }}</h1>
        <p><a href="{{ url('/') }}">Go to Home</a></p>
    </div>
</body>
</html>
