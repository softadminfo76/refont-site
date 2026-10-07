@extends('layouts.back')

@section('titre', 'Services')

@section('contenu')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h3 class="card-title">Liste des services</h3>

      <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm ms-auto">
        <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
        Ajouter un service
      </a>
    </div>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th style="width: 100px">Image</th>
              <th>Nom</th>
              <th>Description</th>
              <th style="width: 230px" class="text-end">Actions</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($services as $service)
              <tr>
                <td>
                  @if ($service->image)
                    <img
                      src="{{ asset('storage/' . $service->image) }}"
                      alt="Image {{ $service->nom }}"
                      style="height: 50px; width: 70px; object-fit: cover; border-radius: 6px;"
                    />
                  @else
                    <span class="text-secondary small">Aucune</span>
                  @endif
                </td>

                <td>
                  <span class="fw-semibold">{{ $service->nom }}</span>
                </td>

                <td>
                  <span class="text-secondary">
                    {{ Str::limit($service->description, 100) }}
                  </span>
                </td>

                <td class="text-end">
                  <a
                    href="{{ route('services.show', $service) }}"
                    class="btn btn-sm btn-outline-info"
                  >
                    <i class="bi bi-eye me-1" aria-hidden="true"></i>
                    Voir
                  </a>

                  <a
                    href="{{ route('services.edit', $service) }}"
                    class="btn btn-sm btn-outline-primary"
                  >
                    <i class="bi bi-pencil me-1" aria-hidden="true"></i>
                    Modifier
                  </a>

                  <button
                    type="button"
                    class="btn btn-sm btn-outline-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-supprimer"
                    data-action="{{ route('services.destroy', $service) }}"
                    data-nom="{{ $service->nom }}"
                  >
                    <i class="bi bi-trash me-1" aria-hidden="true"></i>
                    Supprimer
                  </button>
                </td>
              </tr>

            @empty
              <tr>
                <td colspan="4" class="text-center text-secondary py-4">
                  Aucun service pour le moment.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('modals')
  <div
    class="modal fade"
    id="modal-supprimer"
    tabindex="-1"
    aria-labelledby="modal-supprimer-titre"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modal-supprimer-titre">
            Supprimer ce service ?
          </h5>

          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Fermer"
          ></button>
        </div>

        <div class="modal-body">
          Le service <strong data-nom></strong> sera supprimé définitivement.
        </div>

        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-outline-secondary"
            data-bs-dismiss="modal"
          >
            Annuler
          </button>

          <form method="POST" action="#">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
              Supprimer
            </button>
          </form>
        </div>

      </div>
    </div>
  </div>
@endpush

@push('scripts')
  <script>
    const modalSupprimer = document.getElementById('modal-supprimer');

    modalSupprimer.addEventListener('show.bs.modal', (event) => {
      const bouton = event.relatedTarget;

      modalSupprimer.querySelector('form').action = bouton.dataset.action;
      modalSupprimer.querySelector('[data-nom]').textContent = bouton.dataset.nom;
    });
  </script>
@endpush