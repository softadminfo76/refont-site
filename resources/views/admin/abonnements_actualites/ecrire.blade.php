<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>HORINFO | Écrire une actualité</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/css/adminlte.css') }}">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    {{-- HEADER --}}
    <nav class="app-header navbar navbar-expand bg-body">

        <div class="container-fluid">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link"
                       data-lte-toggle="sidebar"
                       href="#"
                       role="button">

                        <i class="bi bi-list"></i>

                    </a>
                </li>

                <li class="nav-item d-none d-md-block">

                    <a href="{{ route('dashboard') }}" class="nav-link">

                        <i class="bi bi-grid-1x2 me-1"></i>

                        Tableau de bord

                    </a>

                </li>

            </ul>


            <ul class="navbar-nav ms-auto">

                {{-- Notifications --}}
                <li class="nav-item">

                    <a class="nav-link" href="#">

                        <i class="bi bi-bell-fill"></i>

                    </a>

                </li>


                {{-- Mode sombre --}}
                <li class="nav-item dropdown">

                    <a class="nav-link"
                       href="#"
                       data-bs-toggle="dropdown">

                        <i class="bi bi-sun-fill"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <button type="button"
                                    class="dropdown-item"
                                    data-bs-theme-value="light">

                                <i class="bi bi-sun-fill me-2"></i>
                                Clair

                            </button>
                        </li>

                        <li>
                            <button type="button"
                                    class="dropdown-item"
                                    data-bs-theme-value="dark">

                                <i class="bi bi-moon-fill me-2"></i>
                                Sombre

                            </button>
                        </li>

                        <li>
                            <button type="button"
                                    class="dropdown-item"
                                    data-bs-theme-value="auto">

                                <i class="bi bi-circle-half me-2"></i>
                                Automatique

                            </button>
                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </nav>


    {{-- SIDEBAR --}}
    <aside class="app-sidebar bg-body-secondary shadow"
           data-bs-theme="dark">

        <div class="sidebar-brand">

            <a href="{{ route('dashboard') }}" class="brand-link">

                <span class="brand-text fw-light">
                    HORINFO
                </span>

            </a>

        </div>


        <div class="sidebar-search">

            <input type="search"
                   class="form-control form-control-sm"
                   placeholder="Rechercher...">

        </div>


        <div class="sidebar-wrapper">

            <nav class="mt-2">

                @include('partials.admin-sidebar')

            </nav>

        </div>

    </aside>


    {{-- CONTENU --}}
    <main class="app-main">

        {{-- EN-TÊTE --}}
        <div class="app-content-header">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-sm-6">

                        <h1 class="mb-0 fs-3">
                            Écrire une actualité
                        </h1>

                    </div>


                    <div class="col-sm-6">

                        <nav aria-label="breadcrumb">

                            <ol class="breadcrumb float-sm-end">

                                <li class="breadcrumb-item">

                                    <a href="{{ route('dashboard') }}">
                                        Accueil
                                    </a>

                                </li>

                                <li class="breadcrumb-item">

                                    <a href="{{ route('abonnements_actualites.liste') }}">
                                        Abonnés
                                    </a>

                                </li>

                                <li class="breadcrumb-item active"
                                    aria-current="page">

                                    Écrire

                                </li>

                            </ol>

                        </nav>

                    </div>

                </div>

            </div>

        </div>


        {{-- FORMULAIRE --}}
        <div class="app-content">

            <div class="container-fluid">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            Écrire une actualité à
                            <strong>Tous les abonnés ({{ $nombreAbonnes }})</strong>

                        </h3>

                    </div>


                    <form action="{{ route('abonnements_actualites.envoyer') }}" method="POST">

                        @csrf

                        <div class="card-body">

                            <div class="row g-3">


                                {{-- DESTINATAIRE --}}
                                <div class="col-12">

                                    <label class="form-label"
                                           for="mail-to">

                                        À

                                    </label>

                                    <input type="text"
                                    class="form-control"
                                    value="Tous les abonnés ({{ $nombreAbonnes }})"
                                    readonly>

                                </div>


                                {{-- OBJET --}}
                                <div class="col-12">

                                    <label class="form-label"
                                           for="mail-subject">

                                        Objet

                                    </label>

                                    <input type="text"
                                           class="form-control @error('objet') is-invalid @enderror"
                                           id="mail-subject"
                                           name="objet"
                                           value="{{ old('objet') }}"
                                           placeholder="Objet de l'actualité"
                                           required>

                                    @error('objet')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                {{-- MESSAGE --}}
                                <div class="col-12">

                                    <label class="form-label"
                                           for="mail-body">

                                        Message

                                    </label>

                                    <textarea
                                        id="mail-body"
                                        name="message"
                                        class="form-control @error('message') is-invalid @enderror"
                                        rows="12"
                                        placeholder="Écrivez votre actualité..."
                                        style="min-height: 16rem"
                                        required>{{ old('message') }}</textarea>

                                    @error('message')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- BOUTONS --}}
                        <div class="card-footer d-flex gap-2">

                            <button class="btn btn-primary"
                                    type="submit">

                                <i class="bi bi-send me-1"></i>

                                Envoyer à tous

                            </button>


                            <a href="{{ route('abonnements_actualites.liste') }}"
                               class="btn btn-outline-danger ms-auto">

                                <i class="bi bi-x-lg me-1"></i>

                                Annuler

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </main>


    {{-- FOOTER --}}
    <footer class="app-footer">

        <div class="float-end d-none d-sm-inline">
            HORINFO
        </div>

        <strong>
            Copyright © 2026 HORINFO.
        </strong>

        Tous droits réservés.

    </footer>

</div>


{{-- SCRIPTS --}}

<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js">
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js">
</script>

<script src="{{ asset('vendor/adminlte/js/adminlte.js') }}">
</script>

</body>

</html>