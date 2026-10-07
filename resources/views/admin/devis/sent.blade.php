@extends('layouts.back')

@section('titre', 'Devis envoyés')

@section('contenu')

<div class="app-content-header">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Devis envoyés</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">

                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            Accueil
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.devis.index') }}">
                            Demandes de devis
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Devis envoyés
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
                        <h3 class="card-title">
                            Dossiers
                        </h3>
                    </div>

                    <div class="card-body p-0">

                        <ul class="nav nav-pills flex-column mb-0">

                            {{-- Devis reçus --}}
                            <li class="nav-item">

                                <a href="{{ route('admin.devis.index') }}"
                                   class="nav-link rounded-0 d-flex justify-content-between">

                                    <span>
                                        <i class="bi bi-inbox me-2"></i>
                                        Devis reçus
                                    </span>

                                </a>

                            </li>


                            {{-- Devis envoyés --}}
                            <li class="nav-item">

                                <a href="{{ route('admin.devis.sent') }}"
                                   class="nav-link active rounded-0 d-flex justify-content-between">

                                    <span>
                                        <i class="bi bi-send me-2"></i>
                                        Devis envoyés
                                    </span>

                                    <span class="badge text-bg-secondary">
                                        {{ $devis->total() }}
                                    </span>

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- LISTE --}}
            <div class="col-md-9">

                <div class="card">

                    <div class="d-flex align-items-center px-3 py-2 border-bottom">

                        <span class="text-secondary small">

                            @if ($devis->total())

                                {{ $devis->firstItem() }}–{{ $devis->lastItem() }}
                                sur {{ $devis->total() }}

                            @else

                                0 devis

                            @endif

                        </span>

                    </div>


                    <ul class="list-group list-group-flush">

                        @forelse ($devis as $demande)

                            <li class="list-group-item">

                                <a href="{{ route('admin.devis.sent.show', $demande->id) }}"
                                   class="d-flex flex-column flex-md-row gap-md-3 text-decoration-none text-body"
                                   style="min-width: 0;">

                                    {{-- CLIENT --}}
                                    <span class="text-truncate"
                                          style="min-width: 9rem;">

                                        {{ $demande->nom }}

                                    </span>


                                    {{-- OBJET + RÉPONSE --}}
                                    <span class="flex-grow-1"
                                          style="min-width: 0;">

                                        <div class="text-truncate">

                                            <span class="text-secondary">
                                                {{ $demande->objet }}
                                            </span>

                                        </div>


                                        @foreach($demande->reponses as $reponse)

                                            <div class="small text-secondary text-truncate mt-1">

                                                <i class="bi bi-reply me-1"></i>

                                                {{ Str::limit($reponse->message, 80) }}

                                                @if($reponse->fichier)

                                                    <i class="bi bi-paperclip ms-2"></i>

                                                @endif

                                            </div>

                                        @endforeach

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

                                <i class="bi bi-send fs-1 d-block mb-3"></i>

                                <p class="mb-0">
                                    Aucun devis envoyé pour le moment.
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