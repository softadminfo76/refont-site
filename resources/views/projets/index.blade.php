<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Découvrez les projets réalisés par HORINFO avec ses partenaires institutionnels : ministères, programmes et organisations.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Nos projets - HORINFO</title>

    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>

<body>

    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>

    @include('partials.nav')

    {{-- HERO --}}
    <section class="ve-page-hero ve-page-hero-sm" style="background-image:url({{ asset('img/bg-img/10.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Nos références</span>
            <h1>Des projets qui <span>font leurs preuves</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="ve-breadcrumb">
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="active">Projets</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- CHIFFRES (calculés depuis la base) --}}
    @if($projets->isNotEmpty())
        <section class="ve-pj-stats">
            <div class="container">
                <div class="ve-pj-stats-row">
                    <div class="ve-pj-stat">
                        <strong>{{ $projets->count() }}</strong>
                        <span>{{ Str::plural('projet réalisé', $projets->count()) }}</span>
                    </div>
                    <div class="ve-pj-stat">
                        <strong>{{ $projets->pluck('client')->unique()->count() }}</strong>
                        <span>institutions partenaires</span>
                    </div>
                    <div class="ve-pj-stat">
                        <strong>{{ $secteurs->count() }}</strong>
                        <span>secteurs d'intervention</span>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- LISTE --}}
    <section class="ve-section">
        <div class="container">

            @if($projets->isEmpty())
                <p class="text-center text-muted">Aucun projet pour le moment.</p>
            @else

                <div class="row" id="ve-pj-grid">
                    @foreach($projets as $projet)
                        <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex ve-pj-item" data-secteur="{{ $projet->secteur }}">
                            <a href="{{ route('projets.show', $projet) }}" class="ve-pj-card w-100">
                                <span class="ve-pj-badge">{{ $projet->secteur }}</span>
                                <h5>{{ $projet->titre_court }}</h5>
                                <p class="ve-pj-client"><i class="fa fa-building-o" aria-hidden="true"></i> {{ $projet->client }}</p>
                                <p class="ve-pj-resume">{{ $projet->resume }}</p>
                                <span class="ve-svc-more">Voir le projet →</span>
                            </a>
                        </div>
                    @endforeach
                </div>

            @endif
        </div>
    </section>

    {{-- BANDEAU CTA --}}
    <section class="ve-svc-cta">
        <div class="container">
            <div class="ve-svc-cta-inner">
                <div>
                    <h2>Un projet <span>similaire ?</span></h2>
                    <p>Parlons de votre besoin : notre équipe vous répond rapidement.</p>
                </div>
                <div class="col-12 col-lg-4 text-lg-right">
                    <a href="#" class="ve-btn-white" data-toggle="modal" data-target="#devisModal">
                        Demander un devis
                    </a>
                </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.modal-rendez-vous')
    @include('partials.modal-devis')

    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/vaultedge.js') }}"></script>

</body>
</html>