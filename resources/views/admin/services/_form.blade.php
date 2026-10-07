<div class="row">
  <div class="col-lg-8">
    <div class="card card-primary card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Informations</div>
      </div>

      <div class="card-body">

        <div class="mb-3">
          <label class="form-label" for="nom">Nom du service</label>
          <input
            type="text"
            id="nom"
            name="nom"
            class="form-control @error('nom') is-invalid @enderror"
            value="{{ old('nom', $service->nom ?? '') }}"
            required
          />

          @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="description">Description</label>
          <textarea
            id="description"
            name="description"
            rows="7"
            class="form-control @error('description') is-invalid @enderror"
            required
          >{{ old('description', $service->description ?? '') }}</textarea>

          <div class="form-text">
            Commence par une phrase d'introduction, puis écris chaque point précédé de « • ».
          </div>

          @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="detail">Détail du service</label>

          <textarea
            id="detail"
            name="detail"
            rows="12"
            class="form-control @error('detail') is-invalid @enderror"
            placeholder="Décrivez en détail le service..."
          >{{ old('detail', $service->detail ?? '') }}</textarea>

          @error('detail')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror

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
                  block_formats: 'Paragraphe=p; Titre de section=h3; Sous-titre=h4'
              });
          </script>
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

        {{-- Icône --}}
        <div class="mb-3">
          <label class="form-label">Icône</label>
          <div class="d-flex flex-wrap gap-2">
            @foreach (\App\Models\Service::ICONES as $classe => $libelle)
              <div>
                <input
                  type="radio"
                  class="btn-check"
                  name="icone"
                  id="icone-{{ $loop->index }}"
                  value="{{ $classe }}"
                  autocomplete="off"
                  @checked(old('icone', $service->icone ?? '') === $classe)
                />
                <label
                  class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                  for="icone-{{ $loop->index }}"
                  title="{{ $libelle }}"
                  style="width: 52px; height: 52px; font-size: 1.4rem"
                >
                  <i class="{{ $classe }}" aria-hidden="true"></i>
                  <span class="visually-hidden">{{ $libelle }}</span>
                </label>
              </div>
            @endforeach
          </div>

          @error('icone')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

                {{-- Image --}}
        <div class="mb-3">
          <label class="form-label" for="image">Image du service</label>

          @isset($service)
            @if ($service->image)
              <div class="mb-2">
                <img
                  src="{{ asset('storage/' . $service->image) }}"
                  alt="Image actuelle"
                  style="max-height: 150px; max-width: 100%; object-fit: contain"
                />
              </div>
            @endif
          @endisset

          <input
            type="file"
            id="image"
            name="image"
            accept="image/*"
            class="form-control @error('image') is-invalid @enderror"
          />

          <div class="form-text">
            2 Mo maximum.
            @isset($service)
              Laissez vide pour conserver l'image actuelle.
            @endisset
          </div>

          @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

      </div>
    </div>
  </div>
</div>

<div class="d-flex gap-2 mb-4">
  <button type="submit" class="btn btn-primary">
    <i class="bi bi-check-lg me-1" aria-hidden="true"></i>
    {{ isset($service) ? 'Enregistrer les modifications' : 'Ajouter le service' }}
  </button>

  <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
    Annuler
  </a>
</div>