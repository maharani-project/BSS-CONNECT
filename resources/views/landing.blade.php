<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1E3A8A; /* Biru */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        /* Judul diperbesar dari 40px ke 56px */
        .title {
            color: white;
            font-size: 56px; 
            font-weight: bold;
            margin-bottom: 40px;
            letter-spacing: 2px;
        }

        /* Tombol diperbesar font dan paddingnya */
        .start-btn {
            background-color: #D4A373;
            color: white;
            padding: 15px 70px;
            border-radius: 40px;
            font-size: 22px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .start-btn:hover {
            background-color: #c08c5a;
            color: white;
        }

        .logo {
            margin-bottom: 40px;
        }

        /* Menghilangkan border default img jika ada */
        .logo img {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/logoo.png') }}" alt="Logo" width="250">
        </div>
        <div class="title">BSS CONNECT</div>
        <a href="{{ route('login') }}" class="start-btn">Start</a>
    </div>
</body>
</html>