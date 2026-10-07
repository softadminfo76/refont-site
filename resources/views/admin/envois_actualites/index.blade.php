@extends('layouts.back')

@section('titre', 'Actualités envoyées')

@section('contenu')

  @if (session('succes'))
    <div class="alert alert-success">
      {{ session('succes') }}
    </div>
  @endif

  <div class="card">

    <div class="card-header d-flex align-items-center">
      <h3 class="card-title">Actualités envoyées</h3>

      <a href="{{ route('abonnements_actualites.ecrire') }}"
        class="btn btn-primary btn-sm ms-auto">
            <i class="bi bi-plus-lg me-1"></i>
            Écrire une actualité
        </a>
    </div>

    <div class="card-body p-0">

      <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

          <thead>
            <tr>
              <th>Destinataire</th>
              <th>Objet</th>
              <th>Message</th>
              <th style="width: 160px">Date</th>
              <th style="width: 100px" class="text-end">Action</th>
            </tr>
          </thead>

          <tbody>

            @forelse ($envois as $envoi)

              <tr>

                <td>
                  <span class="fw-semibold">
                    {{ $envoi->abonnementActualites->email }}
                  </span>
                </td>

                <td>
                  {{ $envoi->objet }}
                </td>

                <td style="max-width: 300px;">
                    <span class="text-secondary d-block text-truncate">
                        {{ $envoi->message }}
                    </span>
                </td>

                <td>
                    <span class="text-secondary">
                        {{ $envoi->created_at->format('d/m/Y H:i') }}
                    </span>
                </td>

                <td class="text-end">

                  <a href="{{ route('admin.envois-actualites.show', $envoi) }}"
                     class="btn btn-sm btn-outline-primary">

                    <i class="bi bi-eye me-1" aria-hidden="true"></i>
                    Voir

                  </a>

                </td>

              </tr>

            @empty

              <tr>
                <td colspan="5" class="text-center text-secondary py-4">

                  <i class="bi bi-send fs-4 d-block mb-2"></i>

                  Aucune actualité envoyée pour le moment.

                </td>
              </tr>

            @endforelse

          </tbody>

        </table>

      </div>

    </div>

    <div class="card-footer text-secondary">

      {{ $envois->count() }}
      actualité(s) enregistrée(s)

    </div>

  </div>

@endsection