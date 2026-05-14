<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - BSS Connect</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family:'Plus Jakarta Sans', sans-serif;
        }

        :root{
            --primary:#17337a;
            --secondary:#1f3f99;
            --gold:#d9a86c;
            --light:#f4f7fb;
        }

        body{
            min-height:100vh;
            background:
                linear-gradient(rgba(10,20,50,.82), rgba(10,20,50,.82)),
                url("{{ asset('images/graduation.jpg') }}");
            background-size:cover;
            background-position:center;
            overflow-x:hidden;
            position:relative;
        }

        body::before{
            content:'';
            position:absolute;
            width:600px;
            height:600px;
            border-radius:50%;
            background:rgba(255,255,255,.04);
            top:-200px;
            right:-150px;
        }

        body::after{
            content:'';
            position:absolute;
            width:450px;
            height:450px;
            border-radius:50%;
            background:rgba(255,255,255,.03);
            bottom:-150px;
            left:-100px;
        }

        .main-wrapper{
            position:relative;
            z-index:2;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px 20px;
        }

        .login-container{
            width:100%;
            max-width:1250px;
        }

        .login-card{
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(20px);
            border:1px solid rgba(255,255,255,0.10);
            border-radius:40px;
            overflow:hidden;
            box-shadow:0 25px 60px rgba(0,0,0,.35);
        }

        .left-side{
            padding:60px;
            color:white;
            position:relative;
            height:100%;
            background:
                linear-gradient(135deg, rgba(23,51,122,.95), rgba(31,63,153,.90));
        }

        .logo-box{
            width:60px;
            height:60px;
            border-radius:20px;
            background:rgba(255,255,255,.15);
            display:flex;
            align-items:center;
            justify-content:center;
            margin-bottom:25px;
        }

        .logo-box i{
            font-size:26px;
        }

        .brand-title{
            font-size:2.6rem;
            font-weight:800;
            line-height:1.2;
        }

        .brand-desc{
            margin-top:18px;
            color:rgba(255,255,255,.75);
            line-height:1.8;
            max-width:480px;
        }

        .feature-box{
            margin-top:45px;
        }

        .feature-item{
            display:flex;
            align-items:center;
            gap:15px;
            margin-bottom:20px;
        }

        .feature-icon{
            width:50px;
            height:50px;
            border-radius:18px;
            background:rgba(255,255,255,.12);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:18px;
        }

        .right-side{
            background:white;
            padding:60px;
            height:100%;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .top-nav{
            position:absolute;
            top:30px;
            right:40px;
        }

        .top-nav a{
            text-decoration:none;
            color:white;
            margin-left:20px;
            font-size:.95rem;
            font-weight:600;
            transition:.3s;
        }

        .top-nav a:hover{
            opacity:.8;
        }

        .login-title{
            font-size:2.2rem;
            font-weight:800;
            color:#111827;
            margin-bottom:10px;
        }

        .login-subtitle{
            color:#6b7280;
            margin-bottom:35px;
        }

        .form-label{
            font-size:.9rem;
            font-weight:700;
            color:#374151;
            margin-bottom:10px;
        }

        .input-group-custom{
            position:relative;
            margin-bottom:22px;
        }

        .input-group-custom i{
            position:absolute;
            top:50%;
            left:18px;
            transform:translateY(-50%);
            color:#9ca3af;
            font-size:15px;
        }

        .form-control{
            height:58px;
            border-radius:18px !important;
            border:1px solid #e5e7eb !important;
            padding-left:52px;
            background:#f9fafb !important;
            transition:.25s ease;
            font-size:.95rem;
        }

        .form-control:focus{
            border-color:#17337a !important;
            box-shadow:0 0 0 4px rgba(23,51,122,.08) !important;
            background:white !important;
        }

        .btn-login{
            width:100%;
            height:58px;
            border:none;
            border-radius:18px;
            background:linear-gradient(135deg,#17337a,#1f3f99);
            color:white;
            font-weight:700;
            font-size:1rem;
            transition:.25s ease;
            margin-top:10px;
        }

        .btn-login:hover{
            transform:translateY(-2px);
            box-shadow:0 15px 25px rgba(23,51,122,.25);
        }

        .bottom-link{
            text-align:center;
            margin-top:22px;
            font-size:.95rem;
            color:#6b7280;
        }

        .bottom-link a{
            text-decoration:none;
            color:#17337a;
            font-weight:700;
        }

        .stats-box{
            display:flex;
            gap:15px;
            margin-top:40px;
            flex-wrap:wrap;
        }

        .stats-item{
            background:rgba(255,255,255,.10);
            border:1px solid rgba(255,255,255,.10);
            padding:18px 22px;
            border-radius:22px;
            min-width:140px;
        }

        .stats-item h3{
            font-size:1.5rem;
            font-weight:800;
            margin-bottom:4px;
        }

        .stats-item p{
            font-size:.8rem;
            opacity:.75;
            margin:0;
        }

        @media(max-width:991px){

            .left-side{
                display:none;
            }

            .right-side{
                padding:40px 25px;
            }

            .login-title{
                font-size:1.9rem;
            }

            .top-nav{
                position:relative;
                top:auto;
                right:auto;
                text-align:center;
                margin-bottom:25px;
            }

            .top-nav a{
                color:#111827;
            }

        }

    </style>

</head>

<body>

<div class="main-wrapper">

    <div class="login-container">

        <div class="login-card">

            <div class="row g-0">

                <!-- LEFT -->
                <div class="col-lg-6 position-relative">

                    <div class="left-side">

                        <div class="logo-box">
    <img src="{{ asset('images/logoo.png') }}"
         alt="Logo BSS Connect"
         class="logo-img">
</div>

                        <h1 class="brand-title">
                            Welcome Back <br>
                            To BSS Connect
                        </h1>

                        <p class="brand-desc">
                            Platform digital mahasiswa modern untuk mengelola jadwal,
                            pengumuman, reward, dan seluruh aktivitas akademik dalam
                            satu sistem terintegrasi.
                        </p>

                        <div class="feature-box">

                            <div class="feature-item">

                                <div class="feature-icon">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>

                                <div>
                                    <h6 class="mb-1 fw-bold">Manajemen Jadwal</h6>
                                    <small class="text-white-50">
                                        Pantau seluruh agenda mahasiswa
                                    </small>
                                </div>

                            </div>

                            <div class="feature-item">

                                <div class="feature-icon">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>

                                <div>
                                    <h6 class="mb-1 fw-bold">Informasi Real-Time</h6>
                                    <small class="text-white-50">
                                        Pengumuman langsung dari sistem
                                    </small>
                                </div>

                            </div>

                            <div class="feature-item">

                                <div class="feature-icon">
                                    <i class="fa-solid fa-trophy"></i>
                                </div>

                                <div>
                                    <h6 class="mb-1 fw-bold">Reward Mahasiswa</h6>
                                    <small class="text-white-50">
                                        Sistem poin dan apresiasi mahasiswa
                                    </small>
                                </div>

                            </div>

                        </div>

                        <div class="stats-box">

                            <div class="stats-item">
                                <h3>24/7</h3>
                                <p>Sistem Aktif</p>
                            </div>

                            <div class="stats-item">
                                <h3>100%</h3>
                                <p>Responsive UI</p>
                            </div>

                            <div class="stats-item">
                                <h3>BSS</h3>
                                <p>Connect System</p>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="col-lg-6 position-relative">

                    <div class="top-nav">

                        <a href="{{ route('login') }}">
                            Login
                        </a>

                        <a href="{{ route('register') }}">
                            Register
                        </a>

                    </div>

                    <div class="right-side">

                        <div class="mb-4">

                            <p class="text-uppercase fw-bold text-primary mb-2"
                               style="letter-spacing:2px; font-size:.8rem;">
                                BSS CONNECT
                            </p>

                            <h2 class="login-title">
                                Login Account
                            </h2>

                            <p class="login-subtitle">
                                Masukkan email dan password untuk masuk ke sistem.
                            </p>

                        </div>

                        <form method="POST" action="{{ route('login') }}">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <div class="input-group-custom">

                                    <i class="fa-solid fa-envelope"></i>

                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           placeholder="Masukkan email"
                                           required>

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Password
                                </label>

                                <div class="input-group-custom">

                                    <i class="fa-solid fa-lock"></i>

                                    <input type="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="Masukkan password"
                                           required>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-login">

                                <i class="fa-solid fa-right-to-bracket me-2"></i>
                                Login Sekarang

                            </button>

                        </form>

                        <div class="bottom-link">

                            Belum punya akun?
                            <a href="{{ route('register') }}">
                                Register Sekarang
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>