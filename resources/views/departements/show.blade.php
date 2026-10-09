<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ Str::limit(strip_tags($departement->resume), 155) }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Département {{ $departement->nom }} - HORINFO</title>

    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>

<body>

    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>

    @include('partials.nav')

    @php
        // Titre : les derniers mots en couleur
        $mots       = explode(' ', $departement->nom);
        $nbCyan     = count($mots) >= 3 ? 2 : 1;
        $debutTitre = implode(' ', array_slice($mots, 0, count($mots) - $nbCyan));
        $finTitre   = implode(' ', array_slice($mots, -$nbCyan));

        // Découpe du détail : chaque <h3> devient une carte
        $introDetail = '';
        $sectionsDetail = [];

        if ($departement->detail) {
            $blocs = preg_split('/(?=<h3[\s>])/i', $departement->detail, -1, PREG_SPLIT_NO_EMPTY);

            foreach ($blocs as $bloc) {
                if (preg_match('/^<h3[^>]*>(.*?)<\/h3>(.*)$/is', $bloc, $m)) {
                    $sectionsDetail[] = [
                        'titre' => html_entity_decode(strip_tags($m[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                        'corps' => $m[2],
                    ];
                } else {
                    $introDetail .= $bloc;
                }
            }
        }
    @endphp

    {{-- HERO --}}
    <section class="ve-page-hero ve-page-hero-sm" style="background-image:url({{ asset('img/bg-img/10.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Nos départements</span>
            <h1>Département {{ $debutTitre }} <span>{{ $finTitre }}</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="ve-breadcrumb">
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('about') }}">L'entreprise</a></li>
                    <li class="active">{{ $departement->nom }}</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- PRÉSENTATION --}}
    <section class="ve-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 {{ $services->isNotEmpty() ? 'col-lg-6' : '' }}">
                    @if($departement->icone)
                        <span class="ve-svc-icon"><i class="{{ $departement->icone }}" aria-hidden="true"></i></span>
                    @endif

                    <h2 class="ve-svc-title">Notre <span>mission</span></h2>
                    <p class="ve-svc-lead">{{ $departement->resume }}</p>

                    <div class="ve-svc-actions">
                        <button type="button" class="ve-btn-cyan" data-toggle="modal" data-target="#devisModal">
                            Demander un devis
                        </button>
                    </div>
                </div>

                @if($services->isNotEmpty())
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        <div class="ve-svc-panel">
                            <h5>Les services du département</h5>
                            <ul class="ve-check-list">
                                @foreach($services as $service)
                                    <li><a href="{{ route('services.show', $service->id) }}">{{ $service->nom }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    {{-- EN DÉTAIL --}}
    @if(!empty($sectionsDetail))
        <section class="ve-section ve-svc-alt">
            <div class="container">
                <div class="ve-svc-head">
                    <span class="ve-section-tag">Notre expertise</span>
                    <h2 class="ve-svc-title">Ce que nous faisons <span>pour vous</span></h2>
                </div>

                @if(trim(strip_tags($introDetail)))
                    <div class="ve-detail-intro">{!! $introDetail !!}</div>
                @endif

                <div class="row">
                    @foreach($sectionsDetail as $s)
                        <div class="col-12 {{ $loop->last && $loop->iteration % 2 == 1 ? 'col-md-12' : 'col-md-6' }} mb-4 d-flex">
                            <div class="ve-detail-card w-100">
                                <span class="ve-detail-num">{{ sprintf('%02d', $loop->iteration) }}</span>
                                <h3>{{ $s['titre'] }}</h3>
                                <div class="ve-detail-body">{!! $s['corps'] !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- AUTRES DÉPARTEMENTS --}}
    @if($autres->isNotEmpty())
        <section class="ve-section">
            <div class="container">
                <div class="ve-svc-head">
                    <span class="ve-section-tag">Nos départements</span>
                    <h2 class="ve-svc-title">Une expertise <span>complète</span></h2>
                </div>

                <div class="row justify-content-center">
                    @foreach($autres as $autre)
                        <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex">
                            <a href="{{ route('departements.show', $autre) }}" class="ve-svc-card w-100">
                                @if($autre->icone)
                                    <span class="ve-svc-icon"><i class="{{ $autre->icone }}" aria-hidden="true"></i></span>
                                @endif
                                <h5>{{ $autre->nom }}</h5>
                                <p>{{ Str::limit($autre->resume, 110) }}</p>
                                <span class="ve-svc-more">Découvrir →</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- BANDEAU CTA --}}
    <section class="ve-svc-cta">
        <div class="container">
            <div class="ve-svc-cta-inner">
                <div>
                    <h2>Un besoin dans ce <span>domaine ?</span></h2>
                    <p>Échangez gratuitement avec notre équipe pour discuter de votre projet.</p>
                </div>
                <button type="button" class="ve-btn-white" data-toggle="modal" data-target="#devisModal">
                    Demander un devis
                </button>
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