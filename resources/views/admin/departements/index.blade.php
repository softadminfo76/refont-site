@extends('layouts.back')

@section('titre', 'Départements')

@section('contenu')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card card-primary card-outline mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="card-title">Départements</div>
      <a href="{{ route('departements.create') }}" class="btn btn-primary btn-sm">
            Ajouter un département
        </a>
    </div>

    <div class="card-body">
      @if ($departements->isEmpty())
        <p class="text-muted mb-0">Aucun département pour le moment.</p>
      @else
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr><th>Ordre</th><th>Département</th><th>Services</th><th>Statut</th><th class="text-end">Actions</th></tr>
            </thead>
            <tbody>
              @foreach ($departements as $d)
                <tr>
                  <td>{{ $d->ordre }}</td>
                  <td>
                    <strong>{{ $d->nom }}</strong><br>
                    <small class="text-muted">/departements/{{ $d->slug }}</small>
                  </td>
                  <td>{{ $d->services_count }}</td>
                  <td>
                    @if ($d->actif)
                      <span class="badge text-bg-success">Visible</span>
                    @else
                      <span class="badge text-bg-secondary">Masqué</span>
                    @endif
                  </td>
                  <td class="text-end text-nowrap">
                    <a href="{{ route('departements.show', $d) }}" target="_blank" class="btn btn-sm btn-outline-secondary">Voir</a>
                    <a href="{{ route('departements.edit', $d) }}" class="btn btn-sm btn-outline-primary">Modifier</a>
                    <form action="{{ route('departements.destroy', $d) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Supprimer ce département ? Ses services ne seront pas supprimés.');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
@endsection