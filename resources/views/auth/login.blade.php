<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - BSS Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a3a8a; /* Warna biru tua sesuai gambar */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            min-height: 100vh;
        }

        .main-container {
            max-width: 450px;
            margin: auto;
            padding: 20px;
        }

        /* Header Styles */
        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 30px;
        }

        .logo-img {
            width: 50px;
            height: auto;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-size: 0.9rem;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-text h1 {
            font-weight: bold;
            font-size: 2.5rem;
            letter-spacing: 2px;
        }

        /* Card Styles */
        .auth-card {
            background-color: #f0f0f0;
            border-radius: 50px; /* Lengkungan besar sesuai gambar */
            padding: 40px 30px;
            color: #333;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .auth-card h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 25px;
            font-size: 1.2rem;
        }

        /* Form Styles */
        .form-label {
            color: #666;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            background-color: #7a7a7a !important; /* Warna abu-abu input */
            border: none;
            border-radius: 10px;
            color: white !important;
            padding: 10px 15px;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .btn-login {
            background-color: #d9a86c; /* Warna cokelat/emas tombol */
            border: none;
            border-radius: 20px;
            padding: 8px 40px;
            color: black;
            font-weight: bold;
            display: block;
            margin: 20px auto 10px;
        }

        .footer-link {
            text-align: center;
            display: block;
            font-size: 0.85rem;
            color: #0d6efd;
            text-decoration: underline;
        }

        /* Bottom Image */
        .bottom-img-container {
            margin-top: 30px;
            border-radius: 50px;
            overflow: hidden;
            height: 250px;
        }

        .bottom-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Responsive Desktop */
        @media (min-width: 992px) {
            .main-container {
                max-width: 400px;
                padding-top: 50px;
            }
        }
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
        <p class="mb-0">Hii</p>
        <h1>WELCOME</h1>
    </div>

    <div class="auth-card">
        <h2>Login BSS Connect</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-login">Login</button>
</form>
    </div>

    <div class="bottom-img-container">
        <img src="{{ asset('images/graduation.jpg') }}" alt="Graduation">
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>