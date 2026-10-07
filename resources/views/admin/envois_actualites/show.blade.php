@extends('layouts.back')

@section('titre', 'Détail de l’actualité')

@section('contenu')

<div class="row">

    <div class="col-12">

        <div class="card">

            {{-- EN-TÊTE --}}
            <div class="card-header d-flex align-items-center">

                <h3 class="card-title">
                    Détail de l’actualité
                </h3>

                <a href="{{ route('admin.envois-actualites.index') }}"
                   class="btn btn-outline-secondary btn-sm ms-auto">

                    <i class="bi bi-arrow-left me-1"></i>
                    Retour

                </a>

            </div>


            {{-- CONTENU --}}
            <div class="card-body">

                {{-- DESTINATAIRE --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        <i class="bi bi-envelope me-1"></i>
                        Destinataire
                    </label>

                    <div class="border rounded p-3">
                        {{ $envoiActualite->abonnementActualites->email }}
                    </div>

                </div>


                {{-- OBJET --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        <i class="bi bi-tag me-1"></i>
                        Objet
                    </label>

                    <div class="border rounded p-3 fw-semibold">
                        {{ $envoiActualite->objet }}
                    </div>

                </div>


                {{-- MESSAGE --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        <i class="bi bi-chat-left-text me-1"></i>
                        Message
                    </label>

                    <div class="border rounded p-3"
                         style="
                            min-height: 250px;
                            white-space: pre-line;
                            line-height: 1.7;
                         ">

                        {{ $envoiActualite->message }}

                    </div>

                </div>


                {{-- DATE --}}
                <div class="text-secondary small">

                    <i class="bi bi-calendar3 me-1"></i>

                    Enregistrée le
                    {{ $envoiActualite->created_at->format('d/m/Y à H:i') }}

                </div>

            </div>

        </div>

    </div>

</div>

@endsection