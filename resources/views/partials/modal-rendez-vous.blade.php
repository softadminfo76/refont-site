<div class="modal fade" id="contactModal" tabindex="-1" role="dialog"
     aria-labelledby="contactModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div>
                    <span class="ve-section-tag">CONTACTEZ-NOUS</span>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

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

                    <div class="ve-form-row">
                        <div class="ve-form-group">
                            <label>Numéro de téléphone</label>
                            <input type="tel" name="telephone" placeholder="Votre téléphone">
                        </div>
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
    </div>
</div>

<div id="contactToast" class="ve-toast">
    <i class="fa fa-check-circle"></i>
    <span>Votre message a bien été envoyé. Nous vous recontacterons rapidement !</span>
</div>

<script>
    (function () {
        const toast = document.getElementById('contactToast');

        document.querySelectorAll('.js-contact-form').forEach(function (form) {
            const errorsBox = form.querySelector('.js-errors');

            form.addEventListener('submit', async function (event) {
                event.preventDefault();

                errorsBox.classList.add('d-none');
                errorsBox.innerHTML = '';

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: { 'Accept': 'application/json' },
                        body: new FormData(form)
                    });

                    const result = await response.json();

                    if (!response.ok) {
                        const messages = Object.values(result.errors || {}).flat();

                        errorsBox.innerHTML = (messages.length ? messages : [result.message || 'Une erreur est survenue.'])
                            .map(message => `<div>${message}</div>`)
                            .join('');
                        errorsBox.classList.remove('d-none');
                        return;
                    }

                    form.reset();

                    // Ferme le modal seulement si le formulaire est dans un modal
                    if (form.closest('.modal') && window.jQuery) {
                        jQuery(form.closest('.modal')).modal('hide');
                    }

                    toast.querySelector('span').textContent = result.message;
                    toast.classList.add('show');
                    setTimeout(() => toast.classList.remove('show'), 4000);
                } catch (error) {
                    console.error(error);
                    errorsBox.textContent = 'Une erreur est survenue. Réessaie dans un instant.';
                    errorsBox.classList.remove('d-none');
                }
            });
        });
    })();
</script>