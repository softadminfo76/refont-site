<div class="row">
  <div class="col-lg-8">
    <div class="card card-primary card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Article</div>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label" for="titre">Titre</label>
          <input
            type="text"
            id="titre"
            name="titre"
            class="form-control @error('titre') is-invalid @enderror"
            value="{{ old('titre', $article->titre ?? '') }}"
            required
          />
          @error('titre')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="extrait">Extrait</label>
          <textarea
            id="extrait"
            name="extrait"
            rows="3"
            maxlength="300"
            class="form-control @error('extrait') is-invalid @enderror"
            required
          >{{ old('extrait', $article->extrait ?? '') }}</textarea>
          <div class="form-text">Le texte court affiché sur les cartes (300 caractères maximum).</div>
          @error('extrait')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label class="form-label">Contenu</label>
          <div id="editeur" style="min-height: 320px"></div>
          <input
            type="hidden"
            name="contenu"
            id="contenu"
            value="{{ old('contenu', $article->contenu ?? '') }}"
          />
          @error('contenu')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card card-info card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Publication</div>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label" for="categorie">Catégorie</label>
          <select
            id="categorie"
            name="categorie"
            class="form-select @error('categorie') is-invalid @enderror"
            required
          >
            <option value="" disabled @selected(! old('categorie', $article->categorie ?? ''))>Choisir…</option>
            @foreach (\App\Models\Article::CATEGORIES as $categorie)
              <option value="{{ $categorie }}" @selected(old('categorie', $article->categorie ?? '') === $categorie)>
                {{ $categorie }}
              </option>
            @endforeach
          </select>
          @error('categorie')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="image">Image</label>
          @isset($article)
            @if ($article->image)
              <div class="mb-2">
                <img
                  src="{{ asset('storage/' . $article->image) }}"
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
            @isset($article) Laissez vide pour garder l'image actuelle. @endisset
          </div>
          @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-check form-switch">
          <input type="hidden" name="publie" value="0" />
          <input
            class="form-check-input"
            type="checkbox"
            role="switch"
            id="publie"
            name="publie"
            value="1"
            @checked(old('publie', isset($article) ? (int) (bool) $article->publie_le : 0))
          />
          <label class="form-check-label" for="publie">Publier cet article</label>
          <div class="form-text">Désactivé : brouillon, invisible sur le site.</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="d-flex gap-2 mb-4">
  <button type="submit" class="btn btn-primary">
    <i class="bi bi-check-lg me-1" aria-hidden="true"></i>
    {{ isset($article) ? 'Enregistrer les modifications' : "Ajouter l'article" }}
  </button>
  <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Annuler</a>
</div>

@push('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" />
  <style>
    [data-bs-theme='dark'] .ql-toolbar.ql-snow,
    [data-bs-theme='dark'] .ql-container.ql-snow {
      border-color: var(--bs-border-color);
    }
    [data-bs-theme='dark'] .ql-snow .ql-stroke { stroke: var(--bs-body-color); }
    [data-bs-theme='dark'] .ql-snow .ql-fill { fill: var(--bs-body-color); }
    [data-bs-theme='dark'] .ql-snow .ql-picker { color: var(--bs-body-color); }
    [data-bs-theme='dark'] .ql-snow .ql-picker-options { background: var(--bs-body-bg); }
    [data-bs-theme='dark'] .ql-editor.ql-blank::before { color: var(--bs-secondary-color); }
  </style>
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
  <script>
    const quill = new Quill('#editeur', {
      theme: 'snow',
      placeholder: 'Écrivez votre article…',
      modules: {
        toolbar: [
          [{ header: [2, 3, false] }],
          ['bold', 'italic', 'underline'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          ['blockquote'],
          ['link', 'clean'],
        ],
      },
    });

    const champ = document.getElementById('contenu');

    if (champ.value) {
      quill.clipboard.dangerouslyPasteHTML(champ.value);
    }

    champ.form.addEventListener('submit', () => {
      champ.value = quill.getText().trim() === '' ? '' : quill.root.innerHTML;
    });
  </script>
@endpush