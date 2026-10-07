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
                    <input type="hidden" name="service" value="{{ $service->nom ?? '' }}">
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

<div id="devisToast" class="ve-toast">
    <i class="fa fa-check-circle"></i>
    <span>Votre demande de devis a bien été envoyée.</span>
</div>

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