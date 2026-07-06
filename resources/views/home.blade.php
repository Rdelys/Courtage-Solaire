@extends('layouts.app')

@section('content')

@push('styles')
<style>
    .hero-flex{display:flex;flex-wrap:wrap;min-height:640px;}
    .hero-text{flex:1 1 460px;display:flex;align-items:center;padding:70px 48px;background:#0a0a0a;}
    .hero-image{flex:1 1 520px;position:relative;min-height:420px;overflow:hidden;}
    .hero-image img{width:100%;height:100%;object-fit:cover;position:absolute;inset:0;}
    .hero-fade{position:absolute;inset:0;background:linear-gradient(90deg,#0a0a0a 0%,rgba(10,10,10,0) 22%);}
    @media (max-width:900px){
        .hero-text{padding:44px 24px 30px;}
        .hero-image{min-height:300px;}
        .hero-fade{background:linear-gradient(180deg,#0a0a0a 0%,rgba(10,10,10,0) 22%);}
    }
</style>
@endpush

{{-- HERO --}}
<section id="accueil" style="padding:0;background:#0a0a0a;">
    <div class="hero-flex">
        <div class="hero-text">
            <div style="max-width:480px;">
                <h1 style="line-height:1.15;color:#fff;">L'ÉNERGIE SOLAIRE<br><span style="color:var(--gold);">À VOTRE SERVICE</span></h1>
                <p style="color:var(--grey-text);font-size:15px;margin:22px 0 34px;max-width:420px;">
                    Courtier en solutions solaires, nous vous accompagnons vers une énergie plus propre, plus économique et durable.
                </p>
                <div style="display:flex;gap:16px;flex-wrap:wrap;">
                    <a href="#solutions" class="btn btn-gold">NOS SOLUTIONS</a>
                    <a href="#devis" class="btn btn-outline">DEMANDER UN DEVIS</a>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/banniere.png') }}" alt="Maison avec panneaux solaires au crépuscule">
            <div class="hero-fade"></div>
        </div>
    </div>
</section>

{{-- FEATURES BAR --}}
<section style="background:#111;padding:44px 0;">
    <div class="container grid-4">
        @php
            $features = [
                ['icon' => 'user', 'title' => 'ACCOMPAGNEMENT PERSONNALISÉ', 'desc' => 'Un interlocuteur unique à chaque étape de votre projet'],
                ['icon' => 'shield', 'title' => 'EXPERTISE INDÉPENDANTE', 'desc' => 'Des conseils objectifs et les meilleures solutions du marché'],
                ['icon' => 'euro', 'title' => 'ÉCONOMIES DURABLES', 'desc' => 'Réduisez vos factures et valorisez votre bien'],
                ['icon' => 'leaf', 'title' => 'ENGAGEMENT ÉCOLOGIQUE', 'desc' => 'Agissez pour la planète avec des solutions responsables'],
            ];
            $icons = [
                'user' => '<circle cx="12" cy="8" r="3.4"/><path d="M5 20c0-4 3.2-6.5 7-6.5s7 2.5 7 6.5"/>',
                'shield' => '<path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3Z"/>',
                'euro' => '<circle cx="12" cy="12" r="9"/><path d="M15 8.5c-1-.8-2-1.2-3.2-1.2-2.6 0-4.6 2-4.6 4.7s2 4.7 4.6 4.7c1.2 0 2.2-.4 3.2-1.2M7 11h6M7 13h5"/>',
                'leaf' => '<path d="M5 19c9 0 13-6 13-14-8 0-14 4-14 12 0 1 .3 1.6.3 1.6"/><path d="M5 19c1-4 4-7 8-9"/>',
            ];
        @endphp
        @foreach($features as $f)
        <div style="text-align:left;">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#D9A94E" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:14px;">
                {!! $icons[$f['icon']] !!}
            </svg>
            <div style="font-weight:700;font-size:13px;letter-spacing:.5px;margin-bottom:8px;">{{ $f['title'] }}</div>
            <div style="color:var(--grey-text);font-size:13px;">{{ $f['desc'] }}</div>
        </div>
        @endforeach
    </div>
</section>

{{-- A PROPOS --}}
<section id="apropos" style="background:var(--cream);color:#111;">
    <div class="container grid-2-60">
        <img src="{{ asset('images/apropos.png') }}" alt="Toit avec panneaux solaires" class="about-img" style="border-radius:10px;width:100%;height:420px;object-fit:cover;">
        <div>
            <div class="eyebrow">À PROPOS</div>
            <h2 style="color:#111;margin-bottom:18px;">VOTRE PARTENAIRE ÉNERGÉTIQUE</h2>
            <p style="color:#555;font-size:15px;margin-bottom:28px;">
                Chez Courtage Solaire, nous avons à cœur de rendre l'énergie solaire accessible à tous. Grâce à notre réseau de partenaires certifiés et notre expertise du marché, nous vous proposons des solutions sur-mesure adaptées à vos besoins et à votre budget.
            </p>
            <a href="#devis" class="btn btn-gold">EN SAVOIR PLUS</a>
        </div>
    </div>
</section>

{{-- SOLUTIONS --}}
<section id="solutions" style="background:#0a0a0a;">
    <div class="container" style="text-align:center;">
        <div class="eyebrow" style="justify-content:center;">NOS SOLUTIONS</div>
        <h2 style="max-width:700px;margin:0 auto 50px;">DES SOLUTIONS SOLAIRES ADAPTÉES À TOUS VOS BESOINS</h2>
    </div>
    <div class="container grid-4" style="gap:24px;">
        @php
            $solutions = [
                ['icon' => 'home', 'title' => 'RÉSIDENTIEL', 'desc' => 'Installez des panneaux solaires chez vous et réduisez vos factures d\'énergie.'],
                ['icon' => 'building', 'title' => 'PROFESSIONNEL', 'desc' => 'Optimisez vos coûts et gagnez en autonomie énergétique pour votre entreprise.'],
                ['icon' => 'panel', 'title' => 'SITES ISOLÉS', 'desc' => 'Alimentez vos sites en toute autonomie, même hors réseau électrique.'],
                ['icon' => 'battery', 'title' => 'STOCKAGE', 'desc' => 'Stockez votre énergie et consommez-la quand vous en avez vraiment besoin.'],
            ];
            $sicons = [
                'home' => '<path d="M4 11 12 4l8 7"/><path d="M6 10v9h12v-9"/>',
                'building' => '<rect x="6" y="4" width="12" height="16" rx="1"/><path d="M9 8h.01M15 8h.01M9 12h.01M15 12h.01M9 16h.01M15 16h.01"/>',
                'panel' => '<rect x="4" y="6" width="16" height="10" rx="1"/><path d="M4 11h16M9 6v10M14 6v10"/>',
                'battery' => '<rect x="4" y="7" width="14" height="10" rx="1.5"/><path d="M18 10v4M8 10l-1.5 3H10L8.5 16"/>',
            ];
        @endphp
        @foreach($solutions as $s)
        <div style="background:var(--black-3);border:1px solid #262626;border-radius:10px;padding:34px 24px;transition:transform .2s ease;">
            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#D9A94E" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:20px;">
                {!! $sicons[$s['icon']] !!}
            </svg>
            <div style="font-weight:700;font-size:14px;letter-spacing:.5px;margin-bottom:12px;">{{ $s['title'] }}</div>
            <div style="color:var(--grey-text);font-size:13.5px;">{{ $s['desc'] }}</div>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA BANNER --}}
<section id="engagements" style="background:#111;text-align:center;">
    <div class="container">
        <h2 style="margin-bottom:14px;">PRÊT À PASSER À L'ÉNERGIE SOLAIRE ?</h2>
        <p style="color:var(--grey-text);margin-bottom:30px;">Contactez-nous dès aujourd'hui pour une étude gratuite et personnalisée.</p>
        <a href="#devis" class="btn btn-gold">DEMANDER UN DEVIS</a>
    </div>
</section>

{{-- FORMULAIRE DE DEVIS --}}
<section id="devis" style="background:var(--cream);color:#111;">
    <div class="container" style="max-width:720px;">
        <div style="text-align:center;margin-bottom:36px;">
            <div class="eyebrow" style="justify-content:center;">DEMANDE DE DEVIS</div>
            <h2 style="color:#111;">PARLEZ-NOUS DE VOTRE PROJET</h2>
            <p style="color:#666;margin-top:10px;">Réponse sous 24h ouvrées par un conseiller dédié.</p>
        </div>

        @if (session('success'))
            <div style="background:#e7f6ec;border:1px solid #bfe6cb;color:#1e6b3a;padding:16px 20px;border-radius:8px;margin-bottom:24px;font-size:14px;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div style="background:#fdecec;border:1px solid #f4b8b8;color:#a12b2b;padding:16px 20px;border-radius:8px;margin-bottom:24px;font-size:14px;">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background:#fdecec;border:1px solid #f4b8b8;color:#a12b2b;padding:16px 20px;border-radius:8px;margin-bottom:24px;font-size:14px;">
                <ul style="margin:0;padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('quote.store') }}" class="quote-form" style="background:#fff;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,.06);">
            @csrf
            <div class="grid-2-form">
                <div>
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;">NOM COMPLET *</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" required
                        style="width:100%;padding:12px 14px;border:1px solid #ddd;border-radius:8px;font-family:inherit;font-size:14px;">
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;">E-MAIL *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        style="width:100%;padding:12px 14px;border:1px solid #ddd;border-radius:8px;font-family:inherit;font-size:14px;">
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;">TÉLÉPHONE *</label>
                    <input type="tel" name="telephone" value="{{ old('telephone') }}" required
                        style="width:100%;padding:12px 14px;border:1px solid #ddd;border-radius:8px;font-family:inherit;font-size:14px;">
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;">CODE POSTAL</label>
                    <input type="text" name="code_postal" value="{{ old('code_postal') }}"
                        style="width:100%;padding:12px 14px;border:1px solid #ddd;border-radius:8px;font-family:inherit;font-size:14px;">
                </div>
                <div style="grid-column:1 / -1;">
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;">VOUS ÊTES *</label>
                    <div style="display:flex;gap:24px;flex-wrap:wrap;">
                        <label style="display:flex;align-items:center;gap:8px;font-size:14px;">
                            <input type="radio" name="type" value="Particulier" {{ old('type') != 'Professionnel' ? 'checked' : '' }}> Particulier
                        </label>
                        <label style="display:flex;align-items:center;gap:8px;font-size:14px;">
                            <input type="radio" name="type" value="Professionnel" {{ old('type') == 'Professionnel' ? 'checked' : '' }}> Professionnel
                        </label>
                    </div>
                </div>
                <div style="grid-column:1 / -1;">
                    <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;">VOTRE MESSAGE</label>
                    <textarea name="message" rows="4"
                        style="width:100%;padding:12px 14px;border:1px solid #ddd;border-radius:8px;font-family:inherit;font-size:14px;resize:vertical;">{{ old('message') }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-gold" style="width:100%;margin-top:24px;border:none;">ENVOYER MA DEMANDE</button>
        </form>
    </div>
</section>

@endsection

@section('footer')
    @php
        $contact1 = ['label' => 'Standard', 'phone' => '06 13 65 29 64'];
        $contact2 = ['label' => 'Conseiller commercial', 'phone' => '06 13 65 29 64'];
    @endphp
    <div class="foot-top">
        <div class="container footer-grid" style="padding:64px 24px 48px;">

            <div>
                <div class="logo" style="margin-bottom:18px;">
                    <div class="logo-circle">
                        <img src="{{ asset('logo.png') }}" alt="Courtage Solaire">
                    </div>
                    <div class="logo-text">
                        <div class="name">COURTAGE<br>SOLAIRE</div>
                        <div class="tagline">VOTRE PARTENAIRE ÉNERGÉTIQUE</div>
                    </div>
                </div>
                <p style="color:var(--grey-text);font-size:13.5px;max-width:280px;">
                    Courtier indépendant en solutions solaires. Nous accompagnons particuliers et professionnels vers une énergie plus propre et plus économique.
                </p>
            </div>

            <div>
                <div style="font-weight:700;font-size:13px;letter-spacing:1px;margin-bottom:20px;">NAVIGATION</div>
                <div style="display:flex;flex-direction:column;gap:12px;font-size:13.5px;color:var(--grey-text);">
                    <a href="#accueil" style="transition:color .2s;" onmouseover="this.style.color='#D9A94E'" onmouseout="this.style.color='#B9B9B9'">Accueil</a>
                    <a href="#apropos" onmouseover="this.style.color='#D9A94E'" onmouseout="this.style.color='#B9B9B9'">À propos</a>
                    <a href="#solutions" onmouseover="this.style.color='#D9A94E'" onmouseout="this.style.color='#B9B9B9'">Nos solutions</a>
                    <a href="#engagements" onmouseover="this.style.color='#D9A94E'" onmouseout="this.style.color='#B9B9B9'">Nos engagements</a>
                    <a href="#devis" onmouseover="this.style.color='#D9A94E'" onmouseout="this.style.color='#B9B9B9'">Demander un devis</a>
                </div>
            </div>

            <div>
                <div style="font-weight:700;font-size:13px;letter-spacing:1px;margin-bottom:20px;">NOS SOLUTIONS</div>
                <div style="display:flex;flex-direction:column;gap:12px;font-size:13.5px;color:var(--grey-text);">
                    <a href="#solutions">Résidentiel</a>
                    <a href="#solutions">Professionnel</a>
                    <a href="#solutions">Sites isolés</a>
                    <a href="#solutions">Stockage</a>
                </div>
            </div>

            <div>
                <div style="font-weight:700;font-size:13px;letter-spacing:1px;margin-bottom:20px;">CONTACT</div>
                <div style="display:flex;flex-direction:column;gap:14px;font-size:13.5px;color:var(--grey-text);">
                    <div style="display:flex;gap:10px;align-items:flex-start;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#D9A94E" stroke-width="1.8" style="margin-top:2px;flex-shrink:0;"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L7.9 9.7a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.7 2Z"/></svg>
                        <div>
                            <div>{{ $contact1['phone'] }}</div>
                            <div style="font-size:11.5px;color:#888;">{{ $contact1['label'] }}</div>
                        </div>
                    </div>
                    <div style="display:flex;gap:10px;align-items:flex-start;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#D9A94E" stroke-width="1.8" style="margin-top:2px;flex-shrink:0;"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L7.9 9.7a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.7 2Z"/></svg>
                        <div>
                            <div>{{ $contact2['phone'] }}</div>
                            <div style="font-size:11.5px;color:#888;">{{ $contact2['label'] }}</div>
                        </div>
                    </div>
                    <div style="display:flex;gap:10px;align-items:flex-start;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#D9A94E" stroke-width="1.8" style="margin-top:2px;flex-shrink:0;"><path d="M4 4h16v16H4z" opacity="0"/><path d="M3 6h18v12H3z"/><path d="m3 7 9 6 9-6"/></svg>
                        <div>contact@courtage-solaire.fr</div>
                    </div>
                    <div style="display:flex;gap:10px;align-items:flex-start;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#D9A94E" stroke-width="1.8" style="margin-top:2px;flex-shrink:0;"><path d="M12 21s-7-6.5-7-11.5A7 7 0 0 1 19 9.5C19 14.5 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.3"/></svg>
                        <div>59 rue de Ponthieu, Bureau 326 · 75008 Paris</div><br>
                        <div>SIREN 103 572 947 · SAS au capital de 10 000€</div>
                    </div>
                </div>

                <div style="display:flex;gap:12px;margin-top:22px;">
                    @foreach(['f' => 'M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H8v3h3v7h3v-7h3l1-3h-4V9c0-.3.2-.5.5-.5H17', 'in' => 'M4 4h3v16H4zM10 9h3v11h-3zM10 13c0-2 1.5-3 3-3s3 1 3 3v7h-3v-6c0-.6-.4-1-1-1s-1 .4-1 1v6h-1v-7Z', 'ig' => 'M4 4h16v16H4z'] as $key => $path)
                    <a href="#" style="width:34px;height:34px;border-radius:50%;border:1px solid #333;display:flex;align-items:center;justify-content:center;transition:all .2s;" onmouseover="this.style.background='#D9A94E';this.style.borderColor='#D9A94E'" onmouseout="this.style.background='transparent';this.style.borderColor='#333'">
                        @if($key === 'f')
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="#fff"><path d="M13.5 21v-8h2.7l.4-3.2h-3.1V7.7c0-.9.3-1.5 1.6-1.5h1.7V3.3C15.9 3.2 15 3.1 13.9 3.1c-2.4 0-4 1.4-4 4v2.7H7v3.2h2.9V21h3.6Z"/></svg>
                        @elseif($key === 'in')
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="#fff"><path d="M4.5 3.5A1.8 1.8 0 1 0 4.5 7a1.8 1.8 0 0 0 0-3.5ZM3 8.7h3v11.8H3ZM9 8.7h2.9v1.6h.04c.4-.8 1.5-1.7 3.1-1.7 3.3 0 3.9 2.2 3.9 5v6.9h-3v-6.1c0-1.5 0-3.3-2-3.3s-2.4 1.6-2.4 3.2v6.2H9Z"/></svg>
                        @else
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.6"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17" cy="7" r="1"/></svg>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding:22px 24px;display:flex;justify-content:space-between;flex-wrap:wrap;gap:12px;color:#777;font-size:12.5px;">
        <div>© {{ date('Y') }} Courtage Solaire – Tous droits réservés</div>
        <div style="display:flex;gap:20px;">
            <a href="#" style="color:#999;">Mentions légales</a>
            <a href="#" style="color:#999;">Politique de confidentialité</a>
        </div>
    </div>
@endsection