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
    <h1 class="mb-4">Liste des forums</h1>

    <button id="new-forum-button" class="btn btn-primary mb-4">Créer un Forum</button>

    <form id="new-forum-form" class="mb-4 d-none">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required maxlength="255">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <input type="hidden" name="id-user" id="id-user" value="{{ auth()->user()->id }}">
        <input type="hidden" name="pseudo" id="pseudo" value="{{ auth()->user()->pseudo }}">
        <button type="submit" class="btn btn-success">Créer</button>
        <button type="button" id="cancel-new-forum" class="btn btn-secondary">Annuler</button>
    </form>


    <div class="forums">
        @foreach ($forums as $forum)
            <div class="card mb-3">
                <div class="card-body clickable cursor-pointer" data-id="{{ $forum->id }}">
                    <h3 class="title"><a href="/forum/{{ $forum->id }}">{{ $forum->title }}</a></h3>
                    <p class="description">{{ Str::limit($forum->description, 150) }}</p>
                    <p class="text-muted mb-0">
                        Créé par <strong>{{ $forum->user->pseudo ?? 'Utilisateur supprimé' }}</strong>
                        le {{ $forum->created_at->format('F jS Y') }}
                    </p>
                    @if($forum->user->pseudo === auth()->user()->pseudo)
                        <button data-id-forum="{{ $forum->id }}" id="edit-forum">Edit</button>
                        <button data-id-forum="{{ $forum->id }}" id="delete-forum">Delete</button>
                    @elseif(auth()->user()->id_role == 1 || auth()->user()->id_role == 2)
                        <button data-id-forum="{{ $forum->id }}" id="delete-forum">Delete</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>


@if($forums->isEmpty())
<div class="card mb-3">
@if($trimmed)
<p class=" pt-3 pb-3 mb-0 fs-3 fw-bold text-center">Aucun forum concernant {{ $trimmed }} n’a été créé. Tu peux en créer un !</p>
@else
        <p class="pt-3 pb-3 mb-0 fs-3 fw-bold text-center">Aucun forum disponible. Commence la discussion !</p>
        @endif
    </div>
    @endif
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
<script src="{{ asset('js/forum/new_forum.js') }}"></script>
<script src="{{ asset('js/forum/edit_forum.js') }}"></script>
<script src="{{ asset('js/forum/delete_forum.js') }}"></script>
</body>
</html>
