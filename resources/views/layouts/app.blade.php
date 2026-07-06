<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Courtage Solaire — Votre partenaire énergétique')</title>
    <meta name="description" content="Courtier en solutions solaires : accompagnement personnalisé, expertise indépendante et solutions durables pour particuliers et professionnels.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root{
            --gold: #D9A94E;
            --gold-dark: #B8863A;
            --black: #0A0A0A;
            --black-2: #141414;
            --black-3: #1C1C1C;
            --cream: #F7F2E9;
            --grey-text: #B9B9B9;
        }
        *{box-sizing:border-box;}
        body{
            margin:0;
            font-family:'Montserrat',sans-serif;
            background:var(--black);
            color:#fff;
            line-height:1.6;
        }
        a{text-decoration:none;color:inherit;}
        img{max-width:100%;display:block;}
        .container{max-width:1200px;margin:0 auto;padding:0 24px;}
        .eyebrow{
            color:var(--gold);
            letter-spacing:2px;
            font-weight:600;
            font-size:13px;
            display:flex;
            align-items:center;
            gap:10px;
            margin-bottom:14px;
        }
        .eyebrow::before{content:"";width:22px;height:2px;background:var(--gold);display:inline-block;}
        h1,h2,h3{font-weight:800;letter-spacing:.5px;margin:0;}
        .btn{
            display:inline-block;
            padding:14px 30px;
            border-radius:999px;
            font-weight:700;
            font-size:13px;
            letter-spacing:1px;
            cursor:pointer;
            border:2px solid transparent;
            transition:all .25s ease;
        }
        .btn-gold{background:var(--gold);color:#111;}
        .btn-gold:hover{background:var(--gold-dark);transform:translateY(-2px);}
        .btn-outline{border-color:#fff;color:#fff;}
        .btn-outline:hover{background:#fff;color:#111;}
        .btn-outline-gold{border-color:var(--gold);color:var(--gold);}
        .btn-outline-gold:hover{background:var(--gold);color:#111;}

        /* Header */
        header.site-header{
            position:sticky;top:0;z-index:50;
            background:rgba(10,10,10,.92);
            backdrop-filter:blur(6px);
            border-bottom:1px solid #222;
        }
        .nav-wrap{
            display:flex;align-items:center;justify-content:space-between;
            padding:14px 24px;max-width:1300px;margin:0 auto;
        }
        .logo{display:flex;align-items:center;gap:12px;}
        .logo-circle{
            width:54px;height:54px;border-radius:50%;
            border:1.5px solid var(--gold);
            display:flex;align-items:center;justify-content:center;
            flex-shrink:0;
            overflow:hidden;
            background:#0a0a0a;
        }
        .logo-circle img{width:100%;height:100%;object-fit:cover;}
        .logo-text{line-height:1.15;}
        .logo-text .name{font-weight:800;font-size:15px;letter-spacing:2px;color:#fff;}
        .logo-text .tagline{font-size:9px;letter-spacing:1px;color:var(--grey-text);}
        nav.main-nav{display:flex;gap:28px;}
        nav.main-nav a{
            font-size:13px;font-weight:600;letter-spacing:.5px;color:#e7e7e7;
            padding-bottom:6px;border-bottom:2px solid transparent;
            transition:color .2s ease,border-color .2s ease;
        }
        nav.main-nav a:hover, nav.main-nav a.active{color:var(--gold);border-color:var(--gold);}
        .menu-toggle{display:none;background:none;border:none;color:#fff;font-size:26px;cursor:pointer;}

        @media (max-width:960px){
            nav.main-nav{
                position:absolute;top:100%;left:0;right:0;
                background:var(--black-2);flex-direction:column;gap:0;
                display:none;border-top:1px solid #222;
            }
            nav.main-nav.open{display:flex;}
            nav.main-nav a{padding:16px 24px;border-bottom:1px solid #222;width:100%;}
            .menu-toggle{display:block;}
            .header-cta{display:none;}
        }

        section{padding:90px 0;}
        @media (max-width:768px){section{padding:56px 0;}}

        /* Responsive grids used across the page */
        .grid-4{display:grid;grid-template-columns:repeat(4,1fr);gap:32px;}
        .grid-2-60{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;}
        .grid-2-form{display:grid;grid-template-columns:1fr 1fr;gap:18px;}
        .footer-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1.2fr;gap:40px;}
        .quote-form{padding:36px;}
        @media (max-width:560px){.quote-form{padding:24px;}}

        @media (max-width:900px){
            .grid-4{grid-template-columns:repeat(2,1fr);gap:28px;}
            .grid-2-60{grid-template-columns:1fr;gap:32px;}
            .footer-grid{grid-template-columns:1fr 1fr;gap:36px;}
            .about-img{height:320px !important;}
        }
        @media (max-width:560px){
            .grid-4{grid-template-columns:1fr;gap:24px;}
            .footer-grid{grid-template-columns:1fr;gap:32px;text-align:left;}
            .grid-2-form{grid-template-columns:1fr;}
            .about-img{height:260px !important;}
        }

        /* Fluid headings */
        h1{font-size:clamp(28px,5vw,44px);}
        h2{font-size:clamp(22px,3.2vw,32px);}

        @media (max-width:768px){
            .container{padding:0 20px;}
            .btn{padding:13px 24px;font-size:12px;}
        }

        @media (max-width:480px){
            .logo-circle{width:42px;height:42px;}
            .logo-text .tagline{display:none;}
            .logo-text .name{font-size:13px;}
        }

        footer.site-footer{background:#080807;border-top:1px solid #1e1e1e;}
        footer .foot-top{border-bottom:1px solid #1c1c1c;}
        @media (max-width:768px){
            footer .foot-top .container{padding:48px 20px 36px;}
        }
    </style>

    @stack('styles')
</head>
<body>

<header class="site-header">
    <div class="nav-wrap">
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-circle">
                <img src="{{ asset('logo.png') }}" alt="Courtage Solaire">
            </div>
            <div class="logo-text">
                <div class="name">COURTAGE<br>SOLAIRE</div>
                <div class="tagline">VOTRE PARTENAIRE ÉNERGÉTIQUE</div>
            </div>
        </a>

        <button class="menu-toggle" onclick="document.querySelector('.main-nav').classList.toggle('open')">☰</button>

        <nav class="main-nav">
            <a href="{{ route('home') }}#accueil" class="active">ACCUEIL</a>
            <a href="{{ route('home') }}#apropos">À PROPOS</a>
            <a href="{{ route('home') }}#solutions">NOS SOLUTIONS</a>
            <a href="{{ route('home') }}#engagements">NOS ENGAGEMENTS</a>
            <a href="{{ route('home') }}#realisations">RÉALISATIONS</a>
            <a href="{{ route('home') }}#contact">CONTACT</a>
        </nav>

        <a href="#devis" class="btn btn-gold header-cta">DEMANDER UN DEVIS</a>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer">
    @yield('footer')
</footer>

</body>
</html>