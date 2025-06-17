<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Is it safe ?</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">

    <style>
        body {
            background-color: #50C878;
            font-family: 'Instrument Sans', sans-serif;
        }
        .content-wrapper {
            min-height: calc(100vh - 120px);
        }
        .text-side {
            max-width: 500px;
        }
    </style>
</head>
<body>
<header class="w-100 py-3">
    @if (Route::has('login'))
        <nav class="d-flex justify-content-end gap-3">
            <a href="{{ url('/forum') }}" class="btn btn-outline-dark btn-sm">
                Forum
            </a>
            <a href="{{ url('/propos') }}" class="btn btn-outline-dark btn-sm">
                A propos
            </a>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark btn-sm">
                    Mon compte
                </a>

                @if($user->id_role < 3)
                    <a href="{{ route('admin') }}" class="btn btn-outline-dark btn-sm">
                        Espace moderateur
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-dark btn-sm">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>
<div class="content-wrapper d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 text-side">
                <h1 class="display-4 fw-bold mb-3">Bienvenue sur is it safe !!</h1>
                <p class="lead mb-4">"Votre sécurité, notre priorité"</p>

                @auth()
                    <div class="d-flex gap-3">
                        <a href="{{ url('/safe-it') }}" class="btn btn-light border border-2 border-white px-4 py-2">
                            Safe-it
                        </a>
                        <a href="{{ url('/report-it') }}" class="btn btn-light border border-2 border-white px-4 py-2">
                            Report-it
                        </a>
                    </div>
                @endauth
            </div>
            <div class="col-md-5 d-none d-md-block">
                <div style="height: 300px; background-color: rgba(255,255,255,0.2); border-radius: 20px;" class="d-flex align-items-center justify-content-center p-3">
                    <img src="{{ asset('img/samba-removebg-preview.png') }}"
                         alt="Illustration Samba"
                         class="img-fluid h-100"
                         style="object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
