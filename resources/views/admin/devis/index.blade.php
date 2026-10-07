@extends('layouts.back')

@section('titre', 'Demandes de devis')

@section('contenu')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Demandes de devis</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Accueil</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Demandes de devis
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="row">

            {{-- DOSSIERS --}}
            <div class="col-md-3 mb-3">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Dossiers</h3>
                    </div>

                    <div class="card-body p-0">

                        <ul class="nav nav-pills flex-column mb-0">

                            <li class="nav-item">
                                <a href="{{ route('admin.devis.index') }}"
                                   class="nav-link active rounded-0 d-flex justify-content-between">

                                    <span>
                                        <i class="bi bi-inbox me-2"></i>
                                        Devis reçus
                                    </span>

                                    <span class="badge text-bg-primary">
                                        {{ $nonLus }}
                                    </span>

                                </a>
                            </li>

                            <li class="nav-item">
                        <a href="{{ route('admin.devis.sent') }}"
                        class="nav-link rounded-0 d-flex justify-content-between">

                            <span>
                                <i class="bi bi-send me-2"></i>
                                Devis envoyés
                            </span>

                            <span class="badge text-bg-secondary">
                                {{ $devisEnvoyes }}
                            </span>

                        </a>
                    </li>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- LISTE DES DEVIS --}}
            <div class="col-md-9">

                <div class="card">

                    {{-- BARRE DU HAUT --}}
                    <div class="d-flex align-items-center px-3 py-2 border-bottom">

                        <div class="form-check mb-0">
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="select-all">

                            <label class="form-check-label visually-hidden"
                                   for="select-all">
                                Tout sélectionner
                            </label>
                        </div>

                        <div class="btn-group btn-group-sm ms-3">

                            <button type="button"
                                    class="btn btn-light">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>

                        </div>

                        <span class="ms-auto text-secondary small">

                            @if ($devis->total())

                                {{ $devis->firstItem() }}–{{ $devis->lastItem() }}
                                sur {{ $devis->total() }}

                            @else

                                0 demande

                            @endif

                        </span>

                    </div>


                    {{-- LISTE --}}
                    <ul class="list-group list-group-flush">

                        @forelse ($devis as $demande)

                            <li class="list-group-item d-flex align-items-center gap-2
                                {{ $demande->est_lu ? '' : 'fw-semibold bg-body-secondary' }}">

                                <div class="form-check mb-0">

                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="devis-{{ $demande->id }}">

                                    <label class="form-check-label visually-hidden"
                                           for="devis-{{ $demande->id }}">
                                        Sélectionner la demande de {{ $demande->nom }}
                                    </label>

                                </div>


                                <a href="{{ route('admin.devis.show', $demande->id) }}"
                                   class="flex-grow-1 d-flex flex-column flex-md-row gap-md-3 text-decoration-none text-body"
                                   style="min-width: 0;">

                                    {{-- NOM --}}
                                    <span class="text-truncate"
                                          style="min-width: 9rem;">

                                        {{ $demande->nom }}

                                    </span>


                                    {{-- OBJET + DESCRIPTION --}}
                                    <span class="flex-grow-1 text-truncate"
                                          style="min-width: 0;">

                                        @unless ($demande->est_lu)

                                            <span class="badge text-bg-primary me-2">
                                                Nouveau
                                            </span>

                                        @endunless

                                        <span class="fw-normal text-secondary">

                                            {{ Str::limit(
                                                $demande->objet . ' — ' . $demande->description,
                                                90
                                            ) }}

                                        </span>

                                    </span>


                                    {{-- DATE --}}
                                    <span class="text-secondary small text-md-end"
                                          style="min-width: 7rem;">

                                        {{ $demande->created_at->format('d/m/Y H:i') }}

                                    </span>

                                </a>

                            </li>

                        @empty

                            <li class="list-group-item text-center text-secondary py-5">

                                <i class="bi bi-file-earmark-text fs-1 d-block mb-3"></i>

                                <p class="mb-0">
                                    Aucune demande de devis pour le moment.
                                </p>

                            </li>

                        @endforelse

                    </ul>


                    {{-- PAGINATION --}}
                    @if ($devis->hasPages())

                        <div class="card-footer">

                            {{ $devis->links() }}

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>
</div>

@endsection