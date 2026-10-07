@extends('layouts.back')

@section('titre', 'Détail de la demande de devis')

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

                <h1 class="mb-0 fs-3">
                    Demande de devis
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


            {{-- INFORMATIONS DE LA DEMANDE --}}
            <div class="col-lg-8">

                <div class="card mb-4">

                    <div class="card-header">

                        <h3 class="card-title">
                            {{ $devis->objet }}
                        </h3>

                    </div>


                    <div class="card-body">

                        {{-- DESCRIPTION --}}
                        <div class="mb-4">

                            <h6 class="text-secondary">
                                Description du projet
                            </h6>

                            <p class="mb-0">
                                {{ $devis->description }}
                            </p>

                        </div>


                        <hr>


                        {{-- INFORMATIONS CLIENT --}}
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


                            <div class="col-md-6 mb-3">

                                <strong>Délai souhaité</strong>

                                <div>
                                    {{ $devis->delai ?: 'Non renseigné' }}
                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <strong>Ville / Pays</strong>

                                <div>
                                    {{ $devis->ville ?: 'Non renseigné' }}
                                </div>

                            </div>

                        </div>


                        {{-- PIÈCE JOINTE DU CLIENT --}}
                        @if($devis->fichier)

                            <hr>

                            <div>

                                <strong>
                                    Pièce jointe du client
                                </strong>

                                <div class="mt-2">

                                    <a href="{{ asset('storage/' . $devis->fichier) }}"
                                       target="_blank"
                                       class="btn btn-outline-primary">

                                        <i class="bi bi-paperclip"></i>

                                        Voir la pièce jointe

                                    </a>

                                </div>

                            </div>

                        @endif

                    </div>


                    <div class="card-footer text-secondary">

                        Demande reçue le

                        {{ $devis->created_at->format('d/m/Y à H:i') }}

                    </div>

                </div>

            </div>



            {{-- FORMULAIRE DE RÉPONSE --}}
            <div class="col-lg-4">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            Répondre à la demande
                        </h3>

                    </div>


                    <div class="card-body">

                        <form action="{{ route('reponses-devis.store') }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf


                            <input type="hidden"
                                   name="devis_id"
                                   value="{{ $devis->id }}">


                            {{-- MESSAGE --}}
                            <div class="mb-3">

                                <label for="message"
                                       class="form-label">

                                    Votre réponse

                                </label>


                                <textarea
                                    name="message"
                                    id="message"
                                    rows="8"
                                    class="form-control"
                                    placeholder="Écrivez votre réponse..."
                                    required></textarea>

                            </div>


                            {{-- PIÈCE JOINTE --}}
                            <div class="mb-3">

                                <label for="fichier"
                                       class="form-label">

                                    Pièce jointe

                                </label>


                                <input type="file"
                                       name="fichier"
                                       id="fichier"
                                       class="form-control"
                                       accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">


                                <div class="form-text">

                                    PDF, Word ou image — 2 Mo maximum.

                                </div>

                            </div>


                            {{-- BOUTON --}}
                            <button type="submit"
                                    class="btn btn-primary w-100">

                                <i class="bi bi-send"></i>

                                Envoyer la réponse

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection