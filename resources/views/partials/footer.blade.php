<!-- ===== FOOTER (dark, 4-column) ===== -->
    <footer class="ve-footer">
        <div class="container">
            <div class="row">
                <!-- Col 1: Brand -->
                <div class="col-12 col-sm-6 col-lg-4 mb-50">
                    <div class="ve-footer-brand">
                        <a href="{{ route('home') }}" class="ve-footer-logo">
                            <img src="{{ asset('img/bg-img/logo.png') }}" alt="HORINFO" class="ve-logo-img">
                            <span class="ve-logo-text">  HOR<strong>INFO</strong></span>
                        </a>
                        <p>Des solutions informatiques sur mesure pour accompagner la transformation numérique des organisations depuis 1999.</p>
                        <div class="ve-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Col 2: Quick Links -->
                <div class="col-12 col-sm-6 col-lg-2 mb-50">
                    <h5 class="ve-footer-title">Liens rapides</h5>
                    <ul class="ve-footer-links">
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li><a href="{{ route('about') }}">L'entreprise</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('solutions') }}">Solutions</a></li>
                        <li><a href="{{ route('post.index') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <!-- Col 3: Services -->
                <div class="col-12 col-sm-6 col-lg-3 mb-50">
                    <h5 class="ve-footer-title">Nos services</h5>
                        <ul class="ve-footer-links">
                            <li><a href="#">Développement mobile <br>et d'application web  </a></li>
                            <li><a href="#">Développement CRM et <br>application métier</a></li>
                            <li><a href="#">Développement de site web</a></li>
                            <li><a href="#">Refonte web</a></li>
                            <li><a href="#">Audits, études et conseils</a></li>
                        </ul>
                </div>
                <!-- Col 4: Contact -->
                <div class="col-12 col-sm-6 col-lg-3 mb-50">
                    <h5 class="ve-footer-title">Nous contacter</h5>
                        <ul class="ve-footer-contact">
                            <li><i class="fa fa-map-marker"></i> 178 rue 30.131, Sanyiri, Ouagadougou, Burkina Faso</li>
                            <li><i class="fa fa-phone"></i> +226 61 60 15 15</li>
                            <li><i class="fa fa-envelope"></i> contact@horinfo.bf</li>
                            <li><i class="fa fa-clock-o"></i> Lun–Ven, 8h – 17h</li>
                        </ul>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="ve-footer-bottom">
            <div class="container">
                <div class="ve-footer-bottom-inner">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> HORINFO. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>