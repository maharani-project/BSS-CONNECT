<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - BSS Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1a3a8a;
            --card-bg: #f0f0f0;
            --input-bg: #7a7a7a;
            --accent-gold: #d9a86c;
        }

        body {
            background-color: var(--primary-blue);
            font-family: 'Inter', sans-serif;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .main-container {
            max-width: 420px;
            width: 100%;
            margin: auto;
            padding: 20px;
        }

        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .logo-img { width: 45px; height: auto; object-fit: contain; }

        .nav-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            margin-left: 15px;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .nav-links a:hover { color: white; text-shadow: 0 0 10px rgba(255,255,255,0.5); }

        .welcome-text { text-align: center; margin-bottom: 25px; }
        .welcome-text p { font-size: 1.1rem; opacity: 0.9; margin-bottom: -5px; }
        .welcome-text h1 { font-weight: 800; font-size: 2.8rem; letter-spacing: 3px; margin: 0; }

        .auth-card {
            background-color: var(--card-bg);
            border-radius: 40px;
            padding: 35px 30px;
            color: #333;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .auth-card h2 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.25rem;
        }

        .form-label {
            color: #555;
            font-weight: 600;
            font-size: 0.8rem;
            margin-left: 5px;
        }

        .form-control, .form-select {
            background-color: var(--input-bg) !important;
            border: none;
            border-radius: 12px;
            color: white !important;
            padding: 12px 15px;
            font-size: 0.9rem;
        }

        .form-control::placeholder { color: #bbb; }

        .btn-submit {
            background-color: var(--accent-gold);
            border: none;
            border-radius: 25px;
            padding: 10px 50px;
            color: #222;
            font-weight: 700;
            display: block;
            margin: 25px auto 15px;
            transition: transform 0.2s, background-color 0.2s;
        }

        .btn-submit:hover {
            transform: scale(1.05);
            background-color: #c4965d;
            color: black;
        }

        .footer-link {
            text-align: center;
            display: block;
            font-size: 0.8rem;
            color: #0d6efd;
            font-weight: 500;
        }

        .bottom-img-container {
            margin-top: 25px;
            border-radius: 40px;
            overflow: hidden;
            height: 180px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .bottom-img-container img { width: 100%; height: 100%; object-fit: cover; }
    </style>
</head>
<body>

<div class="main-container">
    <div class="header-nav">
        <img src="{{ asset('images/logoo.png') }}" alt="Logo" class="logo-img">
        <div class="nav-links">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

    <div class="welcome-text">
        <p>Hii</p>
        <h1>WELCOME</h1>
    </div>

    <div class="auth-card">
        <h2>Register BSS Connect</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger py-2" style="font-size: 0.8rem; border-radius: 10px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-2">
                <label class="form-label">Username</label>
                <input type="text" name="name" class="form-control" placeholder="User" value="{{ old('name') }}" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email@bss.com" value="{{ old('email') }}" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="......" required>
                <div class="mb-2">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="......" required>
            </div>
            </div>

            <button type="submit" class="btn btn-submit shadow-sm">Daftar</button>
            <a href="{{ route('login') }}" class="footer-link">Sudah Punya Akun?</a>
        </form>
    </div>

    <div class="bottom-img-container">
        <img src="{{ asset('images/graduation.jpg') }}" alt="Graduation">
    </div>
</div>

</body>
</html>