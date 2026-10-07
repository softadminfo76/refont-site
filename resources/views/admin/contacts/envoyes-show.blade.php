@extends('layouts.back')

@section('titre', 'Message envoyé')

@section('contenu')

<div class="app-content-header">
    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Message envoyé</h1>
            </div>

            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">

                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                Accueil
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('contacts.envoyes') }}">
                                Messages envoyés
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Message
                        </li>

                    </ol>
                </nav>
            </div>

        </div>

    </div>
</div>


<div class="app-content">

    <div class="container-fluid">

        <div class="row g-3">

            {{-- DOSSIERS --}}
            <div class="col-lg-3">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            Dossiers
                        </h3>
                    </div>

                    <div class="card-body p-0">

                        <ul class="nav nav-pills flex-column mb-0">

                            <li class="nav-item">

                                <a href="{{ route('contacts.liste') }}"
                                   class="nav-link rounded-0">

                                    <i class="bi bi-inbox me-2"
                                       aria-hidden="true"></i>

                                    Messages reçus

                                </a>

                            </li>

                            <li class="nav-item">

                                <a href="{{ route('contacts.envoyes') }}"
                                   class="nav-link active rounded-0">

                                    <i class="bi bi-send me-2"
                                       aria-hidden="true"></i>

                                    Messages envoyés

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- MESSAGE --}}
            <div class="col-lg-9">

                <div class="card">

                    <div class="card-header">

                        <div class="d-flex align-items-center">

                            <a href="{{ route('contacts.envoyes') }}"
                               class="btn btn-sm btn-outline-secondary me-2">

                                <i class="bi bi-arrow-left"
                                   aria-hidden="true"></i>

                                Retour

                            </a>

                            <h3 class="card-title mb-0">
                                Message envoyé
                            </h3>

                        </div>

                    </div>


                    <div class="card-body">

                        {{-- DESTINATAIRE --}}
                        <div class="mb-4">

                            <div class="text-secondary small mb-1">
                                Destinataire
                            </div>

                            <div class="fw-semibold">
                                {{ $contact->nom }}
                            </div>

                            <div class="text-secondary">
                                {{ $contact->email }}
                            </div>

                        </div>


                        {{-- MESSAGE D'ORIGINE --}}
                        <div class="border rounded p-3 mb-4">

                            <div class="text-secondary small mb-2">
                                Message reçu
                            </div>

                            <div>
                                {{ $contact->message }}
                            </div>

                        </div>


                        {{-- RÉPONSES --}}
                        @foreach ($contact->reponses as $reponse)

                            <div class="border rounded p-3">

                                <div class="d-flex justify-content-between align-items-center mb-2">

                                    <strong>
                                        Votre réponse
                                    </strong>

                                    <span class="text-secondary small">
                                        {{ $reponse->created_at->format('d/m/Y H:i') }}
                                    </span>

                                </div>

                                <div>
                                    {{ $reponse->reponse }}
                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection