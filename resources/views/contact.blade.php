<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Get in touch with VaultEdge — book a free financial consultation today.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us — VaultEdge</title>
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>
<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    
    @include('partials.nav')

    <section class="ve-page-hero" style="background-image:url({{ asset('img/bg-img/22.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Contactez-nous</span>
            <h1>Nous serions ravis de <span>vous écouter</span></h1>
            <nav aria-label="breadcrumb"><ol class="ve-breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li class="active">Contact</li></ol></nav>
        </div>
    </section>

    <section class="ve-contact-cards-section">
        <div class="container">
            <div class="ve-contact-cards-grid">
                <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="100ms"><div class="ve-ci-icon"><i class="fa fa-map-marker"></i></div><h5>Notre bureau</h5><p>178 rue 30.131, Sanyiri, Ouagadougou, Burkina Faso</p></div>
                <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="250ms"><div class="ve-ci-icon"><i class="fa fa-phone"></i></div><h5>Appelez-nous</h5><p>+226 61 60 15 15<br><small>Lun–Ven, 8h – 17h</small></p></div>
                <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="400ms"><div class="ve-ci-icon"><i class="fa fa-envelope"></i></div><h5>Écrivez-nous</h5><p>contact@horinfo.bf<br><small>Réponse sous 24h</small></p></div>
            </div>
        </div>
    </section>

    <section class="ve-section ve-contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="ve-contact-form-wrap">
                        <span class="ve-section-tag">Envoyez-nous un message</span>
                        <h2>Demandez un <span>devis gratuit</span></h2>
                        <p>Remplissez le formulaire et un membre de notre équipe vous recontactera sous un jour ouvré.</p>
                        <form class="ve-contact-form js-contact-form" action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <div class="ve-form-row">
                                <div class="ve-form-group">
                                    <label>Nom complet <span class="ve-required">*</span></label>
                                    <input type="text" name="nom" placeholder="Votre nom complet" required>
                                </div>
                                <div class="ve-form-group">
                                    <label>Adresse email <span class="ve-required">*</span></label>
                                    <input type="email" name="email" placeholder="Votre email" required>
                                </div>
                            </div>
                            <div class="ve-form-group">
                                <label>Numéro de téléphone</label>
                                <input type="tel" name="telephone" placeholder="Votre téléphone">
                            </div>
                            <div class="ve-form-group">
                                <label>Votre message <span class="ve-required">*</span></label>
                                <textarea name="message" rows="5" placeholder="Décrivez votre projet ou besoin..." required></textarea>
                            </div>

                            <div class="alert alert-danger d-none js-errors" role="alert"></div>

                            <button type="submit" class="ve-btn-primary">
                                Envoyer le message
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-5 wow fadeInRight" data-wow-delay="200ms">
                    <div class="ve-contact-aside">
                        <div class="ve-ca-box">
                            <h4>Pourquoi choisir HORINFO</h4>
                            <ul class="ve-ca-list">
                                <li><i class="fa fa-check-circle"></i> Premier échange gratuit</li>
                                <li><i class="fa fa-check-circle"></i> Réponse sous 24 heures</li>
                                <li><i class="fa fa-check-circle"></i> Aucune pression commerciale</li>
                                <li><i class="fa fa-check-circle"></i> Plus de 25 ans d'expertise IT</li>
                                <li><i class="fa fa-check-circle"></i> Partenaire d'institutions internationales</li>
                            </ul>
                        </div>
                        <div class="ve-ca-hours">
                            <h5><i class="fa fa-clock-o"></i> Horaires d'ouverture</h5>
                            <ul>
                                <li><span>Lundi – Vendredi</span><strong>8h00 – 17h00</strong></li>
                                <li><span>Samedi</span><strong>Fermé</strong></li>
                                <li><span>Dimanche</span><strong>Fermé</strong></li>
                            </ul>
                        </div>
                        <div class="contact-ve-ca-social">
                            <h5>Suivez-nous</h5>
                            <div class="contact-ve-social">
                                <a href="https://web.facebook.com/HorinfoBurkinaFaso" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.youtube.com/@Horinfo" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa fa-youtube"></i></a>
                                <a href="https://www.linkedin.com/company/horinfo/posts/?feedView=all" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="ve-nl-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7794.971129965007!2d-1.4884694!3d12.3503733!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2ebf3fb567f817%3A0x2ae84c5d4e53f656!2sHORINFO!5e0!3m2!1sfr!2sbf!4v1789729238267!5m2!1sfr!2sbf" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>

    @include('partials.footer')
    @include('partials.modal-rendez-vous')

    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/vaultedge.js') }}"></script>
</body>
</html>