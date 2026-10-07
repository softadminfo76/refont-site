@extends('layouts.back')

@section('titre', 'Réalisations')

@section('contenu')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h3 class="card-title">Liste des réalisations</h3>
      <a href="{{ route('realisations.create') }}" class="btn btn-primary btn-sm ms-auto">
        <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>Ajouter une réalisation
      </a>
    </div>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th style="width: 100px">Logo</th>
              <th>Titre</th>
              <th style="width: 80px">Ordre</th>
              <th style="width: 110px">Statut</th>
              <th style="width: 210px" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($realisations as $realisation)
              <tr>
                <td>
                  @if ($realisation->logo)
                    <img
                      src="{{ asset('storage/' . $realisation->logo) }}"
                      alt="Logo {{ $realisation->titre }}"
                      style="height: 40px; max-width: 80px; object-fit: contain"
                    />
                  @else
                    <span class="text-secondary small">Aucun</span>
                  @endif
                </td>
                <td>
                  <span class="fw-semibold">{{ $realisation->titre }}</span>
                  <div class="text-secondary small">{{ Str::limit($realisation->description, 80) }}</div>
                </td>
                <td>{{ $realisation->ordre }}</td>
                <td>
                  @if ($realisation->actif)
                    <span class="badge text-bg-success">Visible</span>
                  @else
                    <span class="badge text-bg-secondary">Masquée</span>
                  @endif
                </td>
                <td class="text-end">
                  <a href="{{ route('realisations.edit', $realisation) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil me-1" aria-hidden="true"></i>Modifier
                  </a>
                  <button
                    type="button"
                    class="btn btn-sm btn-outline-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-supprimer"
                    data-action="{{ route('realisations.destroy', $realisation) }}"
                    data-titre="{{ $realisation->titre }}"
                  >
                    <i class="bi bi-trash me-1" aria-hidden="true"></i>Supprimer
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center text-secondary py-4">
                  Aucune réalisation pour le moment.
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
  <div class="modal fade" id="modal-supprimer" tabindex="-1" aria-labelledby="modal-supprimer-titre" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-supprimer-titre">Supprimer cette réalisation ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          La réalisation <strong data-nom></strong> et son logo seront supprimés définitivement.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <form method="POST" action="#">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
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
      modalSupprimer.querySelector('[data-nom]').textContent = bouton.dataset.titre;
    });
  </script>
@endpush