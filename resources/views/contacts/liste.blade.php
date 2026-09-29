<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Mailbox</title>

    <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
    <script>
      (() => {
        'use strict';
        const root = document.documentElement;

        // Applications with their own theming opt out of AdminLTE's color mode
        // entirely, here as well as in the bundle.
        if (root.getAttribute('data-lte-color-mode') === 'off') {
          return;
        }

        const STORAGE_KEY = 'lte-theme';
        let stored = null;
        try {
          stored = localStorage.getItem(STORAGE_KEY);
        } catch {
          // localStorage may be unavailable (private mode, sandboxed iframe).
        }
        // Mirror the precedence in color-mode.ts: the visitor's stored choice
        // wins, then a theme this page declared itself, then the OS preference.
        const authored = root.getAttribute('data-bs-theme');
        let resolved = 'light';
        if (stored === 'dark' || stored === 'light') {
          resolved = stored;
        } else if (authored === 'dark' || authored === 'light') {
          resolved = authored;
        } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
          resolved = 'dark';
        }
        root.setAttribute('data-bs-theme', resolved);
        root.style.colorScheme = resolved;
        // Flag values computed here, so the bundle does not mistake them for a
        // theme the page declared and stop following the OS preference.
        if (resolved !== authored) {
          root.setAttribute('data-lte-theme-resolved', '');
        }
      })();
    </script>
    <!--end::Theme Init-->

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Mailbox" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a free Bootstrap 5 admin dashboard template with almost 50 example pages, built with vanilla JS and designed with accessibility in mind."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel"
    />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('vendor/adminlte/css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media = 'all'"
    />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a
                class="nav-link"
                data-lte-toggle="sidebar"
                href="#"
                role="button"
                aria-label="Toggle sidebar"
              >
                <i class="bi bi-list"></i>
              </a>
            </li>

            <li class="nav-item d-none d-md-block">
              <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="bi bi-grid-1x2 me-1" aria-hidden="true"></i>
                Live preview
              </a>
            </li>
            <li class="nav-item d-none d-md-block">
              <a href="../docs/introduction.html" class="nav-link">
                <i class="bi bi-book me-1" aria-hidden="true"></i>
                Documentation
              </a>
            </li>
          </ul>
          <!--end::Start Navbar Links-->

          <!--begin::Navbar Search-->
          <form
            class="navbar-search d-none d-md-block ms-3"
            role="search"
            action="../pages/search-results.html"
          >
            <label for="navbar-search-input" class="visually-hidden">Search</label>
            <div class="navbar-search-field">
              <input
                type="search"
                id="navbar-search-input"
                name="q"
                class="form-control"
                placeholder="Search…"
                autocomplete="off"
              />
              <button class="navbar-search-submit" type="submit" aria-label="Submit search">
                <i class="bi bi-search" aria-hidden="true"></i>
              </button>
            </div>
          </form>
          <!--end::Navbar Search-->

          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Search (small screens: the field above is hidden, so link to the search page)-->
            <li class="nav-item d-md-none">
              <a class="nav-link" href="#" aria-label="Search">
                <i class="bi bi-search" aria-hidden="true"></i>
              </a>
            </li>
            <!--end::Search-->
            <!--begin::Messages Dropdown Menu-->
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                data-bs-toggle="dropdown"
                href="#"
                aria-label="Messages: 3 unread"
              >
                <i class="bi bi-chat-text"></i>
                <span class="navbar-badge badge text-bg-danger">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="{{ asset('vendor/adminlte/assets/img/') }}/user1-128x128.jpg"
                        alt=""
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <p class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-end fs-7 text-danger"
                          ><i class="bi bi-star-fill"></i
                        ></span>
                      </p>
                      <p class="fs-7">Call me whenever you can...</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="{{ asset('vendor/adminlte/assets/img/') }}/user8-128x128.jpg"
                        alt=""
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <p class="dropdown-item-title">
                        John Pierce
                        <span class="float-end fs-7 text-secondary">
                          <i class="bi bi-star-fill"></i>
                        </span>
                      </p>
                      <p class="fs-7">I got your message bro</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="{{ asset('vendor/adminlte/assets/img/') }}/user3-128x128.jpg"
                        alt=""
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <p class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-end fs-7 text-warning">
                          <i class="bi bi-star-fill"></i>
                        </span>
                      </p>
                      <p class="fs-7">The subject goes here</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
              </div>
            </li>
            <!--end::Messages Dropdown Menu-->

            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                data-bs-toggle="dropdown"
                href="#"
                aria-label="Notifications: 15 unread"
              >
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-envelope me-2"></i> 4 new messages
                  <span class="float-end text-secondary fs-7">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-people-fill me-2"></i> 8 friend requests
                  <span class="float-end text-secondary fs-7">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                  <span class="float-end text-secondary fs-7">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
              </div>
            </li>
            <!--end::Notifications Dropdown Menu-->

            <!--begin::Language Menu-->
            <!-- Markup only: swapping the locale is the application's job. The docs
           Recipes page shows how to wire this to a real locale switch. -->
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="language-menu"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                aria-label="Change language, current language English"
              >
                <i class="bi bi-translate" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="language-menu">
                <li>
                  <a class="dropdown-item active" href="#" hreflang="en" aria-current="true">
                    English
                    <i class="bi bi-check-lg ms-2" aria-hidden="true"></i>
                  </a>
                </li>
                <li><a class="dropdown-item" href="#" hreflang="es">Español</a></li>
                <li><a class="dropdown-item" href="#" hreflang="fr">Français</a></li>
                <li><a class="dropdown-item" href="#" hreflang="de">Deutsch</a></li>
                <li><a class="dropdown-item" href="#" hreflang="ar">العربية</a></li>
              </ul>
            </li>
            <!--end::Language Menu-->

            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                data-lte-toggle="fullscreen"
                aria-label="Toggle fullscreen"
              >
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->

            <!--begin::Color Mode Toggle (#6010)-->
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="bd-theme"
                aria-label="Toggle color scheme"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
                <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
                <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="bd-theme"
                style="--bs-dropdown-min-width: 8rem"
              >
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center"
                    data-bs-theme-value="light"
                    aria-pressed="false"
                  >
                    <i class="bi bi-sun-fill me-2"></i>
                    Light
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center"
                    data-bs-theme-value="dark"
                    aria-pressed="false"
                  >
                    <i class="bi bi-moon-fill me-2"></i>
                    Dark
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center active"
                    data-bs-theme-value="auto"
                    aria-pressed="true"
                  >
                    <i class="bi bi-circle-half me-2"></i>
                    Auto
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                  </button>
                </li>
              </ul>
            </li>
            <!--end::Color Mode Toggle-->

            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="{{ asset('vendor/adminlte/assets/img/') }}/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="Alexander Pierce"
                />
                <span class="d-none d-md-inline">Alexander Pierce</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="{{ asset('vendor/adminlte/assets/img/') }}/user2-160x160.jpg"
                    class="rounded-circle shadow"
                    alt="Alexander Pierce"
                  />
                  <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2023</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body">
                  <!--begin::Row-->
                  <div class="row">
                    <div class="col-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!--end::Row-->
                </li>
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="#" class="btn btn-outline-secondary">Profile</a>
                  <a href="#" class="btn btn-outline-danger float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('vendor/adminlte/assets/img/') }}/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Search-->
        <div class="sidebar-search" role="search">
          <label for="sidebar-search-input" class="visually-hidden">Filter menu</label>
          <input
            type="search"
            id="sidebar-search-input"
            class="form-control form-control-sm"
            placeholder="Filter menu…"
            autocomplete="off"
            data-lte-toggle="sidebar-search"
            data-lte-target="#navigation"
          />
          <p class="fs-7 text-secondary mt-2 mb-0" data-lte-search-empty role="status" hidden>
            No matching pages.
          </p>
        </div>
        <!--end::Sidebar Search-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2" aria-label="Main navigation">
            <!--begin::Sidebar Menu-->
            @include('partials.admin-sidebar')
            <!--end::Sidebar Menu-->

          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Mailbox</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row g-3">
              <!-- Folder sidebar -->
              <div class="col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Folders</h3>
                  </div>
                  <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column mb-0">
                      <li class="nav-item">
                        <a
                          href="{{ route('contacts.liste') }}"
                          class="nav-link active rounded-0 d-flex justify-content-between"
                        >
                          <span> <i class="bi bi-inbox me-2" aria-hidden="true"></i>Messages reçus </span>
                          <span class="badge text-bg-primary">{{ $nonLus }}</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link rounded-0">
                          <i class="bi bi-send me-2" aria-hidden="true"></i>Sent
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link rounded-0 d-flex justify-content-between">
                          <span>
                            <i class="bi bi-file-earmark me-2" aria-hidden="true"></i>
                            Drafts
                          </span>
                          <span class="badge text-bg-secondary">2</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link rounded-0">
                          <i class="bi bi-star me-2" aria-hidden="true"></i>Starred
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link rounded-0">
                          <i class="bi bi-archive me-2" aria-hidden="true"></i>Archive
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link rounded-0">
                          <i class="bi bi-exclamation-octagon me-2" aria-hidden="true"></i>
                          Spam
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link rounded-0">
                          <i class="bi bi-trash me-2" aria-hidden="true"></i>Trash
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card mt-3">
                  <div class="card-header">
                    <h3 class="card-title">Labels</h3>
                  </div>
                  <div class="card-body p-0">
                    <ul class="nav flex-column mb-0">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i
                            class="bi bi-circle-fill text-primary me-2"
                            style="font-size: 0.6rem"
                            aria-hidden="true"
                          ></i>
                          Customers
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i
                            class="bi bi-circle-fill text-success me-2"
                            style="font-size: 0.6rem"
                            aria-hidden="true"
                          ></i>
                          Billing
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i
                            class="bi bi-circle-fill text-warning me-2"
                            style="font-size: 0.6rem"
                            aria-hidden="true"
                          ></i>
                          Internal
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Inbox list -->
              <div class="col-lg-9">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Inbox</h3>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 16rem">
                        <span class="input-group-text">
                          <i class="bi bi-search" aria-hidden="true"></i>
                        </span>
                        <input
                          type="search"
                          class="form-control"
                          placeholder="Search mail&hellip;"
                          aria-label="Search mail"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="d-flex align-items-center px-3 py-2 border-bottom">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="select-all" />
                        <label class="form-check-label visually-hidden" for="select-all">
                          Select all
                        </label>
                      </div>
                      <div class="btn-group btn-group-sm ms-3">
                        <button class="btn btn-outline-secondary" type="button" title="Refresh">
                          <i class="bi bi-arrow-clockwise" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-outline-secondary" type="button" title="Archive">
                          <i class="bi bi-archive" aria-hidden="true"></i>
                        </button>
                        <button
                          class="btn btn-outline-secondary"
                          type="button"
                          title="Mark as spam"
                        >
                          <i class="bi bi-exclamation-octagon" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-outline-secondary" type="button" title="Delete">
                          <i class="bi bi-trash" aria-hidden="true"></i>
                        </button>
                      </div>
                      <span class="ms-auto text-secondary small">
                        @if ($contacts->total())
                          {{ $contacts->firstItem() }}&ndash;{{ $contacts->lastItem() }} sur {{ $contacts->total() }}
                        @else
                          0 message
                        @endif
                      </span>
                    </div>
                    <ul class="list-group list-group-flush mb-0">
                  @forelse ($contacts as $contact)
                    <li class="list-group-item d-flex align-items-center gap-2 {{ $contact->est_lu ? '' : 'fw-semibold bg-body-secondary' }}">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="contact-{{ $contact->id }}" />
                        <label class="form-check-label visually-hidden" for="contact-{{ $contact->id }}">
                          Sélectionner le message de {{ $contact->nom }}
                        </label>
                      </div>
                      <a href="{{ route('contacts.lire', $contact) }}" class="flex-grow-1 d-flex flex-column flex-md-row gap-md-3 text-decoration-none text-body" style="min-width: 0">
                        <span class="text-truncate" style="min-width: 9rem">{{ $contact->nom }}</span>
                        <span class="flex-grow-1 text-truncate" style="min-width: 0">
                          @unless ($contact->est_lu)
                            <span class="badge text-bg-primary me-2">Nouveau</span>
                          @endunless
                          <span class="fw-normal text-secondary">{{ Str::limit($contact->message, 90) }}</span>
                        </span>
                        <span class="text-secondary small text-md-end" style="min-width: 5rem">
                          {{ $contact->created_at->format('d/m/Y H:i') }}
                        </span>
                      </a>
                    </li>
                  @empty
                    <li class="list-group-item text-center text-secondary py-4">
                      Aucun message reçu pour le moment.
                    </li>
                  @endforelse
                </ul>
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
      </main>
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2026&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('vendor/adminlte/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--begin::Charts follow the colour mode-->
    <script>
      // ApexCharts draws light-theme tooltips and axis text unless told otherwise,
      // which is unreadable in dark mode (#6105). Give it the page's colour mode as
      // a global default before any chart is created — this runs before the chart
      // pages' own scripts — and keep every chart that has a `chart.id` in step
      // when the mode changes (ColorMode, the OS in auto mode, or your own code).
      (() => {
        'use strict';
        const mode = () =>
          document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'dark' : 'light';
        // `Apex` is ApexCharts' global-options object; it must exist before the library loads.
        // theme.mode also sets a dark chart background — keep the card's instead.
        // eslint-disable-next-line unicorn/no-global-object-property-assignment
        globalThis.Apex ||= {};
        const apex = globalThis.Apex;
        apex.theme = { mode: mode() };
        apex.chart = Object.assign(apex.chart || {}, { background: 'transparent' });
        new MutationObserver(() => {
          const next = mode();
          apex.theme = { mode: next };
          const instances = apex._chartInstances || [];
          for (const { chart } of instances) {
            chart.updateOptions({ theme: { mode: next } }, false, false);
          }
        }).observe(document.documentElement, {
          attributes: true,
          attributeFilter: ['data-bs-theme'],
        });
      })();
    </script>
    <!--end::Charts follow the colour mode-->

    <!--begin::Color Mode Toggle-->
    <!-- The light/dark/auto switcher ships in adminlte.js as the ColorMode
     module (since 4.1) — no page script needed. Only the no-flash snippet
     in <head> stays inline, because it must run before first paint. -->
    <!--end::Color Mode Toggle-->
  </body>
</html>