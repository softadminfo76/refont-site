<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ Str::limit(strip_tags(explode('•', $service->description)[0]), 155) }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $service->nom }} - HORINFO</title>

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
        $imageService = $service->image
            ? asset('storage/' . $service->image)
            : asset('img/bg-img/10.jpg');

        // Intro + puces (séparées par •)
        $parts  = array_filter(array_map('trim', explode('•', $service->description)));
        $intro  = array_shift($parts);
        $points = $parts;

        // Titre : les derniers mots en cyan
        $mots       = explode(' ', $service->nom);
        $nbCyan     = count($mots) >= 4 ? 2 : 1;
        $debutTitre = implode(' ', array_slice($mots, 0, count($mots) - $nbCyan));
        $finTitre   = implode(' ', array_slice($mots, -$nbCyan));

        // Découpe du détail : chaque <h3> devient une carte
        $introDetail = '';
        $sectionsDetail = [];

        if ($service->detail) {
            $blocs = preg_split('/(?=<h3[\s>])/i', $service->detail, -1, PREG_SPLIT_NO_EMPTY);

            foreach ($blocs as $bloc) {
                if (preg_match('/^<h3[^>]*>(.*?)<\/h3>(.*)$/is', $bloc, $m)) {
                    $sectionsDetail[] = ['titre' => html_entity_decode(strip_tags($m[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 'corps' => $m[2]];
                } else {
                    $introDetail .= $bloc;
                }
            }
        }
    @endphp
    {{-- HERO --}}
    <section class="ve-page-hero ve-page-hero-sm" style="background-image:url({{ $imageService }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Nos services</span>
            <h1>{{ $debutTitre }} <span>{{ $finTitre }}</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="ve-breadcrumb">
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ url('/services') }}">Services</a></li>
                    <li class="active">{{ $service->nom }}</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- PRÉSENTATION --}}
    <section class="ve-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 {{ count($points) ? 'col-lg-6' : '' }}">
                    @if($service->icone)
                        <span class="ve-svc-icon"><i class="{{ $service->icone }}" aria-hidden="true"></i></span>
                    @endif

                    <span class="ve-section-tag">Présentation</span>
                    <h2 class="ve-svc-title">Une solution <span>adaptée à votre activité</span></h2>
                    <p class="ve-svc-lead">{{ $intro }}</p>

                    <div class="ve-svc-actions">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#devisModal">
                            Demander un devis
                        </button>
                    </div>
                </div>

                @if(count($points))
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        <div class="ve-svc-panel">
                            <h5>Ce que comprend ce service</h5>
                            <ul class="ve-check-list">
                                @foreach($points as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    {{-- EN DÉTAIL --}}
<section class="ve-section ve-svc-alt">
    <div class="container">
        <div class="ve-svc-head">
            <span class="ve-section-tag">Nos prestations</span>
            <h2 class="ve-svc-title">Ce que nous <span>réalisons pour vous</span></h2>
        </div>

        @if(count($sectionsDetail))

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

        @else
            {{-- Contenu sans titres : affichage simple --}}
            <div class="ve-article-content ve-svc-detail">
                {!! $service->detail ?: '<p>Découvrez notre expertise et les solutions que nous proposons pour répondre à vos besoins.</p>' !!}
            </div>
        @endif
    </div>
</section>

    {{-- AUTRES SERVICES --}}
    @if($autresServices->isNotEmpty())
        <section class="ve-section">
            <div class="container">
                <div class="ve-svc-head">
                    <span class="ve-section-tag">Nos autres services</span>
                    <h2 class="ve-svc-title">Explorez <span>toute notre offre</span></h2>
                </div>

                <div class="row justify-content-center">
                    @foreach($autresServices as $autre)
                        <div class="col-12 col-md-6 col-lg-3 mb-4 d-flex">
                        <a href="{{ route('services.show', $autre->id) }}" class="ve-svc-card w-100">
                                @if($autre->icone)
                                    <span class="ve-svc-icon"><i class="{{ $autre->icone }}" aria-hidden="true"></i></span>
                                @endif
                                <h5>{{ $autre->nom }}</h5>
                                <p>{{ Str::limit(explode('•', $autre->description)[0], 110) }}</p>
                                <span class="ve-svc-more">En savoir plus →</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

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