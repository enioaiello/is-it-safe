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
        /* === Structure générale === */
        body {
            background-color: #50C878;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            color: white;
        }

        header {
            padding: 2rem 1rem 1rem;
        }

        header h1 {
            color: white;
        }

        /* === Conteneur de formulaire === */
        .form-container {
            background: white;
            border-radius: 0.75rem;
            padding: 2.5rem 3rem;
            max-width: 480px;
            margin: 2rem auto;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            color: #212529;
        }

        /* === Champs de saisie === */
        .form-control {
            border-radius: 0.5rem;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            border: 1px solid #ced4da;
        }

        /* === Bouton principal === */
        .btn-success {
            background-color: #157347;
            border: none;
            font-weight: 500;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-success:hover {
            background-color: #115c3f;
        }

        /* === Pied de page === */
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

        /* === Responsive === */
        @media (max-width: 575.98px) {
            .form-container {
                margin: 1rem;
                padding: 1.5rem;
            }

            footer .btn {
                min-width: 100px;
                font-size: 0.95rem;
                margin: 0.25rem;
            }
        }
    </style>
</head>
<body>
<header class="text-center">
    <h1 class="fw-bold">Is It Safe ?</h1>
</header>

<main class="flex-grow-1">
    <a href="/" class="btn btn-light back-button mb-3">← Retour</a>

    <section class="form-container text-center">
        <h2 class="fw-bold mb-4">Safe it</h2>
        <form action="/result" method="post" id="safe">
            @csrf
            <div class="mb-4 text-start">
                <label for="type" class="form-label">Quel type de recherche voulez vous faire ?</label>
                <select class="form-select" name="type" id="reportType" required>
                    <option value="1" selected>URL</option>
                    <option value="2">Adresse e-mail</option>
                    <option value="3">Numéro de téléphone</option>
                </select>
            </div>

            <!-- Input dynamique -->
            <div class="mb-4" id="inputField">
                <input
                    id="url"
                    name="url"
                    placeholder="example-url.com"
                    required
                    aria-label="URL to verify"/>
            </div>
            <button type="submit" class="btn btn-success btn-lg px-5">
                Verify
            </button>
        </form>
    </section>
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



<!-- Bootstrap JS Bundle -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"
></script>
<script src="{{ asset('js/inputLoader.js') }}"></script>
</body>
</html>
