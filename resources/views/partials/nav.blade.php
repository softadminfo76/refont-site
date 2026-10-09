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
                    <li class="has-drop">
                        <a href="{{ route('about') }}">A propos <i class="fa fa-angle-down"></i></a>
                        <ul class="ve-dropdown">
                            <li><a href="{{ route('about') }}#qui-sommes-nous">Qui sommes-nous</a></li>
                            <li><a href="{{ route('about') }}#domaines">Domaines d'intervention</a></li>
                            <li><a href="{{ route('about') }}#references">Nos références</a></li>
                            <li><a href="{{ route('about') }}#mission-vision-valeurs">Mission, vision et valeurs</a></li>
                            <li><a href="{{ route('about') }}#equipe">Notre équipe</a></li>
                        </ul>
                    </li>
                    <li class="has-drop">
                        <a href="{{ route('solutions') }}">Solutions <i class="fa fa-angle-down"></i></a>
                        <ul class="ve-dropdown">
                            <li><a href="https://digitimmo.horinfo.com/" target="_blank" rel="noopener noreferrer">Digitimmo</a></li>
                            <li><a href="https://yeele-event.com/" target="_blank" rel="noopener noreferrer">Yeele</a></li>
                            <li><a href="#" target="_blank" rel="noopener noreferrer">Dolibarr</a></li>
                        </ul>
                    </li>
                    <li class="has-drop">
                        <a href="{{ route('services') }}">Services <i class="fa fa-angle-down"></i></a>
                        <ul class="ve-dropdown">
                            <li><a href="{{ route('services.show', 1) }}">Développement d'application web et mobile</a></li>
                            <li><a href="{{ route('services.show', 2) }}">Développement CRM et application métier</a></li>
                            <li><a href="{{ route('services.show', 3) }}">Développement de site web</a></li>
                            <li><a href="{{ route('services.show', 4) }}">Marketing digital</a></li>
                            <li><a href="{{ route('services.show', 5) }}">Refonte web</a></li>
                            <li><a href="{{ route('services.show', 6) }}">Formations</a></li>
                            <li><a href="{{ route('services.show', 7) }}">Audits, études et conseils</a></li>
                            <li><a href="{{ route('services.show', 8) }}">Évènementiel</a></li>
                            <li><a href="{{ route('services.show', 9) }}">Assistance technique</a></li>
                        </ul>
                    </li>
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
        <li>
            <a href="{{ route('about') }}">A propos</a>
            <ul class="ve-mobile-sub">
                <li><a href="{{ route('about') }}#qui-sommes-nous">Qui sommes-nous</a></li>
                <li><a href="{{ route('about') }}#domaines">Domaines d'intervention</a></li>
                <li><a href="{{ route('about') }}#references">Nos références</a></li>
                <li><a href="{{ route('about') }}#mission-vision-valeurs">Mission, vision et valeurs</a></li>
                <li><a href="{{ route('about') }}#equipe">Notre équipe</a></li>
            </ul>
        </li>
            <a href="{{ route('solutions') }}">Solutions</a>
            <ul class="ve-mobile-sub">
                <li><a href="https://digitimmo.horinfo.com/" target="_blank" rel="noopener noreferrer">Digitimmo</a></li>
                <li><a href="https://yeele-event.com/" target="_blank" rel="noopener noreferrer">Yeele</a></li>
                <li><a href="#" target="_blank" rel="noopener noreferrer">Dolibarr</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('services') }}">Services</a>
            <ul class="ve-mobile-sub">
                <li><a href="{{ route('services.show', 1) }}">Développement d'application web et mobile</a></li>
                <li><a href="{{ route('services.show', 2) }}">Développement CRM et application métier</a></li>
                <li><a href="{{ route('services.show', 3) }}">Développement de site web</a></li>
                <li><a href="{{ route('services.show', 4) }}">Marketing digital</a></li>
                <li><a href="{{ route('services.show', 5) }}">Refonte web</a></li>
                <li><a href="{{ route('services.show', 6) }}">Formations</a></li>
                <li><a href="{{ route('services.show', 7) }}">Audits, études et conseils</a></li>
                <li><a href="{{ route('services.show', 8) }}">Évènementiel</a></li>
                <li><a href="{{ route('services.show', 9) }}">Assistance technique</a></li>
            </ul>
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