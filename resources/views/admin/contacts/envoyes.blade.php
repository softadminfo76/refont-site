@extends('layouts.back')

@section('titre', 'Messages envoyés')

@section('contenu')

<div class="app-content-header">
    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Messages envoyés</h1>
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
                            <a href="{{ route('contacts.liste') }}">
                                Messages
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Messages envoyés
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

                            {{-- MESSAGES REÇUS --}}
                            <li class="nav-item">

                                <a href="{{ route('contacts.liste') }}"
                                   class="nav-link rounded-0">

                                    <i class="bi bi-inbox me-2"
                                       aria-hidden="true"></i>

                                    Messages reçus

                                </a>

                            </li>


                            {{-- MESSAGES ENVOYÉS --}}
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


            {{-- LISTE DES MESSAGES ENVOYÉS --}}
            <div class="col-lg-9">

                <div class="card">

                    {{-- EN-TÊTE --}}
                    <div class="card-header">

                        <h3 class="card-title">
                            Messages envoyés
                        </h3>

                    </div>


                    <div class="card-body p-0">

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

                                <button class="btn btn-outline-secondary"
                                        type="button"
                                        title="Actualiser">

                                    <i class="bi bi-arrow-clockwise"
                                       aria-hidden="true"></i>

                                </button>

                            </div>


                            <span class="ms-auto text-secondary small">

                                @if ($contacts->total())

                                    {{ $contacts->firstItem() }}–{{ $contacts->lastItem() }}
                                    sur {{ $contacts->total() }}

                                @else

                                    0 message

                                @endif

                            </span>

                        </div>


                        {{-- LISTE --}}
                        <ul class="list-group list-group-flush mb-0">

                            @forelse ($contacts as $contact)

                                <li class="list-group-item d-flex align-items-center gap-2">

                                    {{-- CHECKBOX --}}
                                    <div class="form-check mb-0">

                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="contact-{{ $contact->id }}">

                                        <label class="form-check-label visually-hidden"
                                               for="contact-{{ $contact->id }}">

                                            Sélectionner le message envoyé à
                                            {{ $contact->nom }}

                                        </label>

                                    </div>


                                    {{-- MESSAGE --}}
                                    <a href="{{ route('contacts.envoyes.show', $contact) }}"
                                       class="flex-grow-1 d-flex flex-column flex-md-row gap-md-3 text-decoration-none text-body"
                                       style="min-width: 0;">


                                        {{-- DESTINATAIRE --}}
                                        <span class="text-truncate"
                                              style="min-width: 9rem;">

                                            {{ $contact->nom }}

                                        </span>


                                        {{-- RÉPONSE --}}
                                        <span class="flex-grow-1 text-truncate"
                                              style="min-width: 0;">

                                            @foreach ($contact->reponses as $reponse)

                                                <span class="fw-normal text-secondary">

                                                    {{ Str::limit($reponse->reponse, 90) }}

                                                </span>

                                            @endforeach

                                        </span>


                                        {{-- DATE --}}
                                        <span class="text-secondary small text-md-end"
                                              style="min-width: 7rem;">

                                            {{ $contact->created_at->format('d/m/Y H:i') }}

                                        </span>

                                    </a>

                                </li>

                            @empty

                                <li class="list-group-item text-center text-secondary py-5">

                                    <i class="bi bi-send fs-1 d-block mb-3"></i>

                                    <p class="mb-0">
                                        Aucun message envoyé pour le moment.
                                    </p>

                                </li>

                            @endforelse

                        </ul>


                        {{-- PAGINATION --}}
                        @if ($contacts->hasPages())

                            <div class="p-3 d-flex justify-content-center">

                                {{ $contacts->links() }}

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection