@extends('layouts.back')

@section('titre', 'Projets')

@section('contenu')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card card-primary card-outline mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="card-title">Projets</div>
      <a href="{{ route('admin.projets.create') }}" class="btn btn-primary btn-sm">Ajouter un projet</a>
    </div>

    <div class="card-body">
      @if ($projets->isEmpty())
        <p class="text-muted mb-0">Aucun projet pour le moment.</p>
      @else
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr><th>Projet</th><th>Client</th><th>Secteur</th><th class="text-end">Actions</th></tr>
            </thead>
            <tbody>
              @foreach ($projets as $p)
                <tr>
                  <td>{{ $p->titre_court }}</td>
                  <td>{{ $p->client }}</td>
                  <td><span class="badge text-bg-info">{{ $p->secteur }}</span></td>
                  <td class="text-end text-nowrap">
                    <a href="{{ route('admin.projets.edit', $p) }}" class="btn btn-sm btn-outline-primary">Modifier</a>
                    <form action="{{ route('admin.projets.destroy', $p) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Supprimer ce projet ?');">
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
        {{ $projets->links() }}
      @endif
    </div>
  </div>
@endsection