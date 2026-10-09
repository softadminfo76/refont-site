<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Learn about VaultEdge — our story, team, mission, and values.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>About Us — VaultEdge</title>
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>
<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    
    @include('partials.nav')

    <section class="ve-page-hero" style="background-image:url({{ asset('img/bg-img/13.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Notre histoire</span>
            <h1>Au service du numérique depuis <span>1999</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="ve-breadcrumb">
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="active">A propos</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ABOUT SPLIT -->
    <section class="ve-section" id="qui-sommes-nous">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="ve-about-img-stack">
                        <div class="ve-about-img-1 bg-img" style="background-image:url({{ asset('img/bg-img/14.jpg') }});"></div>
                        <div class="ve-about-img-2 bg-img" style="background-image:url({{ asset('img/bg-img/5.jpg') }});"></div>
                        <div class="ve-about-ribbon"><strong>25+</strong><span>Ans d'expertise</span></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 wow fadeInRight" data-wow-delay="200ms">
                    <div class="ve-about-text">
                        <span class="ve-section-tag">Qui sommes-nous</span>
                        <h2>Une entreprise bâtie sur l'<span>Expertise</span> et la Confiance</h2>
                        <p class="ve-lead">Créée en 1999, HORINFO est une entreprise spécialisée dans les technologies de l'information, l'intégration de solutions numériques et l'accompagnement des organisations dans leur transformation digitale.</p>
                        <p>Depuis plus de 25 ans, HORINFO accompagne les entreprises, administrations publiques, ONG, institutions et organisations privées dans l'amélioration de leur performance grâce à des solutions innovantes, fiables et adaptées aux réalités du marché.</p>
                        <p>Notre expertise couvre notamment la gestion d'entreprise, la gestion immobilière, la gestion événementielle, le développement de solutions sur mesure ainsi que l'accompagnement à la transformation digitale.</p>
                        <p>Grâce à une équipe engagée et à une approche centrée sur le client, HORINFO s'impose aujourd'hui comme un partenaire de confiance pour les organisations souhaitant accélérer leur modernisation et renforcer leur efficacité opérationnelle.</p>
                        <div class="ve-about-features">
                            <div class="ve-af-item"><i class="fa fa-check"></i><span>ERP et gestion d'entreprise</span></div>
                            <div class="ve-af-item"><i class="fa fa-check"></i><span>Gestion immobilière</span></div>
                            <div class="ve-af-item"><i class="fa fa-check"></i><span>Gestion événementielle</span></div>
                            <div class="ve-af-item"><i class="fa fa-check"></i><span>Développement spécifique</span></div>
                            <div class="ve-af-item"><i class="fa fa-check"></i><span>Transformation digitale</span></div>
                        </div>
                        <a href="{{ route('services') }}" class="ve-btn-primary mt-30">Voir nos Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SERVICES GRID (new card layout) ===== -->
<section class="ve-section ve-services-section" id="domaines">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">NOS DOMAINES D'INTERVENTION</span>
            <h2>Notre expertise au service de <span>vos projets</span></h2>
            <p>Nous vous accompagnons dans la réalisation complète de vos projets</p>
        </div>

        <div class="ve-services-grid">

            {{-- INGÉNIERIE LOGICIELLE (inchangée) --}}
            <div class="ve-service-card wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-service-icon"><i class="fa fa-code"></i></div>
                <h4>Département Ingénierie Logicielle</h4>
                <p>
                    Le Département Ingénierie Logicielle accompagne les entreprises dans la conception et la mise en place de solutions informatiques adaptées à leurs besoins.
                </p>
                <ul>
                    <li>Conception et développement d'applications web et mobiles sur mesure.</li>
                    <li>Développement de plateformes et logiciels adaptés aux processus métiers.</li>
                    <li>Maintenance, évolution et amélioration des applications.</li>
                    <li>Mise en place de solutions performantes, sécurisées et évolutives.</li>
                    <li>Accompagnement et conseil technique tout au long des projets.</li>
                </ul>
                <a href="{{ route('services.show', 1) }}" class="ve-card-link">En savoir plus <i class="fa fa-long-arrow-right"></i></a>
            </div>

            {{-- TRANSFORMATION DIGITALE (remplace Marketing Digital) --}}
            <div class="ve-service-card wow fadeInUp" data-wow-delay="200ms">
                <div class="ve-service-icon"><i class="fa fa-bullhorn"></i></div>
                <h4>Département Transformation Digitale</h4>
                <p>
                    Le Département Transformation Digitale accompagne les organisations publiques et privées dans leur transition numérique, à travers une communication digitale performante et des outils modernes.
                </p>
                <ul>
                    <li>Élaboration de stratégies digitales et de plans éditoriaux adaptés à vos objectifs.</li>
                    <li>Gestion des réseaux sociaux et animation de vos communautés en ligne.</li>
                    <li>Production de contenus : visuels, vidéos, infographies et articles.</li>
                    <li>Campagnes publicitaires en ligne et optimisation de votre site web (SEO).</li>
                    <li>Analyse des performances et reporting régulier.</li>
                    <li>Diagnostic digital et accompagnement de votre transformation, avec formation des équipes.</li>
                </ul>
                <a href="{{ route('services.show', 2) }}" class="ve-card-link">En savoir plus <i class="fa fa-long-arrow-right"></i></a>
            </div>

            {{-- MARKETING & COMMERCIAL --}}
<div class="ve-service-card wow fadeInUp" data-wow-delay="300ms">
    <div class="ve-service-icon">
        <i class="fa fa-line-chart"></i>
    </div>

    <h4>Département Marketing & Commercial</h4>

    <p>
        Le Département Marketing & Commercial est le moteur de croissance
        d’HORINFO. Il développe la notoriété de la marque, génère des leads
        qualifiés et accompagne leur conversion en clients durables.
    </p>

    <ul>
        <li>Stratégie marketing et communication digitale.</li>
        <li>Production de contenus et gestion des réseaux sociaux.</li>
        <li>Prospection B2B et qualification des leads.</li>
        <li>Démonstrations des solutions Dolibarr, Yeele et Immobilier.</li>
        <li>Élaboration des offres commerciales et réponses aux appels d’offres.</li>
        <li>Développement de partenariats et expansion commerciale régionale.</li>
    </ul>

    <a href="{{ route('services.show', 3) }}" class="ve-card-link">
        En savoir plus <i class="fa fa-long-arrow-right"></i>
    </a>
</div>

        </div>
    </div>
</section>

<section class="ve-section ve-partners-section" id="references">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">Ils Nous Font Confiance</span>
            <h2>Des Références Publiques et <span>Internationales Majeures</span></h2>
        </div>
    </div>

    <div class="ve-partners-marquee">
        <div class="ve-partners-track">
            <div class="ve-partner-card"><img src="{{ asset('img/clients/banque_mondiale.png') }}" alt="Banque Mondiale"><span>Banque Mondiale</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/pnud.png') }}" alt="PNUD"><span>PNUD</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/union_europeenne.png') }}" alt="Union Européenne"><span>Union Européenne</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/usaid.png') }}" alt="USAID"><span>USAID</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/cnss.png') }}" alt="CNSS"><span>CNSS</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/arcep.png') }}" alt="ARCEP"><span>ARCEP</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/institut_elevage.png') }}" alt="Institut Élevage"><span>Institut Élevage</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/expertise_france.png') }}" alt="Expertise France"><span>Expertise France</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/armoirie_du_burkina.png') }}" alt="Burkina Faso"><span>Burkina Faso</span></div>
            <!-- dupliqué pour la boucle continue -->
            <div class="ve-partner-card"><img src="{{ asset('img/clients/banque_mondiale.png') }}" alt="Banque Mondiale"><span>Banque Mondiale</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/pnud.png') }}" alt="PNUD"><span>PNUD</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/union_europeenne.png') }}" alt="Union Européenne"><span>Union Européenne</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/usaid.png') }}" alt="USAID"><span>USAID</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/cnss.png') }}" alt="CNSS"><span>CNSS</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/arcep.png') }}" alt="ARCEP"><span>ARCEP</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/institut_elevage.png') }}" alt="Institut Élevage"><span>Institut Élevage</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/expertise_france.png') }}" alt="Expertise France"><span>Expertise France</span></div>
            <div class="ve-partner-card"><img src="{{ asset('img/clients/armoirie_du_burkina.png') }}" alt="Burkina Faso"><span>Burkina Faso</span></div>
        </div>
    </div>
</section>


    <!-- MISSION / VISION / VALUES -->
    <section class="ve-mvv-section" id="mission-vision-valeurs">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Notre Fondation</span>
                <h2>Mission, Vision &amp; <span>Valeurs</span></h2>
            </div>
            <div class="ve-mvv-grid">
                <div class="ve-mvv-card wow fadeInUp" data-wow-delay="100ms">
                    <div class="ve-mvv-icon"><i class="fa fa-bullseye"></i></div>
                    <h4>Notre Mission</h4>
                    <ul>
                        <li>Démocratiser l’accès à des solutions numériques fiables, accessibles et adaptées aux besoins de chaque organisation.</li>
                        <li>Accompagner les entreprises dans leur transformation digitale et l’optimisation de leurs activités.</li>
                        <li>Concevoir des solutions innovantes permettant d’améliorer la performance et la productivité.</li>
                        <li>Mettre notre expertise technologique au service des projets et des objectifs de nos clients.</li>
                        <li>Proposer des solutions durables, évolutives et adaptées aux réalités de nos partenaires.</li>
                    </ul>
                </div>
                <div class="ve-mvv-card wow fadeInUp" data-wow-delay="250ms">
                    <div class="ve-mvv-icon"><i class="fa fa-eye"></i></div>
                    <h4>Notre Vision</h4>
                    <ul>
                        <li>Devenir un acteur de référence dans le domaine des solutions numériques en Afrique.</li>
                        <li>Contribuer à la transformation digitale des entreprises et des organisations.</li>
                        <li>Promouvoir l’innovation technologique et l’utilisation des outils numériques.</li>
                        <li>Développer des solutions modernes, accessibles et adaptées aux réalités locales.</li>
                        <li>Construire des partenariats durables fondés sur la confiance et la performance.</li>
                        <li>Participer à la création d’un écosystème numérique dynamique et compétitif.</li>
                    </ul>
                </div>
                <div class="ve-mvv-card wow fadeInUp" data-wow-delay="400ms">
                    <div class="ve-mvv-icon"><i class="fa fa-heart"></i></div>
                    <h4>Nos Valeurs</h4>
                    <ul>
                        <li><strong>Innovation :</strong> encourager la créativité et proposer des solutions adaptées aux évolutions technologiques.</li>
                        <li><strong>Excellence :</strong> rechercher la qualité et la performance dans chacune de nos réalisations.</li>
                        <li><strong>Intégrité :</strong> agir avec transparence, responsabilité et respect envers nos clients et partenaires.</li>
                        <li><strong>Écoute :</strong> comprendre les besoins de nos clients afin de leur apporter des réponses pertinentes et personnalisées.</li>
                        <li><strong>Engagement :</strong> nous investir pleinement dans chaque projet pour contribuer à la réussite de nos clients.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM -->
    <section class="ve-section ve-team-section" id="equipe">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Notre équipe</span>
                <h2>Notre équipe de <span>direction</span></h2>
                <p>Des professionnels expérimentés, unis par une même exigence de qualité au service de vos projets numériques.</p>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="100ms">
                    <div class="ve-team-card">
                        <div class="ve-team-img bg-img" style="background-image:url({{ asset('img/bg-img/15.jpg') }});"></div>
                        <div class="ve-team-info">
                            <h5>Jordan Hayes</h5><span>Chief Executive Officer</span>
                            <div class="ve-team-social"><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="200ms">
                    <div class="ve-team-card">
                        <div class="ve-team-img bg-img" style="background-image:url({{ asset('img/bg-img/16.jpg') }});"></div>
                        <div class="ve-team-info">
                            <h5>Taylor Brooks</h5><span>Chief Investment Officer</span>
                            <div class="ve-team-social"><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="300ms">
                    <div class="ve-team-card">
                        <div class="ve-team-img bg-img" style="background-image:url({{ asset('img/bg-img/17.jpg') }});"></div>
                        <div class="ve-team-info">
                            <h5>Morgan Lane</h5><span>Head of Wealth Planning</span>
                            <div class="ve-team-social"><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="400ms">
                    <div class="ve-team-card">
                        <div class="ve-team-img bg-img" style="background-image:url({{ asset('img/bg-img/18.jpg') }});"></div>
                        <div class="ve-team-info">
                            <h5>Casey Rivera</h5><span>Head of Risk &amp; Compliance</span>
                            <div class="ve-team-social"><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ve-counter-section">
        <div class="container">
            <div class="ve-counter-grid">
                <div class="ve-counter-item wow fadeInUp" data-wow-delay="100ms">
                    <i class="fa fa-users"></i>
                    <strong class="counter" data-count="50000">0</strong><span>+</span>
                    <p>Happy Clients</p>
                </div>
                <div class="ve-counter-item wow fadeInUp" data-wow-delay="200ms">
                    <i class="fa fa-briefcase"></i>
                    <strong class="counter" data-count="4200">0</strong><span>M+</span>
                    <p>Assets Managed</p>
                </div>
                <div class="ve-counter-item wow fadeInUp" data-wow-delay="300ms">
                    <i class="fa fa-globe"></i>
                    <strong class="counter" data-count="30">0</strong><span>+</span>
                    <p>Countries Served</p>
                </div>
                <div class="ve-counter-item wow fadeInUp" data-wow-delay="400ms">
                    <i class="fa fa-trophy"></i>
                    <strong class="counter" data-count="18">0</strong><span></span>
                    <p>Industry Awards</p>
                </div>
            </div>
        </div>
    </section>
    <section class="ve-newsletter-section">
        <div class="container">
            <div class="ve-newsletter-wrap">
                <div class="ve-nl-left">
                    <i class="fa fa-envelope-o"></i>
                    <div>
                        <h3>Restez informé de nos actualités</h3>
                        <p>Recevez nos actualitéset directement dans votre boîte mail.</p>
                    </div>
                </div>
                <div class="ve-nl-right">
                    <form class="ve-nl-form" id="abonnementForm" action="{{ route('abonnement.actualites') }}" method="POST">
                        @csrf
                        <input 
                            type="email" name="email" placeholder="Votre adresse e-mail" required>
                        <button type="submit">S’abonner</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="abonnementToast" class="ve-toast">
        <i class="fa fa-check-circle"></i>
        <span>Merci pour votre abonnement !</span>
    </div>

    @include('partials.footer')
    @include('partials.modal-rendez-vous')


    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/vaultedge.js') }}"></script>

<script>
    (function () {
        const form = document.getElementById('abonnementForm');
        const toast = document.getElementById('abonnementToast');

        if (!form || !toast) { return; }

        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: { 'Accept': 'application/json' },
                    body: new FormData(form)
                });

                const result = await response.json();

                if (!response.ok) {
                    const messages = Object.values(result.errors || {}).flat();
                    alert(messages.join('\n') || result.message || 'Une erreur est survenue.');
                    return;
                }

                form.reset();
                toast.querySelector('span').textContent = result.message || 'Merci pour votre abonnement !';
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 4000);

            } catch (error) {
                console.error(error);
                alert('Une erreur est survenue. Réessaie dans un instant.');
            }
        });
    })();
</script>
</body>
</html>