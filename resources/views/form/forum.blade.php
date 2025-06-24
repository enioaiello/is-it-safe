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
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
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
        button {
            border: 1px solid #50C878;
            border-radius: 10px;
            width: 150px;
            transition: 0.3s ease-in-out;
        }

        button:hover {
            background-color: #50C878;
            color: white;
        }
        /* Responsive margin for small devices */
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
@vite(['resources/css/app.css'])
<header class="text-center">
    <h1 class="fw-bold">Is It Safe ?</h1>
</header>
<main class="container my-5">
    <h2 class="mb-3">{{ $forum->title }}</h2>
    <p class="lead">{{ $forum->description }}</p>
    <p class="text-muted">Created by: <strong>{{ $forum->user->pseudo }}</strong></p>
    <p class="text-muted">Created at: <em>{{ $forum->created_at->format('F jS Y') }}</em></p>

    <button id="add_comment_button" class="btn btn-primary mb-3">Add Comment</button>

    <form class="d-none mb-4" id="add_comment_form">
        @csrf
        <div class="mb-3">
            <label for="new_comment" class="form-label">Add comment</label>
            <textarea class="form-control" name="new_comment" id="new_comment" rows="3" required></textarea>
        </div>

        <input type="hidden" name="id-user" id="id-user" value="{{ auth()->user()->id }}">
        <input type="hidden" name="id_forum" id="id_forum" value="{{ $forum->id }}">
        <input type="hidden" name="pseudo" id="pseudo" value="{{ auth()->user()->pseudo ?? '' }}">

        <button type="submit" class="btn btn-success">Send</button>
    </form>

    <div class="comments">
        @if ($forum->comments->isEmpty())
            <div class="alert alert-info text-center">
                Aucun commentaire pour l’instant. Soyez le premier à commenter !
            </div>
        @else
            @foreach ($forum->comments as $comment)
                <div data-id-comment="{{ $comment->id }}" id="comment-card" class="card mb-3">
                    <div class="card-body">
                        <p class="card-text comment-content">{{ $comment->comment }}</p>

                        <div class="d-flex align-items-center mb-2">
                            <div class="mb-0 text-muted flex flex-row items-center">
                                <span>By: </span>
                                <img src="{{ asset('image/' . $comment->user?->picture?->picture_url) }}" alt="Profile picture" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;">
                                <span><strong>{{ $comment->user?->pseudo }}</strong></span>
                                @include('profile.partials.user-badges', ['user' => $comment->user, 'size' => '20px', 'highest' => true])
                            </div>
                        </div>

                        <p class="card-subtitle text-muted">
                            <small>Created at: {{ $comment->created_at->format('F jS Y') }}</small>
                        </p>

                        @if($comment->user?->pseudo === auth()->user()->pseudo)
                            <button data-id-comment="{{ $comment->id }}" id="edit-comment">Edit</button>
                            <button data-id-comment="{{ $comment->id }}" id="delete-comment">Delete</button>
                        @elseif(auth()->user()->id_role == 1 || auth()->user()->id_role == 2)
                            <button data-id-comment="{{ $comment->id }}" id="delete-comment">Delete</button>
                        @endif
                    </div>
                </div>
            @endforeach
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
<script src="{{ asset('js/badge-hover.js') }}"></script>
<script src="{{ asset('js/comment/new_comment.js') }}"></script>
<script src="{{ asset('js/comment/delete_comment.js') }}"></script>
<script src="{{ asset('js/comment/edit_comment.js') }}"></script>
</body>
</html>
