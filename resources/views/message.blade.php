<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Is It Safe ? Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" />
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
        rel="stylesheet"
    />
    <style>
        body {
            background-color: #50C878;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            padding: 2rem 1rem 1rem;
        }
        .form-container {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 2rem 3rem;
            max-width: 480px;
            margin: 2rem auto;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.05);
        }
        footer {
            padding: 1.5rem 1rem;
            margin-top: auto;
            text-align: center;
            background: #157347;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        footer .btn {
            min-width: 120px;
            margin: 0.25rem 0.5rem;
            font-size: 1rem;
            border-radius: 0.5rem;
            color: #198754;
            background-color: white;
            border: none;
        }

        footer .btn:hover {
            background-color: #f8f9fa;
            color: #115c3f;
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
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<header class="text-center">
    <h1 class="fw-bold">Messagerie</h1>
</header>

<main class="container py-4">
    @if(auth()->user()->id_role == 1 || auth()->user()->id_role == 2)
        <button id="form-btn" class="btn btn-success mb-3">
            <i class="fas fa-plus me-2"></i> Add message
        </button>

        <form id="form-message" class="d-none bg-white p-4 rounded shadow-sm border mx-auto d-block mb-4" style="max-width: 480px;">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required maxlength="100">
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write your message" required maxlength="10000"></textarea>
            </div>

            <input type="hidden" name="id_user" id="id_user" value="{{ auth()->user()->id }}">

            <button type="submit" class="btn btn-primary w-100">Send message</button>
        </form>
    @endif
    @foreach($messages as $message)
        <div id="messages-container">
            <div class="card message-card mb-3">
                <div class="card-header d-flex align-items-center">
                    <img src="{{ asset('image/' . $message->user->picture->picture_url) }}" class="rounded-circle me-3" alt="Photo de {{ $message->user->pseudo }}" width="50" height="50">
                    <div>
                        <h6 class="mb-0">
                            {{ $message->user->pseudo }}
                            <span class="ms-2 d-inline-block align-middle">
                                @include('profile.partials.user-badges', ['user' => $message->user, 'size' => '20px', 'highest' => true])
                            </span>
                        </h6>
                        <small>{{ $message->created_at->format('d/m/Y H:i') }}</small>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $message->title }}</h5>
                    <p class="card-text">{{ $message->message }}</p>
                </div>
            </div>
        </div>
    @endforeach
</main>

<footer>
    <button type="button" class="btn btn-success">
        <i class="fas fa-comments me-2" aria-hidden="true"></i>Forum
    </button>
    <button type="button" class="btn btn-success">
        <i class="fas fa-info-circle me-2" aria-hidden="true"></i>À propos
    </button>
    <a href="/profile">
        <button type="button" class="btn btn-success">
            <i class="fas fa-user me-2" aria-hidden="true"></i>Mon compte
        </button>
    </a>
</footer>
<script src="{{ asset('js/message.js') }}"></script>
<script src="{{ asset('js/badge-hover.js') }}"></script>
</body>
</html>
