<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ÉnergiePlus - Comparateur d\'offres électricité et gaz')</title>
    <meta name="description" content="Comparez gratuitement les offres d'électricité et de gaz en France et découvrez si les panneaux solaires peuvent réduire vos factures.">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header class="site-header">
        <div class="container navbar">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="ÉnergiePlus">
            </a>

            <nav>
                <ul class="nav-links">
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#pourquoi">Pourquoi nous</a></li>
                    <li><a href="#solaire">Solaire</a></li>
                    <li><a href="#comment">Comment ça marche</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>

            <div class="nav-cta">
                <a href="#contact" class="btn btn-primary">Devis gratuit</a>
            </div>

            <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu">&#9776;</button>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-top">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="ÉnergiePlus">
                </a>
                <ul class="footer-links">
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#solaire">Solaire</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                &copy; {{ date('Y') }} ÉnergiePlus — Courtier indépendant en énergie. Tous droits réservés.
            </div>
        </div>
    </footer>

    <script>
        // Menu mobile simple (aucune dépendance)
        document.getElementById('navToggle').addEventListener('click', function () {
            document.body.classList.toggle('nav-open');
        });
    </script>
</body>
</html>
