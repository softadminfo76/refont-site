
@extends('layouts.back')

@section('titre', 'Commentaires')

@section('contenu')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

<div class="card card-primary card-outline mb-4">
  <div class="card-header">
    <div class="card-title">Commentaires du blog</div>
  </div>

  <div class="card-body">

    {{-- Filtres --}}
    <ul class="nav nav-pills mb-3">
      <li class="nav-item">
        <a class="nav-link {{ $statut === 'attente' ? 'active' : '' }}"
           href="{{ route('commentaires.index', ['statut' => 'attente']) }}">
          En attente <span class="badge text-bg-warning">{{ $enAttente }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $statut === 'approuves' ? 'active' : '' }}"
           href="{{ route('commentaires.index', ['statut' => 'approuves']) }}">Approuvés</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $statut === 'tous' ? 'active' : '' }}"
           href="{{ route('commentaires.index', ['statut' => 'tous']) }}">Tous</a>
      </li>
    </ul>

    @if ($commentaires->isEmpty())
      <p class="text-muted mb-0">Aucun commentaire dans cette catégorie.</p>
    @else
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Auteur</th>
              <th>Message</th>
              <th>Article</th>
              <th>Date</th>
              <th>Statut</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($commentaires as $c)
              <tr>
                <td>
                  <strong>{{ $c->nom }}</strong><br>
                  <small class="text-muted">{{ $c->email }}</small>
                </td>
                <td style="max-width: 320px;">{{ Str::limit($c->message, 140) }}</td>
                <td>{{ $c->article->titre ?? 'Article supprimé' }}</td>
                <td>{{ $c->created_at->format('d/m/Y H:i') }}</td>
                <td>
                  @if ($c->approuve)
                    <span class="badge text-bg-success">Approuvé</span>
                  @else
                    <span class="badge text-bg-warning">En attente</span>
                  @endif
                </td>
                <td class="text-end text-nowrap">
                  <form action="{{ route('commentaires.approuver', $c) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm {{ $c->approuve ? 'btn-outline-secondary' : 'btn-success' }}">
                      {{ $c->approuve ? 'Retirer' : 'Approuver' }}
                    </button>
                  </form>

                  <form action="{{ route('commentaires.destroy', $c) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Supprimer définitivement ce commentaire ?');">
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

      {{ $commentaires->links() }}
    @endif

  </div>
</div>
@endsection