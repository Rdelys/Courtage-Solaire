<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Courtage Solaire — Votre partenaire énergétique')</title>
    <meta name="description" content="Courtier en solutions solaires : accompagnement personnalisé, expertise indépendante et solutions durables pour particuliers et professionnels.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
<div id="cs-chatbot">
    <button id="cs-chatbot-toggle" aria-label="Ouvrir le chat">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.4 8.4 0 0 1-8.9 8.4 8.6 8.6 0 0 1-3.8-.9L3 21l1.9-4.8A8.4 8.4 0 0 1 20 6.6 8.3 8.3 0 0 1 21 11.5Z"/></svg>
    </button>

    <div id="cs-chatbot-panel">
        <div id="cs-chatbot-header">
            <span>Assistant Courtage Solaire</span>
            <button id="cs-chatbot-close" aria-label="Fermer">&times;</button>
        </div>
        <div id="cs-chatbot-messages"></div>
        <form id="cs-chatbot-form">
            <input type="text" id="cs-chatbot-input" placeholder="Écrivez votre message..." autocomplete="off" required>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>

<style>
    #cs-chatbot{position:fixed;bottom:24px;right:24px;z-index:999;font-family:'Montserrat',sans-serif;}
    #cs-chatbot-toggle{width:58px;height:58px;border-radius:50%;background:var(--gold, #D9A94E);border:none;cursor:pointer;box-shadow:0 6px 18px rgba(0,0,0,.35);display:flex;align-items:center;justify-content:center;}
    #cs-chatbot-panel{position:fixed;bottom:96px;right:24px;width:340px;max-width:calc(100vw - 32px);height:460px;max-height:calc(100vh - 140px);background:#141414;border:1px solid #262626;border-radius:14px;display:none;flex-direction:column;overflow:hidden;box-shadow:0 12px 40px rgba(0,0,0,.5);}
    #cs-chatbot-panel.open{display:flex;}
    #cs-chatbot-header{background:#0a0a0a;color:#fff;padding:14px 16px;font-weight:700;font-size:13px;letter-spacing:.5px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid #262626;}
    #cs-chatbot-close{background:none;border:none;color:#fff;font-size:20px;cursor:pointer;line-height:1;}
    #cs-chatbot-messages{flex:1;overflow-y:auto;padding:16px;display:flex;flex-direction:column;gap:12px;}
    .cs-msg{font-size:13.5px;line-height:1.5;padding:10px 14px;border-radius:12px;max-width:85%;white-space:pre-wrap;}
    .cs-msg.user{align-self:flex-end;background:#D9A94E;color:#111;border-bottom-right-radius:2px;}
    .cs-msg.bot{align-self:flex-start;background:#1f1f1f;color:#eee;border-bottom-left-radius:2px;}
    #cs-chatbot-form{display:flex;border-top:1px solid #262626;}
    #cs-chatbot-input{flex:1;border:none;background:#1c1c1c;color:#fff;padding:12px 14px;font-size:13.5px;font-family:inherit;outline:none;}
    #cs-chatbot-form button{background:var(--gold, #D9A94E);color:#111;border:none;padding:0 18px;font-weight:700;font-size:12px;cursor:pointer;}
</style>

<script>
(function () {
    const toggle   = document.getElementById('cs-chatbot-toggle');
    const panel    = document.getElementById('cs-chatbot-panel');
    const closeBtn = document.getElementById('cs-chatbot-close');
    const form     = document.getElementById('cs-chatbot-form');
    const input    = document.getElementById('cs-chatbot-input');
    const messages = document.getElementById('cs-chatbot-messages');
    const csrf     = document.querySelector('meta[name="csrf-token"]').content;

    let opened = false;

    function addMessage(text, who) {
        const div = document.createElement('div');
        div.className = 'cs-msg ' + who;
        div.textContent = text;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

    toggle.addEventListener('click', () => {
        panel.classList.toggle('open');
        if (!opened) {
            opened = true;
            addMessage("Bonjour 👋 Je suis l'assistant de Courtage Solaire. Comment puis-je vous aider ?", 'bot');
        }
    });

    closeBtn.addEventListener('click', () => panel.classList.remove('open'));

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) return;

        addMessage(text, 'user');
        input.value = '';
        input.disabled = true;

        try {
            const res = await fetch('{{ route('chatbot.send') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ message: text }),
            });
            const data = await res.json();
            addMessage(data.reply, 'bot');
        } catch (err) {
            addMessage("Désolé, une erreur réseau est survenue.", 'bot');
        } finally {
            input.disabled = false;
            input.focus();
        }
    });
})();
</script>
</body>
</html>