<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Is It Safe ? À propos</title>
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
        <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    </head>
    <body>
    <header class="text-center">
        <h1 class="fw-bold text-white">Is It Safe ?</h1>
    </header>
    <main class="container my-5">
        <a href="/" class="btn btn-light back-button mb-3">← Retour</a>

        <h2 class="mb-2 text-center">À propos</h2>
        <p class="mb-2">Nous avons conçu <span class="fw-semibold">Is It Safe?</span> car nous vivons dans un monde où
            le pourriel, la malhonnêteté et la pollution semblent normaux.</p>
        <p class="mb-2">Et l'informatique, bien que pratique, peut "accélérer" ces actions :</p>
        <ul class="list">
            <li class="element">
                <span class="fw-semibold">Pollution :</span> une newsletter envoyée à 1000 personnes consomme en moyenne
                10 à 20 kg de CO₂, ce qui équivaut à plusieurs kilomètres parcourus en voiture.
                Imaginez maintenant l'impact environnemental total des communications indésirables, comme les courriers
                indésirables, le démarchage téléphonique ou des sites ayant une intention malhonnête (arnaque,
                piratage...).
            </li>
            <li class="element">
                <span class="fw-semibold">Malhonnêteté :</span> un message SMS consomme en moyenne 0,014 g de CO₂. Les
                messages RCS consomment de 1 à 10 g de CO₂. Un appel téléphonique (voix, GSM ou 4G) d'une minute
                consomme en moyenne 0,2 à 0,5 g de CO₂.
                En plus d'avoir un impact environnemental important, ces moyens de communication sont utilisés pour des
                actes malhonnêtes : comme des arnaques, des piratages, des fraudes...
            </li>
            <li class="element">
                <span class="fw-semibold">Malveillance :</span> l'informatique est également au cœur des activités
                d'entreprises. Prenez les géants de l'informatique (GAFAM) qui installent des centres de données
                (datacenter) dans des villes qui sont en crise de sécheresse, tout en consommant énormément d'eau (ou
                dans le cas d'une utilisation type air-cooling, utilisent la climatisation).
                Ces entreprises abusent de leurs positions dominantes pour construire des centres de données qui
                consomment énormément de ressources pour l'alimentation de services, tels que l'intelligence
                artificielle, qui peuvent servir à réaliser des actes malhonnêtes. Bien qu'heureusement, certaines
                entreprises prennent conscience de ces problèmes et trouvent des solutions environnementales.
            </li>
        </ul>
        <p class="mb-2">C'est là que ce projet entre en jeu : nous pouvons mieux renseigner et catégoriser ces moyens de
            menaces. De manière communautaire, nous pouvons ensemble :</p>
        <ul class="list">
            <li class="element">
                <span class="fw-semibold">Signaler</span> les numéros de téléphone et les adresses email indésirables.
                Les liens malveillants (arnaque, piratage...). Ou discuter de la bonne intention d'une entreprise.
            </li>
            <li class="element">
                <span class="fw-semibold">Informer</span> les utilisateurs si l'une des données citées ci-dessus est
                problématique.
            </li>
        </ul>
        <h2 class="mb-2 text-center">FAQ</h2>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Comment puis-je éviter de me faire pirater ?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        La meilleure des protections, c'est vous ! Soyez vigilants aux liens et aux interactions que
                        vous effectuez sur Internet. Ne cliquez pas sur des pièces jointes de numéros que vous ne
                        connaissez pas. Ne répondez pas aux numéros inconnus (sauf si vous attendez un appel)...
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Comment réduire mon impact environnemental ?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Il existe plusieurs moyens, certains peuvent sembler extrêmes, mais ils sont tous utiles :
                        <ul class="list">
                            <li class="element">
                                Éteignez vos périphériques lorsque vous ne vous en servez pas, cela inclut votre
                                routeur, vos appareils électroménagers... la nuit par exemple
                            </li>
                            <li class="element">
                                Ne laissez pas les lumières allumées
                            </li>
                            <li class="element">
                                Évitez les requêtes inutiles sur Internet : jonglages de pages trop excessif, mails
                                inutiles, newsletters sans utilité (évitables)
                            </li>
                            <li class="element">
                                Utilisez les paramètres proposés par le constructeur de votre appareil ou modifiez les
                                paramètres proposés par votre système d'exploitation
                            </li>
                            <li class="element">
                                Ne répondez pas aux appels téléphoniques inconnus et faites attention aux emails que
                                vous ouvrez afin d'éviter de vous faire pirater ou de vous faire inscrire dans une liste
                                de spam
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Comment repérer une arnaque ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list">
                            <li class="element">
                                <span class="fw-semibold">Via un moteur de recherche :</span> ne privilégiez jamais un
                                lien sponsorisé (cela inclut les publicités sur d'autres services). Choisissez le lien
                                le plus cohérent en faisant attention à des détails tels que l'orthographe, la
                                description d'un site, les liens proposés (s'ils existent)
                            </li>
                            <li class="element">
                                <span class="fw-semibold">Par téléphone (SMS/RCS ou appel téléphonique) :</span> bloquez
                                les numéros qui vous envoient des pourriels ou vous appellent de façon indésirable, ne
                                cliquez en aucun cas sur les liens envoyés et ne répondez pas au numéro concerné
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Bootstrap JS Bundle -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"
    ></script>
</body>
</html>
