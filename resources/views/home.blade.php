<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="VaultEdge - Premium financial planning and investment management HTML template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>VaultEdge - Financial Planning &amp; Investment HTML Template</title>

    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>

    @include('partials.nav')

    <!-- ===== HERO: Split layout — left text, right image panel ===== -->
    <section class="ve-hero">
        <!-- Left Panel -->
        <div class="ve-hero-left">
            <span class="ve-hero-badge">Solutions digitales depuis<span class="an"> 1999 </span></span>
            <h1>Tansformez vos idées en <br><span class="ve-highlight">réalité numérique</span></h1>
            <p>Solutions logicielles sur mesure, plateformes web innovantes et stratégie digitale pour propulser votre entreprise. Expertise africaine, stanqarts internationaux.</p>
            <div class="ve-hero-btns">
                <a href="#" class="ve-btn-primary" data-toggle="modal" data-target="#contactModal">
                    Prendre rendez-vous
                </a>
                <a href="{{ route('services') }}" class="ve-btn-ghost">Découvrir nos services</a>
            </div>
            <!-- Quick Stats Row -->
            <div class="ve-hero-stats">
                <div class="ve-stat">
                    <strong>$4.2B+</strong>
                    <span>Assets Managed</span>
                </div>
                <div class="ve-stat-divider"></div>
                <div class="ve-stat">
                    <strong>97%</strong>
                    <span>Client Satisfais</span>
                </div>
                <div class="ve-stat-divider"></div>
                <div class="ve-stat">
                    <strong>25+</strong>
                    <span>Années d'expérience</span>
                </div>
            </div>
        </div>
        <!-- Right Panel: overlapping image cards -->
        <div class="ve-hero-right">
            <div class="ve-hero-img-main bg-img" style="background-image:url({{ asset('img/bg-img/Image\ 1.png') }});"></div>
            <div class="ve-hero-img-accent bg-img" style="background-image:url({{ asset('img/bg-img/3.jpg') }});"></div>
        </div>
    </section>

        <!-- ===== MARQUEE TRUST BAR ===== -->
    <div class="ve-trust-bar">
        <div class="ve-trust-inner">
            <span><i class="fa fa-code"></i> Développement d'application web et mobile</span>
            <span><i class="fa fa-cogs"></i> Développement CRM et application métier</span>
            <span><i class="fa fa-globe"></i> Développement de site web</span>
            <span><i class="fa fa-bullhorn"></i> Marketing digital</span>
            <span><i class="fa fa-refresh"></i> Refonte web</span>
            <span><i class="fa fa-graduation-cap"></i> Formations</span>
            <span><i class="fa fa-search"></i> Audits, études et conseils</span>
            <span><i class="fa fa-calendar"></i> Évènementiel</span>
            <span><i class="fa fa-wrench"></i> Assistance technique</span>
            <span><i class="fa fa-code"></i> Développement d'application web et mobile</span>
            <span><i class="fa fa-cogs"></i> Développement CRM et application métier</span>
            <span><i class="fa fa-globe"></i> Développement de site web</span>
            <span><i class="fa fa-bullhorn"></i> Marketing digital</span>
            <span><i class="fa fa-refresh"></i> Refonte web</span>
            <span><i class="fa fa-graduation-cap"></i> Formations</span>
            <span><i class="fa fa-search"></i> Audits, études et conseils</span>
            <span><i class="fa fa-calendar"></i> Évènementiel</span>
            <span><i class="fa fa-wrench"></i> Assistance technique</span>
        </div>
    </div>

        <!-- ===== WHY US (two-column: image left, content right) ===== -->
    <section class="ve-section ve-whyus-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Side -->
                <div class="col-12 col-lg-5">
                    <div class="ve-whyus-img-wrap wow fadeInLeft" data-wow-delay="100ms">
                        <div class="ve-whyus-img-main bg-img" style="background-image:url({{ asset('img/bg-img/5.jpg') }});"></div>
                        <div class="ve-whyus-badge">
                            <strong>25+</strong>
                            <span>Années d'excelence technologique au Burkina Faso et en Afrique</span>
                        </div>
                    </div>
                </div>
                <!-- Content Side -->
                <div class="col-12 col-lg-7 wow fadeInRight" data-wow-delay="200ms">
                    <div class="ve-whyus-content">
                        <span class="ve-section-tag">Pourquoi choisir HORINFO</span>
                        <h2>Une Approche Stratégique pour <span>Vos Défis Technologiques</span></h2>
                        <p>Depuis 1999, nous combinons expertise technique et proximité client pour livrer des solutions qui répondent vraiment à vos besoins — au Burkina Faso et à l'international.</p>
                        <div class="ve-check-item">
                            <i class="fa fa-check-circle"></i>
                            <div><strong>Accompagnement Sur-Mesure</strong><p>Des solutions logicielles conçues et développées selon vos besoins réels, pas des produits standardisés.</p></div>
                        </div>
                        <div class="ve-check-item">
                            <i class="fa fa-check-circle"></i>
                            <div><strong>Infrastructures & Sécurité</strong><p>Une expertise dédiée en Cloud Computing, infrastructures systèmes, réseau et télécommunications.</p></div>
                        </div>
                        <div class="ve-check-item">
                            <i class="fa fa-check-circle"></i>
                            <div><strong>Confiance Institutionnelle</strong><p>La confiance d'organisations exigeantes comme la Banque Mondiale, le PNUD, l'Union Européenne et l'USAID.</p></div>
                        </div>
                        <a href="{{ route('about') }}" class="ve-btn-primary mt-30">Explorez notre historique et nos valeurs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ===== COUNTERS ===== -->
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

    @if ($realisations->isNotEmpty())
    <section class="ve-section">
        <div class="container">

            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Nos réalisations</span>
                <h2>ce que nous avons <span>déjà construit</span></h2>
                <p>
                    Des exemples concrets de solutions imaginées, conçues et développées par nos équipes.
                </p>
            </div>

            <div class="ve-services-grid">
                @foreach ($realisations as $realisation)
                    <div class="ve-service-card ve-realisation-card wow fadeInUp" data-wow-delay="{{ (($loop->index % 3) + 1) * 100 }}ms">
                        <div class="ve-service-icon">
                            @if ($realisation->logo)
                                <img src="{{ asset('storage/' . $realisation->logo) }}" alt="{{ $realisation->titre }}">
                            @endif
                        </div>

                        <h4>{{ $realisation->titre }}</h4>

                        <p>{{ $realisation->description }}</p>

                        @if (count($realisation->liste_fonctionnalites))
                            <ul class="ve-af-features">
                                @foreach ($realisation->liste_fonctionnalites as $fonctionnalite)
                                    <li>
                                        <i class="fa fa-check"></i>
                                        {{ $fonctionnalite }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if ($realisation->lien)
                            <a href="{{ $realisation->lien }}"
                            class="ve-card-link"
                            target="_blank"
                            rel="noopener noreferrer">
                                En savoir plus
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ===== SERVICES GRID (new card layout) ===== -->
    <section class="ve-section ve-services-section">
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

            {{-- TRANSFORMATION DIGITALE --}}
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

    <!-- ===== TESTIMONIALS ===== -->
    <section class="ve-section ve-partners-section">
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

<section class="ve-section ve-testimonials-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">Témoignages</span>
            <h2>Ce que disent nos <span>clients</span></h2>
        </div>
        <div class="ve-testi-grid">
            <div class="ve-testi-card wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>"HORINFO a livré notre plateforme web dans les délais, avec un vrai suivi à chaque étape. Une équipe sérieuse et à l'écoute."</p>
                <div class="ve-testi-author">
                    <div class="ve-testi-avatar bg-img" style="background-image:url(img/bg-img/32.jpg);"></div>
                    <div><strong>Nom du client</strong><span>Fonction, Entreprise</span></div>
                </div>
            </div>
            <div class="ve-testi-card wow fadeInUp" data-wow-delay="250ms">
                <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>"Grâce à leur solution de gestion, nous suivons désormais nos activités en temps réel. Un gain de temps considérable pour toute l'équipe."</p>
                <div class="ve-testi-author">
                    <div class="ve-testi-avatar bg-img" style="background-image:url(img/bg-img/33.jpg);"></div>
                    <div><strong>Nom du client</strong><span>Fonction, Entreprise</span></div>
                </div>
            </div>
            <div class="ve-testi-card wow fadeInUp" data-wow-delay="400ms">
                <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>"Un accompagnement sur mesure, de l'analyse du besoin jusqu'à la formation de nos équipes. Nous recommandons HORINFO sans hésiter."</p>
                <div class="ve-testi-author">
                    <div class="ve-testi-avatar bg-img" style="background-image:url(img/bg-img/14.jpg);"></div>
                    <div><strong>Nom du client</strong><span>Fonction, Entreprise</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- ===== CTA BANNER ===== -->
    <section class="ve-cta-banner bg-img" style="background-image:url({{ asset('img/bg-img/horinfo-house.jpeg') }});">
        <div class="ve-cta-overlay"></div>
        <div class="container ve-cta-content">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <h2>Prêt à Moderniser <span>Votre Système d'Information?</span></h2>
                    <p>Échangeons autour de vos besoins IT — 30 minutes suffisent pour poser les bases de votre projet.</p>
                </div>
                <div class="col-12 col-lg-4 text-lg-right">
                    <a href="#" class="ve-btn-white" data-toggle="modal" data-target="#contactModal">Prendre un Rendez-Vous</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== LATEST INSIGHTS ===== -->
    @if ($articles->isNotEmpty())
        <section class="ve-section ve-insights-section">
            <div class="container">
                <div class="ve-section-header text-center">
                    <span class="ve-section-tag">Blog &amp; News</span>
                    <h2>Actualités & <span>Insights technologiques</span></h2>
                    <p>Restez informé grâce à nos analyses, conseils et actualités sur les technologies et les solutions numériques.</p>
                </div>
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="{{ 100 + $loop->index * 150 }}ms">
                            <div class="ve-insight-card">
                                <div class="ve-insight-img bg-img" style="background-image:url({{ $article->image ? asset('storage/' . $article->image) : asset('img/bg-img/10.png') }});"></div>
                                <div class="ve-insight-body">
                                    <span class="ve-insight-cat">{{ $article->categorie }}</span>
                                    <h5><a href="{{ route('post.show', $article->slug) }}">{{ $article->titre }}</a></h5>
                                    <p>{{ Str::limit($article->extrait, 150) }}</p>
                                    <div class="ve-insight-meta">
                                        <span><i class="fa fa-calendar"></i> {{ $article->publie_le->translatedFormat('j F') }}</span>
                                        <a href="{{ route('post.show', $article->slug) }}">Lire plus <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ===== NEWSLETTER ===== -->
    <section class="ve-newsletter-section">
        <div class="container">
            <div class="ve-newsletter-wrap">
                <div class="ve-nl-left">
                    <i class="fa fa-map-marker"></i>
                    <div>
                        <h3>Siège Social HORINFO</h3>
                        <p>178 rue 30.131, Sanyiri, Ouagadougou, Burkina Faso</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ve-nl-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7794.971129965007!2d-1.4884694!3d12.3503733!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2ebf3fb567f817%3A0x2ae84c5d4e53f656!2sHORINFO!5e0!3m2!1sfr!2sbf!4v1789729238267!5m2!1sfr!2sbf" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.modal-rendez-vous')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/vaultedge.js') }}"></script>

</body>
</html>
