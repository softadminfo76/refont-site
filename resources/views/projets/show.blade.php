<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ Str::limit(strip_tags($projet->resume), 155) }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $projet->titre_court }} - HORINFO</title>

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
        // Titre du hero : les derniers mots en cyan
        $mots       = explode(' ', $projet->titre_court);
        $nbCyan     = count($mots) >= 4 ? 2 : 1;
        $debutTitre = implode(' ', array_slice($mots, 0, count($mots) - $nbCyan));
        $finTitre   = implode(' ', array_slice($mots, -$nbCyan));

        // Découpe du détail : chaque <h3> devient une carte
        $introDetail = '';
        $sectionsDetail = [];

        if ($projet->detail) {
            $blocs = preg_split('/(?=<h3[\s>])/i', $projet->detail, -1, PREG_SPLIT_NO_EMPTY);

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
            <span class="ve-section-tag">{{ $projet->secteur }}</span>
            <h1>{{ $debutTitre }} <span>{{ $finTitre }}</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="ve-breadcrumb">
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('projets.index') }}">Projets</a></li>
                    <li class="active">{{ Str::limit($projet->titre_court, 50) }}</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- PRÉSENTATION --}}
    <section class="ve-section">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-7">
                    <a href="{{ route('projets.index') }}" class="ve-back-link">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Retour aux projets
                    </a>
                    <span class="ve-section-tag">Le projet</span>
                    <h2 class="ve-pj-fulltitle">{{ $projet->titre }}</h2>
                    <p class="ve-svc-lead">{{ $projet->resume }}</p>

                    @if($projet->image)
                        <img src="{{ asset('storage/' . $projet->image) }}"
                             alt="{{ $projet->titre_court }}" class="ve-pj-image">
                    @endif
                </div>

                <div class="col-12 col-lg-5 mt-4 mt-lg-0">
                    <div class="ve-svc-panel">
                        <h5>En bref</h5>
                        <dl class="ve-pj-info">
                            <dt>Client</dt>
                            <dd>{{ $projet->client }}</dd>

                            @if($projet->financeur)
                                <dt>Financeur</dt>
                                <dd>{{ $projet->financeur }}</dd>
                            @endif

                            <dt>Secteur</dt>
                            <dd>{{ $projet->secteur }}</dd>
                        </dl>
                        <button type="button" class="ve-btn-cyan" data-toggle="modal" data-target="#devisModal">
                            Discuter de votre projet
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- DÉTAIL --}}
    @if($projet->detail)
        <section class="ve-section ve-svc-alt">
            <div class="container">
                <div class="ve-svc-head">
                    <span class="ve-section-tag">En détail</span>
                    <h2 class="ve-svc-title">Ce que nous avons <span>réalisé</span></h2>
                </div>

                @if(!empty($sectionsDetail))

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
                    <div class="ve-article-content ve-svc-detail">
                        {!! $projet->detail !!}
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- AUTRES PROJETS --}}
    @if($autresProjets->isNotEmpty())
        <section class="ve-section">
            <div class="container">
                <div class="ve-svc-head">
                    <span class="ve-section-tag">Autres références</span>
                    <h2 class="ve-svc-title">D'autres projets <span>qui pourraient vous intéresser</span></h2>
                </div>

                <div class="row">
                    @foreach($autresProjets as $autre)
                        <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex">
                            <a href="{{ route('projets.show', $autre) }}" class="ve-pj-card w-100">
                                <span class="ve-pj-badge">{{ $autre->secteur }}</span>
                                <h5>{{ $autre->titre_court }}</h5>
                                <p class="ve-pj-client"><i class="fa fa-building-o" aria-hidden="true"></i> {{ $autre->client }}</p>
                                <p class="ve-pj-resume">{{ $autre->resume }}</p>
                                <span class="ve-svc-more">Voir le projet →</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-2">
                    <a href="{{ route('projets.index') }}" class="ve-btn-cyan">Voir tous les projets</a>
                </div>
            </div>
        </section>
    @endif

    @include('partials.footer')

    @include('partials.modal-devis')
    @include('partials.modal-rendez-vous')

    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/vaultedge.js') }}"></script>

</body>
</html>