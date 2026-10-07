@extends('layouts.back')

@section('titre', 'Blog')

@section('contenu')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h3 class="card-title">Articles</h3>
      <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm ms-auto">
        <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>Ajouter un article
      </a>
    </div>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th style="width: 100px">Image</th>
              <th>Titre</th>
              <th style="width: 160px">Catégorie</th>
              <th style="width: 140px">Statut</th>
              <th style="width: 210px" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($articles as $article)
              <tr>
                <td>
                  @if ($article->image)
                    <img
                      src="{{ asset('storage/' . $article->image) }}"
                      alt="Image {{ $article->titre }}"
                      style="height: 50px; width: 70px; object-fit: cover; border-radius: 6px"
                    />
                  @else
                    <span class="text-secondary small">Aucune</span>
                  @endif
                </td>
                <td>
                  <span class="fw-semibold">{{ $article->titre }}</span>
                  <div class="text-secondary small">{{ Str::limit($article->extrait, 80) }}</div>
                </td>
                <td>{{ $article->categorie }}</td>
                <td>
                  @if ($article->publie_le)
                    <span class="badge text-bg-success">Publié</span>
                    <div class="text-secondary small">{{ $article->publie_le->format('d/m/Y') }}</div>
                  @else
                    <span class="badge text-bg-secondary">Brouillon</span>
                  @endif
                </td>
                <td class="text-end">
                  <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil me-1" aria-hidden="true"></i>Modifier
                  </a>
                  <button
                    type="button"
                    class="btn btn-sm btn-outline-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-supprimer"
                    data-action="{{ route('articles.destroy', $article) }}"
                    data-titre="{{ $article->titre }}"
                  >
                    <i class="bi bi-trash me-1" aria-hidden="true"></i>Supprimer
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center text-secondary py-4">
                  Aucun article pour le moment.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    @if ($articles->hasPages())
      <div class="card-footer d-flex justify-content-center">
        {{ $articles->links() }}
      </div>
    @endif
  </div>
@endsection

@push('modals')
  <div class="modal fade" id="modal-supprimer" tabindex="-1" aria-labelledby="modal-supprimer-titre" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-supprimer-titre">Supprimer cet article ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          L'article <strong data-nom></strong> sera supprimé définitivement.
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