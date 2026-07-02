@extends('layouts.app')

@section('title', 'ÉnergiePlus - Réduisez vos factures d\'énergie dès aujourd\'hui')

@section('content')

{{-- ================= HERO ================= --}}
<section class="hero" id="accueil">
    <div class="container">
        <div class="hero-text">
            <span class="hero-badge">Comparateur 100% gratuit</span>
            <h1>Réduisez vos factures d'énergie dès aujourd'hui</h1>
            <p class="lead">
                Comparez gratuitement les offres d'électricité et de gaz en France. Nous comparons
                les meilleures offres du marché afin de vous proposer un contrat d'énergie adapté
                à votre consommation et à votre budget.
            </p>
            <ul class="hero-checks">
                <li>Analyse gratuite de votre facture</li>
                <li>Économies pouvant atteindre plusieurs centaines d'euros par an*</li>
                <li>Accompagnement personnalisé de A à Z</li>
                <li>Changement de fournisseur simple, rapide et sans interruption de service</li>
            </ul>
            <a href="#contact" class="btn btn-primary">Obtenir mon devis gratuit</a>
            <p class="hero-note">*Les économies varient selon votre profil de consommation et votre fournisseur actuel.</p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/hero-solar.svg') }}" alt="Maison équipée de panneaux solaires">
        </div>
    </div>
</section>

{{-- ================= POURQUOI NOUS ================= --}}
<section class="section" id="pourquoi">
    <div class="container">
        <h2 class="section-title">Pourquoi nous faire confiance ?</h2>
        <p class="section-subtitle">
            Un courtier indépendant à votre service. Notre mission est simple : vous aider à payer
            le juste prix pour votre énergie.
        </p>

        <div class="two-col">
            <div class="col-text">
                <h3>Nos engagements</h3>
                <ul class="check-list">
                    <li>Comparaison transparente des offres</li>
                    <li>Conseils personnalisés selon votre consommation</li>
                    <li>Aucun engagement pour votre demande de devis</li>
                    <li>Accompagnement administratif lors du changement de fournisseur</li>
                    <li>Service rapide et 100% gratuit pour l'étude</li>
                </ul>
                <a href="#contact" class="btn btn-outline">Demander mon étude gratuite</a>
            </div>
            <div class="col-image">
                <img src="{{ asset('images/savings.svg') }}" alt="Illustration des économies réalisées">
            </div>
        </div>
    </div>
</section>

{{-- ================= SOLAIRE ================= --}}
<section class="section section-alt" id="solaire">
    <div class="container">
        <div class="two-col reverse">
            <div class="col-image">
                <img src="{{ asset('images/solar-panels-1.svg') }}" alt="Installation de panneaux photovoltaïques">
            </div>
            <div class="col-text">
                <h2>Produisez votre propre électricité avec le solaire</h2>
                <p>
                    Après avoir optimisé votre contrat d'énergie, allez encore plus loin avec
                    l'installation de panneaux photovoltaïques. Nos partenaires qualifiés vous
                    accompagnent dans votre projet afin de :
                </p>
                <ul class="check-list">
                    <li>Réduire durablement vos factures</li>
                    <li>Produire une énergie propre et renouvelable</li>
                    <li>Valoriser votre logement</li>
                    <li>Gagner en indépendance énergétique</li>
                </ul>
                <p>Nous réalisons une étude personnalisée afin d'évaluer la rentabilité de votre installation.</p>
                <a href="#contact" class="btn btn-primary">Étudier mon projet solaire</a>
            </div>
        </div>
    </div>
</section>

{{-- ================= COMMENT ÇA MARCHE ================= --}}
<section class="section" id="comment">
    <div class="container">
        <h2 class="section-title">Comment ça fonctionne ?</h2>
        <p class="section-subtitle">Un accompagnement simple, en 4 étapes.</p>

        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Vous nous envoyez votre facture</h3>
                <p>Notre équipe analyse gratuitement votre consommation.</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Nous comparons les offres</h3>
                <p>Nous recherchons les tarifs les plus compétitifs selon votre profil.</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Vous économisez</h3>
                <p>Nous vous accompagnons dans toutes les démarches pour changer de fournisseur si une meilleure offre est disponible.</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h3>Vous passez au solaire</h3>
                <p>Si votre habitation est éligible, nous vous proposons une étude gratuite pour installer des panneaux photovoltaïques.</p>
            </div>
        </div>
    </div>
</section>

{{-- ================= FAQ ================= --}}
<section class="section section-alt" id="faq">
    <div class="container">
        <h2 class="section-title">Questions fréquentes</h2>

        <div class="faq-list">
            <details class="faq-item">
                <summary>Le changement de fournisseur est-il gratuit ?</summary>
                <div class="faq-answer">Oui. Le changement est entièrement gratuit et sans coupure d'électricité.</div>
            </details>
            <details class="faq-item">
                <summary>Dois-je changer de compteur ?</summary>
                <div class="faq-answer">Dans la majorité des cas, non.</div>
            </details>
            <details class="faq-item">
                <summary>Combien puis-je économiser ?</summary>
                <div class="faq-answer">Le montant dépend de votre consommation, de votre logement et de votre fournisseur actuel.</div>
            </details>
            <details class="faq-item">
                <summary>L'étude solaire est-elle gratuite ?</summary>
                <div class="faq-answer">Oui. Notre étude est sans engagement et permet d'évaluer les économies réalisables.</div>
            </details>
        </div>
    </div>
</section>

{{-- ================= CTA FINAL ================= --}}
<section class="cta-final">
    <div class="container">
        <h2>Passez à l'action</h2>
        <p>
            Ne laissez plus vos factures d'énergie augmenter. Profitez d'une étude gratuite,
            comparez les meilleures offres et découvrez si les panneaux solaires peuvent réduire
            durablement vos dépenses.
        </p>
        <a href="#contact" class="btn btn-primary">Demander mon devis gratuit</a>
    </div>
</section>

{{-- ================= CONTACT / FORMULAIRE ================= --}}
<section class="section" id="contact">
    <div class="container">
        <h2 class="section-title">Demandez votre devis gratuit</h2>
        <p class="section-subtitle">
            Remplissez le formulaire ci-dessous, un conseiller vous recontacte rapidement pour
            étudier gratuitement votre situation.
        </p>

        <div class="contact-wrap">
            <div class="contact-info">
                <h3>Un accompagnement 100% gratuit</h3>
                <ul>
                    <li>📞 Réponse sous 24h ouvrées</li>
                    <li>🔒 Vos données restent confidentielles</li>
                    <li>✅ Aucun engagement de votre part</li>
                    <li>💡 Étude électricité, gaz et solaire</li>
                </ul>
            </div>

            <div class="form-card">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        Merci de corriger les champs indiqués ci-dessous.
                    </div>
                @endif

                <form method="POST" action="{{ route('quote.store') }}">
                    @csrf

                    <div class="form-grid-2">
                        <div class="form-row">
                            <label for="nom">Nom complet</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" placeholder="Jean Dupont">
                            @error('nom') <div class="field-error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-row">
                            <label for="telephone">Téléphone</label>
                            <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" placeholder="06 12 34 56 78">
                            @error('telephone') <div class="field-error">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="jean.dupont@email.com">
                        @error('email') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-grid-2">
                        <div class="form-row">
                            <label for="type">Vous êtes</label>
                            <select id="type" name="type">
                                <option value="Particulier" {{ old('type') == 'Particulier' ? 'selected' : '' }}>Particulier</option>
                                <option value="Professionnel" {{ old('type') == 'Professionnel' ? 'selected' : '' }}>Professionnel</option>
                            </select>
                            @error('type') <div class="field-error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-row">
                            <label for="code_postal">Code postal</label>
                            <input type="text" id="code_postal" name="code_postal" value="{{ old('code_postal') }}" placeholder="75001">
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="message">Votre message (facultatif)</label>
                        <textarea id="message" name="message" rows="4" placeholder="Précisez votre besoin, votre fournisseur actuel...">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Obtenir mon devis gratuit</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
