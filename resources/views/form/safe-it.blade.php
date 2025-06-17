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
            background: #f8f9fa;
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

<main class="flex-grow-1">
    <section class="form-container text-center">
        <h2 class="fw-bold mb-4">Safe it</h2>
        <form action="/result" method="post" id="safe">
            @csrf
            <div class="mb-4">
                <input
                    id="url"
                    name="url"
                    type="url"
                    class="form-control form-control-lg"
                    placeholder="example-url.com"
                    required
                    aria-label="URL to verify"
                />
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
</body>
</html>
