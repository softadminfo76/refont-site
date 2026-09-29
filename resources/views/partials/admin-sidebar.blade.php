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
</ul>