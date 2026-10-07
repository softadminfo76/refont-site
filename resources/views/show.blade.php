<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Le responsive design est devenu un incontournable pour toute présence web professionnelle. Découvrez pourquoi et comment l'adopter.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{ $article->titre }}
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>
<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>

    @include('partials.nav')
    
    <section class="ve-page-hero ve-page-hero-sm" style="background-image:url({{ asset('img/bg-img/10.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-insight-cat" style="margin-bottom:16px;">Développement</span>
            {{ $article->titre }}
            <div class="ve-post-meta-hero">
                <span><i class="fa fa-calendar"></i> 2 septembre 2025</span>
                <span><i class="fa fa-user"></i> Horinfo</span>
                <span><i class="fa fa-clock-o"></i> 5 min de lecture</span>
            </div>
        </div>
    </section>

<section class="ve-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <article class="ve-article">
                    <div class="ve-article-featured bg-img" style="background-image:url({{ $article->image ? asset('storage/' . $article->image) : asset('img/bg-img/10.jpg') }});"></div>
                    <div class="ve-article-body">
                        <p class="text-muted">
                            <i class="fa fa-calendar"></i> {{ $article->publie_le->translatedFormat('j F Y') }}
                            &nbsp;·&nbsp;
                            <a href="{{ route('post.index', ['categorie' => $article->categorie]) }}">{{ $article->categorie }}</a>
                        </p>

                        <p class="ve-article-lead">{{ $article->extrait }}</p>

                        {!! $article->contenu !!}

                        <div class="ve-article-share">
                            <strong>Partager :</strong>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Partager sur Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Partager sur LinkedIn"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </article>

                {{-- COMMENTAIRES --}}
<div class="ve-comments-section" id="commentaires">
    <h4>
        {{ $article->commentairesApprouves->count() }}
        {{ Str::plural('commentaire', $article->commentairesApprouves->count()) }}
    </h4>

    @forelse($article->commentairesApprouves as $commentaire)
        <div class="ve-comment">
            <div class="ve-comment-avatar ve-comment-avatar-initial">
                {{ mb_strtoupper(mb_substr($commentaire->nom, 0, 1)) }}
            </div>
            <div class="ve-comment-body">
                <div class="ve-comment-meta">
                    <strong>{{ $commentaire->nom }}</strong>
                    <span>{{ $commentaire->created_at->translatedFormat('j F Y') }}</span>
                </div>
                <p>{!! nl2br(e($commentaire->message)) !!}</p>
            </div>
        </div>
    @empty
        <p class="text-muted">Soyez le premier à commenter cet article.</p>
    @endforelse
</div>

<div class="ve-comment-form-wrap">
    <h4>Laisser un commentaire</h4>

    <form class="ve-contact-form" action="{{ route('post.comment', $article->id) }}" method="POST">
        @csrf

        {{-- Champ piège anti-spam : invisible pour un humain --}}
        <div style="position:absolute; left:-9999px;" aria-hidden="true">
            <input type="text" name="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="ve-form-row">
            <div class="ve-form-group">
                <label for="c-nom">Nom</label>
                <input type="text" id="c-nom" name="nom" value="{{ old('nom') }}" placeholder="Votre nom" required>
                @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="ve-form-group">
                <label for="c-email">Email</label>
                <input type="email" id="c-email" name="email" value="{{ old('email') }}" placeholder="Votre email (non publié)" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="ve-form-group">
            <label for="c-message">Commentaire</label>
            <textarea id="c-message" name="message" rows="5" placeholder="Partagez votre avis..." required>{{ old('message') }}</textarea>
            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="ve-btn-primary">
            Publier le commentaire <i class="fa fa-paper-plane"></i>
        </button>
    </form>
</div>
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