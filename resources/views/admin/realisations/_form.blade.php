<div class="row">
  <div class="col-lg-8">
    <div class="card card-primary card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Informations</div>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label" for="titre">Titre</label>
          <input
            type="text"
            id="titre"
            name="titre"
            class="form-control @error('titre') is-invalid @enderror"
            value="{{ old('titre', $realisation->titre ?? '') }}"
            required
          />
          @error('titre')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="description">Description</label>
          <textarea
            id="description"
            name="description"
            rows="5"
            class="form-control @error('description') is-invalid @enderror"
            required
          >{{ old('description', $realisation->description ?? '') }}</textarea>
          @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="fonctionnalites">Fonctionnalités</label>
          <textarea
            id="fonctionnalites"
            name="fonctionnalites"
            rows="5"
            class="form-control @error('fonctionnalites') is-invalid @enderror"
          >{{ old('fonctionnalites', $realisation->fonctionnalites ?? '') }}</textarea>
          <div class="form-text">Une fonctionnalité par ligne.</div>
          @error('fonctionnalites')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label class="form-label" for="lien">Lien</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class="bi bi-link-45deg" aria-hidden="true"></i></span>
            <input
              type="url"
              id="lien"
              name="lien"
              class="form-control @error('lien') is-invalid @enderror"
              placeholder="https://..."
              value="{{ old('lien', $realisation->lien ?? '') }}"
            />
            @error('lien')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-text">Adresse complète, avec https://</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card card-info card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Affichage</div>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label" for="logo">Logo</label>
          @isset($realisation)
            @if ($realisation->logo)
              <div class="mb-2">
                <img
                  src="{{ asset('storage/' . $realisation->logo) }}"
                  alt="Logo actuel"
                  style="max-height: 60px; max-width: 100%; object-fit: contain"
                />
              </div>
            @endif
          @endisset
          <input
            type="file"
            id="logo"
            name="logo"
            accept="image/*"
            class="form-control @error('logo') is-invalid @enderror"
          />
          <div class="form-text">
            2 Mo maximum.
            @isset($realisation) Laissez vide pour garder le logo actuel. @endisset
          </div>
          @error('logo')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="ordre">Ordre d'affichage</label>
          <input
            type="number"
            id="ordre"
            name="ordre"
            min="0"
            class="form-control @error('ordre') is-invalid @enderror"
            value="{{ old('ordre', $realisation->ordre ?? 0) }}"
          />
          <div class="form-text">Le plus petit nombre s'affiche en premier.</div>
          @error('ordre')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-check form-switch">
          <input type="hidden" name="actif" value="0" />
          <input
            class="form-check-input"
            type="checkbox"
            role="switch"
            id="actif"
            name="actif"
            value="1"
            @checked(old('actif', $realisation->actif ?? true))
          />
          <label class="form-check-label" for="actif">Visible sur le site</label>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="d-flex gap-2 mb-4">
  <button type="submit" class="btn btn-primary">
    <i class="bi bi-check-lg me-1" aria-hidden="true"></i>
    {{ isset($realisation) ? 'Enregistrer les modifications' : 'Ajouter la réalisation' }}
  </button>
  <a href="{{ route('realisations.index') }}" class="btn btn-outline-secondary">Annuler</a>
</div>