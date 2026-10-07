@extends('layouts.back')

@section('titre', 'Abonnés aux actualités')

@section('contenu')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Abonnés aux actualités</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Abonnés aux actualités
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="app-content">
    <div class="container-fluid">

        <div class="row">

            {{-- MENU GAUCHE --}}
            <div class="col-md-3">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Actualités</h3>
                    </div>

                    <div class="card-body p-0">

                        <div class="list-group list-group-flush">

                            <a href="{{ route('abonnements_actualites.liste') }}"
                               class="list-group-item list-group-item-action active">

                                <i class="bi bi-people me-2"></i>

                                Abonnés

                                <span class="badge text-bg-primary float-end">
                                    {{ $abonnements->total() }}
                                </span>

                            </a>


                            <a href="{{ route('admin.envois-actualites.index') }}"
                               class="list-group-item list-group-item-action">

                                <i class="bi bi-send me-2"></i>

                                Actualités envoyées

                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- LISTE DES ABONNÉS --}}
            <div class="col-md-9">

                <div class="card">

                    {{-- HEADER --}}
                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <h3 class="card-title">
                                Abonnés aux actualités
                            </h3>

                            <span class="badge text-bg-primary">
                                {{ $abonnements->total() }} abonné(s)
                            </span>

                        </div>

                    </div>


                    {{-- BARRE D'OUTILS --}}
                    <div class="card-body border-bottom">

                        <div class="row align-items-center">

                            <div class="col-md-6">

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </span>

                                    <input type="text"
                                           class="form-control"
                                           placeholder="Rechercher un abonné...">

                                </div>

                            </div>


                            <div class="col-md-6 text-md-end mt-2 mt-md-0">

                                <button type="button"
                                        class="btn btn-outline-secondary">

                                    <i class="bi bi-arrow-clockwise"></i>

                                    Actualiser

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- LISTE --}}
                    <ul class="list-group list-group-flush">

                        @forelse ($abonnements as $abonnement)

                            <li class="list-group-item d-flex align-items-center gap-2">

                                {{-- CHECKBOX --}}
                                <div class="form-check mb-0">

                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="abonnement-{{ $abonnement->id }}">

                                    <label class="form-check-label visually-hidden"
                                           for="abonnement-{{ $abonnement->id }}">

                                        Sélectionner {{ $abonnement->email }}

                                    </label>

                                </div>


                                {{-- INFORMATIONS --}}
                                <div class="flex-grow-1 d-flex flex-column flex-md-row gap-md-3 align-items-md-center">

                                    <span class="text-truncate"
                                          style="min-width: 15rem">

                                        {{ $abonnement->email }}

                                    </span>


                                    <span class="flex-grow-1 text-secondary">

                                        Abonné aux actualités de HORINFO

                                    </span>


                                    <span class="text-secondary small">

                                        {{ $abonnement->created_at->format('d/m/Y H:i') }}

                                    </span>

                                </div>

                            </li>

                        @empty

                            <li class="list-group-item text-center text-secondary py-4">

                                <i class="bi bi-envelope-open fs-3 d-block mb-2"></i>

                                Aucun abonné aux actualités pour le moment.

                            </li>

                        @endforelse

                    </ul>


                    {{-- PAGINATION --}}
                    @if ($abonnements->hasPages())

                        <div class="card-footer d-flex justify-content-center">

                            {{ $abonnements->links() }}

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>
</div>

@endsection