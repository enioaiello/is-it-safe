<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Is It Safe ? Form</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <!-- Font Awesome for icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous"
    />
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
        .loading-container {
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        .spinner-border {
            width: 5rem;
            height: 5rem;
            border-width: 0.5rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .circular-progress {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: conic-gradient(
                #198754 0deg,
                #dcdcdc 0deg
            );
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: background 0.5s ease;
        }

        .circular-progress::before {
            content: '';
            position: absolute;
            width: 60px;
            height: 60px;
            background: #adb5bd; /* gris clair comme dans la maquette */
            border-radius: 50%;
            z-index: 1;
        }

        .percentage-text {
            position: relative;
            z-index: 2;
            font-weight: bold;
            font-size: 1rem;
            color: #212529;
        }

        .list-group-item {
            border-radius: 0.5rem;
            margin-bottom: 10px;
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
<header class="text-center">
    <h1 class="fw-bold">Is It Safe ?</h1>
</header>
<main class="container my-5">
    <a href="/safe-it" class="btn btn-light back-button mb-3">← Retour</a>

    <div class="loading-container">
        <div class="spinner-border text-light" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
        <p class="mt-4 fs-4">Analyse en cours...</p>
    </div>

    <div class="result-container d-none">
        <h5 class="text-uppercase fw-bold mb-3">résultat pour : <span id="url">{{ $_POST['url'] }}</span></h5>

    <div class="bg-dark text-white p-4 rounded">
        <div class="row mb-4">
            <div class="col-md-3 d-flex justify-content-center align-items-center">
                <div class="circular-progress" id="circular-progress">
                    <span class="percentage-text safety-percentage">...</span>
                </div>
            </div>
            <div class="col-md-9 d-flex flex-row justify-content-between">
                <div>
                   <p class="mb-2">note globale des utilisateurs :</p>
                <p class="mb-2">note globale du staff :</p>
                </div>
                <div class="text-center mt-3">
                    @php function getDomainName($url) {
                            $host = parse_url($url, PHP_URL_HOST);
                            $hostParts = explode('.', $host);
                            if (count($hostParts) >= 2) {
                                return $hostParts[count($hostParts) - 2];
                            }
                            return null;
                        }
                        $trimmed = getDomainName($_POST['url'])
                    @endphp
                    @if(isset($url))
                    <a href="/forum/search/{{ $trimmed }}">
                        <button class="btn btn-outline-light">Voir les forums associés</button>
                    </a>
                        @endif
        </div>
            </div>
            <div class="result mt-3"></div>
        </div>

        <ul id="result-list" class="list-group">
            <!-- Résultats ajoutés dynamiquement ici -->
        </ul>

        <div class="text-center mt-3">
            <button id="show-more" class="btn btn-outline-light d-none">Voir plus</button>
        </div>
    </div>
    @if(isset($url))
    <div class="mt-4 text-center">
        <a id="full-report" href="#" target="_blank" class="btn btn-primary">Voir l'analyse complète</a>
    </div>
        @endif
    </div>
</main>



<footer>
    <a href="/forum">
        <button type="button" class="btn btn-success">
            <i class="fas fa-comments me-2" aria-hidden="true"></i>Forum
        </button>
    </a>
    <a href="/propos">
        <button type="button" class="btn btn-success">
            <i class="fas fa-info-circle me-2" aria-hidden="true"></i>A propos
        </button>
    </a>
    <a href="/profile">
        <button type="button" class="btn btn-success">
            <i class="fas fa-user me-2" aria-hidden="true" ></i>Mon compte
        </button>
    </a>
</footer>
<p class="choice" style="display: none">{{ $_POST['url'] }}</p>
<!-- Bootstrap JS Bundle -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"
></script>
@if(isset($url))
    <script src="{{ asset('js/safe-it-url.js') }}"></script>
@elseif(isset($email))
    <script src="{{ asset('js/safe-it-email.js') }}"></script>
@elseif(isset($phone))
    <script src="{{ asset('js/safe-it-phone.js') }}"></script>
@endif
</body>
</html>
