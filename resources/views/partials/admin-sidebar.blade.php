<ul
  class="nav sidebar-menu flex-column"
  data-lte-toggle="treeview"
  data-accordion="false"
  id="navigation"
>
  <li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <i class="nav-icon bi bi-speedometer"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('tables.data') }}" class="nav-link {{ request()->routeIs('tables.data') ? 'active' : '' }}">
      <i class="nav-icon bi bi-table"></i>
      <p>Contacts</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('contacts.liste') }}" class="nav-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
      <i class="nav-icon bi bi-envelope"></i>
      <p>Contacts-listes</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('realisations.index') }}" class="nav-link {{ request()->routeIs('realisations.index.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-images"></i>
        <p>Réalisations</p>
    </a>
  </li>
<li class="nav-item">
    <a href="{{ route('services.index') }}"class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-gear"></i>
        <p>Services</p>
    </a>
</li>

<li class="nav-item">
  <a href="{{ route('articles.index') }}" class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}">
    <i class="nav-icon bi bi-journal-text"></i>
    <p>Blog</p>
  </a>
</li>

<li class="nav-item">
    <a href="{{ route('abonnements_actualites.liste') }}"
       class="nav-link {{ request()->routeIs('abonnements_actualites.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-envelope-paper"></i>
        <p>Actualités</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.devis.index') }}"
       class="nav-link {{ request()->routeIs('admin.devis.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-file-earmark-text"></i>
        <p>Demandes de devis</p>
    </a>
</li>

<li class="nav-item">
  <a href="{{ route('commentaires.index') }}" class="nav-link">
    <i class="nav-icon bi bi-chat-dots"></i>
    <p>
      Commentaires
      @php($n = \App\Models\Commentaire::where('approuve', false)->count())
      @if ($n > 0)
        <span class="nav-badge badge text-bg-warning me-3">{{ $n }}</span>
      @endif
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{ route('admin.projets.index') }}" class="nav-link">
    <i class="nav-icon bi bi-briefcase"></i>
    <p>Projets</p>
  </a>
</li>
  
</ul>