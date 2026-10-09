<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="VaultEdge offers investment, wealth management, retirement, tax, and risk services.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nos Services </title>
    <link rel="icon" href="{{ asset('img/bg-img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>
<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    
    @include('partials.nav')

    <section class="ve-page-hero" style="background-image:url({{ asset('img/bg-img/20.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Ce que nous offrons</span>
            <h1>Des solutions <span>digitales complètes</span></h1>
            <nav aria-label="breadcrumb"><ol class="ve-breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li class="active">Services</li></ol></nav>
        </div>
    </section>

    @if ($services->isNotEmpty())
    <section class="ve-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Notre expertise</span>
                <h2>Une solution pour <span>chaque besoin numérique</span></h2>
                <p>Que vous démarriez un projet ou cherchiez à moderniser votre système d'information, nous avons la solution adaptée.</p>
            </div>

            <div class="ve-services-grid">
                @foreach ($services as $service)
                    <div class="ve-service-card wow fadeInUp" data-wow-delay="{{ (($loop->index % 3) + 1) * 100 }}ms">
                        <div class="ve-service-icon">
                            <i class="{{ $service->icone ?: 'fa fa-cog' }}"></i>
                        </div>
                        <h4>{{ $service->nom }}</h4>
                        <div class="ve-service-description">
                        @foreach (preg_split('/\r\n|\r|\n/', $service->description) as $ligne)
                            @if (trim($ligne) !== '')
                                @if (str_starts_with(trim($ligne), '•'))
                                    <div class="ve-service-point">
                                        <i class="fa fa-check"></i>
                                        <span>{{ trim(str_replace('•', '', $ligne)) }}</span>
                                    </div>
                                @else
                                    <p>{{ $ligne }}</p>
                                @endif
                            @endif
                        @endforeach
</div>
                        <a href="{{ route('services.show', $service) }}" class="ve-card-link">
                            En savoir plus <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="ve-process-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Notre processus</span>
                <h2>Un accompagnement <span>simple et structuré</span></h2>
            </div>
            <div class="ve-process-grid">
                <div class="ve-process-step wow fadeInUp" data-wow-delay="100ms"><div class="ve-process-num">01</div><h5>Prise de contact</h5>
<p>Un premier échange pour comprendre votre besoin, vos objectifs et vos contraintes. Nous recueillons les informations essentielles sur votre projet afin d'identifier les premières pistes et de définir ensemble les prochaines étapes.</p></div>
                <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
                <div class="ve-process-step wow fadeInUp" data-wow-delay="250ms"><div class="ve-process-num">02</div><h5>Analyse & devis</h5>
<p>Nous étudions en détail votre projet, vos besoins, vos contraintes et votre contexte. Nous définissons une solution adaptée et vous remettons une proposition claire, accompagnée d'un devis détaillé et des prochaines étapes.</p></div>
                <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
                <div class="ve-process-step wow fadeInUp" data-wow-delay="400ms"><div class="ve-process-num">03</div><h5>Développement</h5>
<p>Nous concevons et développons votre solution selon vos objectifs et les spécifications validées. Chaque fonctionnalité est mise en œuvre avec soin, testée et ajustée avec vous, pour garantir une solution fiable, performante et adaptée à votre activité.</p></div>
                <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
                <div class="ve-process-step wow fadeInUp" data-wow-delay="550ms"><div class="ve-process-num">04</div><h5>Livraison & support</h5>
<p>Nous mettons votre solution en production dans les meilleures conditions, avec une formation si nécessaire. Nous assurons ensuite un accompagnement technique pour faciliter sa prise en main et garantir son bon fonctionnement.</p></div>
            </div>
        </div>
    </section>

    <section class="ve-section ve-faq-section">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-12 col-lg-5 wow fadeInLeft" data-wow-delay="100ms">
                    <span class="ve-section-tag">Questions fréquentes</span>
                    <h2>Foire Aux <span>Questions</span></h2>
                    <p>Vous ne trouvez pas votre réponse ? <a href="{{ route('contact') }}" style="color:var(--ve-gold);">Contactez-nous</a> et nous vous répondrons sous 24h.</p>
                    <a href="{{ route('contact') }}" class="ve-btn-primary mt-30">Contacter notre équipe</a>
                </div>
                <div class="col-12 col-lg-7 wow fadeInRight" data-wow-delay="200ms">
                    <div class="ve-faq-list">
                        <div class="ve-faq-item open"><div class="ve-faq-q"><span>Comment démarrer un projet avec HORINFO ?</span><i class="fa fa-plus"></i></div><div class="ve-faq-a">Il suffit de nous contacter pour un premier échange gratuit. Nous analysons votre besoin et revenons vers vous avec une proposition sous quelques jours.</div></div>
                        <div class="ve-faq-item"><div class="ve-faq-q"><span>Combien coûte un projet web ou mobile ?</span><i class="fa fa-plus"></i></div><div class="ve-faq-a">Le coût dépend de la complexité et des fonctionnalités souhaitées. Nous établissons un devis détaillé après avoir compris votre besoin.</div></div>
                        <div class="ve-faq-item"><div class="ve-faq-q"><span>Assurez-vous la maintenance après livraison ?</span><i class="fa fa-plus"></i></div><div class="ve-faq-a">Oui, nous proposons un accompagnement et une assistance technique continue après la mise en production de votre solution.</div></div>
                        <div class="ve-faq-item"><div class="ve-faq-q"><span>Travaillez-vous avec des institutions internationales ?</span><i class="fa fa-plus"></i></div><div class="ve-faq-a">Oui, nous accompagnons régulièrement des organisations telles que la Banque mondiale, le PNUD et l'Union européenne.</div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ve-cta-banner bg-img" style="background-image:url({{ asset('img/bg-img/6.jpg') }});">
        <div class="ve-cta-overlay"></div>
        <div class="container ve-cta-content">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <h2>
                        Prêt à concrétiser votre <span>projet numérique ?</span>
                    </h2>
                    <p>
                        Échangez gratuitement avec notre équipe pour discuter de vos besoins
                        et obtenir un premier devis.
                    </p>
                </div>
                <div class="col-12 col-lg-4 text-lg-right">
                    <a href="#" class="ve-btn-white" data-toggle="modal" data-target="#devisModal">
                        Demander un devis
                    </a>
                </div>

            </div>
        </div>
    </section>

    @include('partials.modal-devis')
    @include('partials.footer')
    @include('partials.modal-rendez-vous')

    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/vaultedge.js') }}"></script>
</body>
</html>