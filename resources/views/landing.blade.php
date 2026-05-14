<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSS Connect</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family:'Plus Jakarta Sans', sans-serif;
        }

        body{
            background:
                linear-gradient(135deg,#17337a,#1f3f99);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:0;
            overflow:hidden;
            position:relative;
        }

        /* BACKGROUND EFFECT */
        body::before{
            content:'';
            position:absolute;
            width:600px;
            height:600px;
            border-radius:50%;
            background:rgba(255,255,255,.04);
            top:-250px;
            right:-180px;
        }

        body::after{
            content:'';
            position:absolute;
            width:450px;
            height:450px;
            border-radius:50%;
            background:rgba(255,255,255,.03);
            bottom:-180px;
            left:-120px;
        }

        .container{
            position:relative;
            z-index:2;
            text-align:center;
            animation:fadeIn 1s ease;
        }

        .logo{
            margin-bottom:35px;
        }

        .logo img{
            width:240px;
            object-fit:contain;
            filter:drop-shadow(0 15px 25px rgba(0,0,0,.25));
            transition:.35s ease;
        }

        .logo img:hover{
            transform:scale(1.05) rotate(-2deg);
        }

        .title{
            color:white;
            font-size:68px;
            font-weight:800;
            margin-bottom:40px;
            letter-spacing:5px;
            text-shadow:0 10px 25px rgba(0,0,0,.25);
        }

        .start-btn{
            display:inline-flex;
            align-items:center;
            gap:12px;
            background:linear-gradient(135deg,#d4a373,#c58a4d);
            color:white;
            padding:18px 75px;
            border-radius:60px;
            font-size:22px;
            font-weight:700;
            text-decoration:none;
            transition:.3s ease;
            box-shadow:0 15px 30px rgba(0,0,0,.25);
        }

        .start-btn:hover{
            background:linear-gradient(135deg,#c58a4d,#b97a3d);
            transform:translateY(-4px) scale(1.03);
            color:white;
            box-shadow:0 20px 40px rgba(0,0,0,.35);
        }

        .start-btn i{
            font-size:18px;
        }

        @keyframes fadeIn{

            from{
                opacity:0;
                transform:translateY(20px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }

        }

        @media(max-width:768px){

            .logo img{
                width:180px;
            }

            .title{
                font-size:44px;
                letter-spacing:2px;
            }

            .start-btn{
                width:100%;
                justify-content:center;
                padding:16px 20px;
                font-size:18px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="logo">

        <img src="{{ asset('images/logoo.png') }}" alt="Logo">

    </div>

    <div class="title">
        BSS CONNECT
    </div>

    <a href="{{ route('login') }}" class="start-btn">

        <i class="fa-solid fa-arrow-right"></i>
        Start

    </a>

</div>

</body>
</html>