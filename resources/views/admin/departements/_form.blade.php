<div class="row">
  <div class="col-lg-8">
    <div class="card card-primary card-outline mb-4">
      <div class="card-header"><div class="card-title">Informations</div></div>
      <div class="card-body">

        <div class="mb-3">
          <label class="form-label" for="nom">Nom du département</label>
          <input type="text" id="nom" name="nom" maxlength="120"
                 class="form-control @error('nom') is-invalid @enderror"
                 value="{{ old('nom', $departement->nom ?? '') }}" required>
          <div class="form-text">Par exemple « Ingénierie Logicielle ». Le mot « Département » est ajouté automatiquement sur la page.</div>
          @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="resume">Résumé (mission du département)</label>
          <textarea id="resume" name="resume" rows="4" maxlength="600"
                    class="form-control @error('resume') is-invalid @enderror" required>{{ old('resume', $departement->resume ?? '') }}</textarea>
          @error('resume') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="detail">Détail du département</label>
          <textarea id="detail" name="detail" rows="12" class="form-control">{{ old('detail', $departement->detail ?? '') }}</textarea>
          @error('detail') <div class="text-danger small mt-1">{{ $message }}</div> @enderror

          <script src="https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js" referrerpolicy="origin"></script>
          <script>
              tinymce.init({
                  selector: '#detail',
                  entity_encoding: 'raw',
                  language: 'fr_FR',
                  height: 450,
                  menubar: false,
                  plugins: 'lists link autolink',
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
      <div class="card-header"><div class="card-title">Affichage</div></div>
      <div class="card-body">

        <div class="mb-3">
          <label class="form-label" for="departement_id">Département</label>
          <select id="departement_id" name="departement_id" class="form-select @error('departement_id') is-invalid @enderror">
            <option value="">Aucun</option>
            @foreach (\App\Models\Departement::orderBy('ordre')->get() as $d)
              <option value="{{ $d->id }}"
                @selected((string) old('departement_id', $service->departement_id ?? '') === (string) $d->id)>
                {{ $d->nom }}
              </option>
            @endforeach
          </select>
          @error('departement_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Icône</label>
          <div class="d-flex flex-wrap gap-2">
            @foreach (\App\Models\Service::ICONES as $classe => $libelle)
              <div>
                <input type="radio" class="btn-check" name="icone" id="icone-{{ $loop->index }}"
                       value="{{ $classe }}" autocomplete="off"
                       @checked(old('icone', $departement->icone ?? '') === $classe)>
                <label class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                       for="icone-{{ $loop->index }}" title="{{ $libelle }}"
                       style="width: 52px; height: 52px; font-size: 1.4rem">
                  <i class="{{ $classe }}" aria-hidden="true"></i>
                  <span class="visually-hidden">{{ $libelle }}</span>
                </label>
              </div>
            @endforeach
          </div>
          @error('icone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="ordre">Ordre d'affichage</label>
          <input type="number" id="ordre" name="ordre" min="0" max="999"
                 class="form-control @error('ordre') is-invalid @enderror"
                 value="{{ old('ordre', $departement->ordre ?? 0) }}">
          <div class="form-text">Le plus petit numéro s'affiche en premier.</div>
          @error('ordre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" role="switch" id="actif" name="actif" value="1"
                 @checked(old('actif', $departement->actif ?? true))>
          <label class="form-check-label" for="actif">Page visible sur le site</label>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="d-flex gap-2 mb-4">
  <button type="submit" class="btn btn-primary">
    {{ isset($departement) ? 'Enregistrer les modifications' : 'Ajouter le département' }}
  </button>
  <a href="{{ route('departements.index') }}" class="btn btn-outline-secondary">Annuler</a>
</div>