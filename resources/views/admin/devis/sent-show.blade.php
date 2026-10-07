@extends('layouts.back')

@section('titre', 'Devis envoyé')

@section('contenu')

<div class="app-content-header">

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">
                    Devis envoyé
                </h1>
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

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.devis.sent') }}">
                            Devis envoyés
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Détail
                    </li>

                </ol>

            </div>

        </div>

    </div>

</div>


<div class="app-content">

    <div class="container-fluid">

        <div class="row">


            {{-- INFORMATIONS DU CLIENT --}}
            <div class="col-lg-8">

                <div class="card mb-4">

                    <div class="card-header">

                        <h3 class="card-title">
                            {{ $devis->objet }}
                        </h3>

                    </div>


                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <strong>Nom complet</strong>

                                <div>
                                    {{ $devis->nom }}
                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <strong>Email</strong>

                                <div>
                                    {{ $devis->email }}
                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <strong>Téléphone</strong>

                                <div>
                                    {{ $devis->telephone }}
                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <strong>Entreprise / Organisation</strong>

                                <div>
                                    {{ $devis->entreprise ?: 'Non renseignée' }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- RÉPONSES ENVOYÉES --}}
                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="bi bi-reply me-2"></i>

                            Réponses envoyées

                        </h3>

                    </div>


                    <div class="card-body">

                        @forelse($devis->reponses as $reponse)

                            <div class="border rounded p-3 mb-3">

                                <div class="mb-3">

                                    {{ $reponse->message }}

                                </div>


                                @if($reponse->fichier)

                                    <button type="button"
                                            class="btn btn-outline-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#pieceJointeModal">

                                        <i class="bi bi-paperclip me-1"></i>

                                        Voir la pièce jointe

                                    </button>

                                @endif


                                <div class="text-secondary small mt-3">

                                    Envoyée le

                                    {{ $reponse->created_at->format('d/m/Y à H:i') }}

                                </div>

                            </div>

                        @empty

                            <p class="text-secondary mb-0">
                                Aucune réponse envoyée.
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- MODAL PIÈCE JOINTE --}}
<div class="modal fade"
     id="pieceJointeModal"
     tabindex="-1"
     aria-labelledby="pieceJointeModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title"
                    id="pieceJointeModalLabel">

                    <i class="bi bi-paperclip me-2"></i>

                    Pièce jointe

                </h5>


                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Fermer">
                </button>

            </div>


            <div class="modal-body text-center">

                @if($devis->reponses->last() &&
                    $devis->reponses->last()->fichier)

                    @php

                        $fichier = $devis->reponses->last()->fichier;

                        $extension = strtolower(
                            pathinfo($fichier, PATHINFO_EXTENSION)
                        );

                    @endphp


                    {{-- IMAGE --}}
                    @if(in_array($extension, ['jpg', 'jpeg', 'png']))

                        <img src="{{ asset('storage/' . $fichier) }}"
                             class="img-fluid"
                             alt="Pièce jointe">


                    {{-- PDF --}}
                    @elseif($extension === 'pdf')

                        <iframe src="{{ asset('storage/' . $fichier) }}"
                                width="100%"
                                height="600"
                                style="border: none;">
                        </iframe>


                    {{-- AUTRES FICHIERS --}}
                    @else

                        <div class="py-5">

                            <i class="bi bi-file-earmark-text fs-1"></i>

                            <p class="mt-3">
                                Ce type de fichier ne peut pas être affiché directement.
                            </p>

                            <a href="{{ asset('storage/' . $fichier) }}"
                               download
                               class="btn btn-primary">

                                <i class="bi bi-download me-1"></i>

                                Télécharger le fichier

                            </a>

                        </div>

                    @endif

                @endif

            </div>

        </div>

    </div>

</div>

@endsection