<div class="row">
  <div class="col-lg-8">
    <div class="card card-primary card-outline mb-4">
      <div class="card-header"><div class="card-title">Informations</div></div>
      <div class="card-body">

        <div class="mb-3">
          <label class="form-label" for="titre_court">Titre court (affiché sur la carte)</label>
          <input type="text" id="titre_court" name="titre_court" maxlength="120"
                 class="form-control @error('titre_court') is-invalid @enderror"
                 value="{{ old('titre_court', $projet->titre_court ?? '') }}" required>
          <div class="form-text">3 lignes maximum, par exemple « Infocentre agricole décisionnel ».</div>
          @error('titre_court') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="titre">Titre complet</label>
          <textarea id="titre" name="titre" rows="3"
                    class="form-control @error('titre') is-invalid @enderror" required>{{ old('titre', $projet->titre ?? '') }}</textarea>
          @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="resume">Résumé (2 lignes)</label>
          <textarea id="resume" name="resume" rows="3" maxlength="400"
                    class="form-control @error('resume') is-invalid @enderror" required>{{ old('resume', $projet->resume ?? '') }}</textarea>
          <div class="form-text">Une phrase qui explique ce que fait le projet. Sans « BURKINA FASO », ni « PRÉSENTATION ».</div>
          @error('resume') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="detail">Détail du projet</label>
          <textarea id="detail" name="detail" rows="12"
                    class="form-control">{{ old('detail', $projet->detail ?? '') }}</textarea>
          @error('detail') <div class="text-danger small mt-1">{{ $message }}</div> @enderror

          <script src="https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js" referrerpolicy="origin"></script>
          <script>
              tinymce.init({
                selector: '#detail',
                entity_encoding: 'raw',
                language: 'fr_FR',
                height: 450,
                menubar: false,
                plugins: 'lists link',
                toolbar: 'blocks | bold italic | bullist numlist | link | removeformat',
                block_formats: 'Paragraphe=p; Titre de section=h3; Sous-titre=h4',
                link_default_target: '_blank',
                link_assume_external_targets: 'https'
            });
          </script>
        </div>

      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card card-info card-outline mb-4">
      <div class="card-header"><div class="card-title">Classement</div></div>
      <div class="card-body">

        <div class="mb-3">
          <label class="form-label" for="client">Client</label>
          <input type="text" id="client" name="client"
                 class="form-control @error('client') is-invalid @enderror"
                 value="{{ old('client', $projet->client ?? '') }}" required>
          @error('client') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="financeur">Financeur (facultatif)</label>
          <input type="text" id="financeur" name="financeur"
                 class="form-control"
                 value="{{ old('financeur', $projet->financeur ?? '') }}">
        </div>

        <div class="mb-3">
          <label class="form-label" for="secteur">Secteur</label>
          <select id="secteur" name="secteur" class="form-select @error('secteur') is-invalid @enderror" required>
            <option value="">Choisir…</option>
            @foreach (\App\Models\Projet::SECTEURS as $s)
              <option value="{{ $s }}" @selected(old('secteur', $projet->secteur ?? '') === $s)>{{ $s }}</option>
            @endforeach
          </select>
          @error('secteur') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="image">Image ou logo (facultatif)</label>
          @isset($projet)
            @if ($projet->image)
              <div class="mb-2">
                <img src="{{ asset('storage/' . $projet->image) }}" alt="Image actuelle"
                     style="max-height:120px; max-width:100%; object-fit:contain">
              </div>
            @endif
          @endisset
          <input type="file" id="image" name="image" accept="image/*"
                 class="form-control @error('image') is-invalid @enderror">
          <div class="form-text">2 Mo maximum.</div>
          @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

      </div>
    </div>
  </div>
</div>

<div class="d-flex gap-2 mb-4">
  <button type="submit" class="btn btn-primary">
    {{ isset($projet) ? 'Enregistrer les modifications' : 'Ajouter le projet' }}
  </button>
  <a href="{{ route('admin.projets.index') }}" class="btn btn-outline-secondary">Annuler</a>
</div>