<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="VaultEdge blog — expert investment tips, market analysis, and wealth management guides.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Financial Insights — VaultEdge</title>
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>
<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    
    @include('partials.nav')

    <section class="ve-page-hero" style="background-image:url({{ asset('img/bg-img/24.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Blog</span><h1>Blog <span>Horinfo</span></h1>
            <nav aria-label="breadcrumb"><ol class="ve-breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li class="active">Blog</li></ol></nav>
        </div>
    </section>

    <section class="ve-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    @if ($articles->isNotEmpty())
                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="{{ (($loop->index % 6) + 1) * 100 }}ms">
                                <div class="ve-insight-card">
                                    <div class="ve-insight-img bg-img" style="background-image:url({{ $article->image ? asset('storage/' . $article->image) : asset('img/bg-img/10.jpg') }});"></div>
                                    <div class="ve-insight-body">
                                        <span class="ve-insight-cat">{{ $article->categorie }}</span>
                                        <h5><a href="{{ route('post.show', $article->slug) }}">{{ $article->titre }}</a></h5>
                                        <p>{{ Str::limit($article->extrait, 150) }}</p>
                                        <div class="ve-insight-meta">
                                            <span><i class="fa fa-calendar"></i> {{ $article->publie_le->translatedFormat('j F Y') }}</span>
                                            <a href="{{ route('post.show', $article->slug) }}">Lire l'article <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($articles->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $articles->links() }}
                        </div>
                    @endif
                @else
                    <p class="text-center">Aucun article pour le moment.</p>
                @endif
                    <div class="ve-pagination"><a href="#" class="active">1</a><a href="#">2</a><a href="#">3</a><a href="#"><i class="fa fa-chevron-right"></i></a></div>
                </div>

                    <div class="col-12 col-lg-4">
                <div class="ve-sidebar">
                    <div class="ve-sidebar-widget">
                        <h5 class="ve-sidebar-title">Recherche</h5>
                        <form action="{{ route('post.index') }}" method="GET">
                            <div class="ve-search-box">
                                <input type="text" name="q" placeholder="Rechercher un article...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    @if ($categories->isNotEmpty())
                        <div class="ve-sidebar-widget">
                            <h5 class="ve-sidebar-title">Catégories</h5>
                            <ul class="ve-cat-list">
                                @foreach ($categories as $categorie)
                                    <li>
                                        <a href="{{ route('post.index', ['categorie' => $categorie->categorie]) }}">
                                            {{ $categorie->categorie }} <span>{{ $categorie->total }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($recents->isNotEmpty())
                        <div class="ve-sidebar-widget">
                            <h5 class="ve-sidebar-title">Articles récents</h5>
                            @foreach ($recents as $recent)
                                <div class="ve-recent-post">
                                    <div class="ve-rp-img bg-img" style="background-image:url({{ $recent->image ? asset('storage/' . $recent->image) : asset('img/bg-img/10.jpg') }});"></div>
                                    <div>
                                        <a href="{{ route('post.show', $recent->slug) }}">{{ $recent->titre }}</a>
                                        <span><i class="fa fa-calendar"></i> {{ $recent->publie_le->translatedFormat('j F Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        
            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.modal-rendez-vous')

    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/vaultedge.js') }}"></script>
</body></html>