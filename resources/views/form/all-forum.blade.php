<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        body {
            background: #198754;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        header {
            padding: 2rem 1rem 1rem;
        }
        footer {
            padding: 1.5rem 1rem;
            margin-top: auto;
            text-align: center;
        }
        footer .btn {
            min-width: 110px;
            margin: 0.25rem 0.5rem;
        }
        @media (max-width: 575.98px) {
            .form-container {
                margin: 1rem 1rem 2rem;
                padding: 1.5rem 1.5rem;
            }
            footer .btn {
                min-width: 100px;
                margin: 0.25rem 0.25rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<header class="text-center">
    <h1 class="fw-bold">Is It Safe ?</h1>
</header>
<main class="container my-5">
    <div class="container my-5">
        <h1 class="mb-4">Liste des forums</h1>

        @foreach ($forums as $forum)
            <div class="card mb-3">
                <div class="card-body">
                    <h3>
                        <a href="{{ url('/forum/'.$forum->id) }}">{{ $forum->title }}</a>
                    </h3>
                    <p>{{ Str::limit($forum->description, 150) }}</p>
                    <p class="text-muted mb-0">
                        Créé par <strong>{{ $forum->user->pseudo ?? 'Utilisateur supprimé' }}</strong>
                        le {{ $forum->created_at->format('F jS Y') }}
                    </p>
                </div>
            </div>
        @endforeach

        @if($forums->isEmpty())
            <p>Aucun forum disponible.</p>
        @endif
    </div>
</main>
<footer>
    <button type="button" class="btn btn-success">
        <i class="fas fa-comments me-2" aria-hidden="true"></i>Forum
    </button>
    <button type="button" class="btn btn-success">
        <i class="fas fa-info-circle me-2" aria-hidden="true"></i>A propos
    </button>
    <a href="/profile">
        <button type="button" class="btn btn-success">
            <i class="fas fa-user me-2" aria-hidden="true" ></i>Mon compte
        </button>
    </a>
</footer>
</body>
</html>
