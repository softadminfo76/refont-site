<!-- ===== NAVBAR (single dark bar, logo left, nav center, CTA right) ===== -->
    <header class="ve-header" id="ve-sticky">
        <div class="container-fluid ve-nav-wrap">
            <!-- Logo -->
            <div class="ve-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/bg-img/logo.png') }}" alt="HORINFO" class="ve-logo-img">
                    <span class="ve-logo-text">HOR<strong>INFO</strong></span>
                </a>
            </div>

            <!-- Nav Links -->
            <nav class="ve-nav">
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
                    <li>
                        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">L'entreprise </i></a>
                    </li>
                    <li>
                        <a href="{{ route('solutions') }}" class="{{ request()->routeIs('solutions') ? 'active' : '' }}">Solutions </i></a>
                    </li>
                    <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
                    <li><a href="{{ route('projets.index') }}" class="{{ request()->routeIs('projets.*') ? 'active' : '' }}">Projets</a></li>
                    <li><a href="{{ route('post.index') }}" class="{{ request()->routeIs('post.index') ? 'active' : '' }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                </ul>
            </nav>

            <!-- CTA -->
            <div class="ve-nav-cta">
                <a href="#" class="ve-cta-btn" data-toggle="modal" data-target="#contactModal">Prendre un rendez-vous</i></a>
            </div>

            <!-- Mobile Toggle -->
            <button class="ve-toggler" id="ve-toggle">
                <span></span><span></span><span></span>
            </button>
        </div>

        <!-- Mobile Menu -->
<div class="ve-mobile-menu" id="ve-mobile-menu">
    <ul>
        <li>
            <a href="{{ route('home') }}">Accueil</a>
        </li>

        <li>
            <a href="{{ route('about') }}">L'entreprise</a>
        </li>

        <li>
            <a href="{{ route('solutions') }}">Solutions</a>
        </li>

        <li>
            <a href="{{ route('services') }}">Services</a>
        </li>

        <li><a href="{{ route('projets.index') }}" class="{{ request()->routeIs('projets.*') ? 'active' : '' }}">Projets</a></li>

        <li>
            <a href="{{ route('post.index') }}">Blog</a>
        </li>

        <li>
            <a href="{{ route('contact') }}">Contact</a>
        </li>
    </ul>
</div>

@include('partials.modal-rendez-vous')

    </header>