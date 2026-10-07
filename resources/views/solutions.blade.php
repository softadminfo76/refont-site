<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="VaultEdge offers investment, wealth management, retirement, tax, and risk services.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Our Services — VaultEdge</title>
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}">
</head>
<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    
    @include('partials.nav')

    <section class="ve-page-hero" style="background-image:url({{ asset('img/bg-img/20.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Nos produits</span>
            <h1>Des solutions <span>développées en interne</span></h1>
            <p>Des outils conçus et développés par nos équipes, pensés pour répondre à des besoins métier concrets.</p>
            <nav aria-label="breadcrumb"><ol class="ve-breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li class="active">Solutions</li></ol></nav>
        </div>
    </section>

    <section class="ve-section">
    <div class="container">

        <div class="ve-section-header text-center">
            <span class="ve-section-tag">Nos réalisations</span>

            <h2>
                ce que nous avons <span>déjà construit</span>
            </h2>

            <p>
                Des exemples concrets de solutions imaginées, conçues et développées par nos équipes.
            </p>
        </div>

        <div class="ve-services-grid">

            @foreach ($realisations as $realisation)

                <div class="ve-service-card ve-realisation-card wow fadeInUp"
                     data-wow-delay="{{ (($loop->index % 3) + 1) * 100 }}ms">

                    {{-- Logo --}}
                    <div class="ve-service-icon">
                        @if ($realisation->logo)
                            <img src="{{ asset('storage/' . $realisation->logo) }}"
                                 alt="{{ $realisation->titre }}">
                        @endif
                    </div>

                    {{-- Titre --}}
                    <h4>{{ $realisation->titre }}</h4>

                    {{-- Description --}}
                    <p>{{ $realisation->description }}</p>

                    {{-- Fonctionnalités --}}
                    @if (count($realisation->liste_fonctionnalites))

                        <ul class="ve-af-features">

                            @foreach ($realisation->liste_fonctionnalites as $fonctionnalite)

                                <li>
                                    <i class="fa fa-check"></i>
                                    {{ $fonctionnalite }}
                                </li>

                            @endforeach

                        </ul>

                    @endif

                    {{-- Lien --}}
                    @if ($realisation->lien)

                        <a href="{{ $realisation->lien }}"
                           class="ve-card-link"
                           target="_blank"
                           rel="noopener noreferrer">

                            En savoir plus
                            <i class="fa fa-long-arrow-right"></i>

                        </a>

                    @endif

                </div>

            @endforeach

        </div>
    </div>
</section>


    <section class="ve-cta-banner bg-img" style="background-image:url({{ asset('img/bg-img/6.jpg') }});">
        <div class="ve-cta-overlay"></div>
        <div class="container ve-cta-content">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8"><h2>Prêt à concrétiser votre <span>projet numérique ?</span></h2><p>Échangez gratuitement avec notre équipe pour discuter de vos besoins et obtenir un premier devis.</p></div>
                <div class="col-12 col-lg-4 text-lg-right">
                    <a href="#" class="ve-btn-white" data-toggle="modal" data-target="#devisModal">
                        Demander un devis
                    </a>
                </div>
        </div>
    </section>
<div id="devisToast" class="ve-toast">
    <i class="fa fa-check-circle"></i>
    <span>Votre demande de devis a bien été envoyée.</span>
</div>


<div class="modal fade" id="devisModal" tabindex="-1" role="dialog"
    aria-labelledby="devisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <span class="ve-section-tag">ENVOYEZ-NOUS UN MESSAGE</span>
                    <h2>Demandez un <span>devis gratuit</span></h2>
                    <p>Remplissez le formulaire et un membre de notre équipe vous recontactera sous un jour ouvré.</p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="ve-contact-form" id="devisForm" action="{{ route('devis.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Nom + Email -->
                    <div class="ve-form-row">
                        <div class="ve-form-group">
                            <label>
                                Nom complet <span class="ve-required">*</span>
                            </label>
                            <input type="text"
                                   id="devis-name"
                                   name="nom"
                                   placeholder="Votre nom complet"
                                   required>
                        </div>
                        <div class="ve-form-group">
                            <label>
                                Adresse email <span class="ve-required">*</span>
                            </label>
                            <input type="email"
                                   id="devis-email"
                                   name="email"
                                   placeholder="Votre email"
                                   required>
                        </div>
                    </div>
                    <!-- Téléphone + Entreprise -->
                    <div class="ve-form-row">
                        <div class="ve-form-group">
                            <label>
                                Numéro de téléphone <span class="ve-required">*</span>
                            </label>
                            <input type="tel"
                                   id="devis-phone"
                                   name="telephone"
                                   placeholder="Votre téléphone"
                                   required>
                        </div>
                        <div class="ve-form-group">
                            <label>
                                Entreprise / Organisation
                            </label>
                            <input type="text"
                                   id="devis-entreprise"
                                   name="entreprise"
                                   placeholder="Nom de votre entreprise">
                        </div>
                    </div>
                    <!-- Objet -->
                    <div class="ve-form-group">
                        <label>
                            Objet du projet <span class="ve-required">*</span>
                        </label>
                        <input type="text"
                               id="devis-objet"
                               name="objet"
                               placeholder="Ex : Création d'un site web"
                               required>
                    </div>
                    <!-- Description -->
                    <div class="ve-form-group">
                        <label>
                            Description du projet <span class="ve-required">*</span>
                        </label>
                        <textarea id="devis-description"
                                  name="description"
                                  rows="5"
                                  placeholder="Décrivez votre projet, vos besoins et les fonctionnalités souhaitées..."
                                  required></textarea>
                    </div>
                    <!-- Délai + Ville -->
                    <div class="ve-form-row">
                        <div class="ve-form-group">
                            <label>
                                Délai souhaité
                            </label>
                            <select id="devis-delai"
                                    name="delai">
                                <option value="">Sélectionnez un délai</option>
                                <option value="urgent">Urgent</option>
                                <option value="moins-1-mois">
                                    Moins d'un mois
                                </option>
                                <option value="1-3-mois">
                                    1 à 3 mois
                                </option>
                                <option value="3-6-mois">
                                    3 à 6 mois
                                </option>
                                <option value="plus-6-mois">
                                    Plus de 6 mois
                                </option>
                                <option value="non-defini">
                                    Pas encore défini
                                </option>
                            </select>
                        </div>
                        <div class="ve-form-group">
                            <label>
                                Ville / Pays
                            </label>
                            <input type="text"
                                   id="devis-ville"
                                   name="ville"
                                   placeholder="Ex : Ouagadougou, Burkina Faso">
                        </div>
                    </div>
                    <!-- Pièce jointe -->
                    <div class="ve-form-group">
                        <label>
                            Pièce jointe
                        </label>
                        <input type="file"
                               id="devis-fichier"
                               name="fichier"
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                        <small>
                            Vous pouvez joindre un cahier des charges,
                            une maquette ou tout document utile.
                        </small>
                    </div>
                    <!-- Bouton -->
                    <<button type="submit" class="ve-btn-primary">
                        Envoyer la demande
                        <i class="fa fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

    @include('partials.footer')
    @include('partials.modal-rendez-vous')

    <script>
document.getElementById('devisForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {

            // Fermer le modal
            $('#devisModal').modal('hide');

            // Réinitialiser le formulaire
            form.reset();

            // Afficher le toast
            const toast = document.getElementById('devisToast');

            toast.classList.add('show');

            // Masquer le toast après 4 secondes
            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }
    })
    .catch(error => {
        console.error('Erreur :', error);
    });
});
</script>

    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/vaultedge.js') }}"></script>
</body>
</html>