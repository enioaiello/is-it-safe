<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Is It Safe ? Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" />
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
    </style>
</head>
<body>
<header class="text-center">
    <h1 class="fw-bold">Is It Safe ?</h1>
</header>

<main class="flex-grow-1">
    <a href="/" class="btn btn-light back-button mb-3 ms-3">← Retour</a>

    <section class="form-container text-center">
        <h2 class="fw-bold mb-4">Signaler</h2>

        <form action="/report/confirm" method="post">
            @csrf

            <!-- Select Type -->
            <div class="mb-4 text-start">
                <label for="type" class="form-label">Que souhaitez-vous signaler ?</label>
                <select class="form-select" name="type" id="reportType" required>
                    <option value="1" selected>URL</option>
                    <option value="2">Adresse e-mail</option>
                    <option value="3">Numéro de téléphone</option>
                </select>


            </div>

            <!-- Input dynamique -->
            <div class="mb-4" id="inputField">
                <input type="url" class="form-control form-control-lg" placeholder="example-url.com" required name="value" />
            </div>

            <!-- Commentaire -->
            <div class="form-floating">
                <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px; resize: none"></textarea>
                <label for="floatingTextarea2">Commentaires</label>
            </div>

            <button type="submit" class="btn btn-success btn-lg px-5 mt-4">
                Vérifier
            </button>
        </form>

        <p class="text-success mt-2">{{ session('success') }}</p>
        @if(session('success'))
    @php
        function getDomainName($url) {
            $host = parse_url($url, PHP_URL_HOST);
            if (!$host) return null;
            $hostParts = explode('.', $host);
            if (count($hostParts) >= 2) {
                return $hostParts[count($hostParts) - 2];
            }
            return null;
        }

        $value = old('value');
        $trimmed = $value ? getDomainName($value) : null;
    @endphp
<a href="/forum/{{ $trimmed }}">
            <button class="btn btn-outline-light" style=" background-color:#50C878">Envie d'en parler aux autres ?</button>
        </a>
@endif

    </section>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset("js/report-it.js") }}"></script>

</body>
</html>
