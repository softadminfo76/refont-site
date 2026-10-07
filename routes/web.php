<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CommentaireAdminController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\ReponseDevisController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ProjetAdminController;

// Contrôleur PUBLIC de l'abonnement (celui qui a la méthode enregistrer)
use App\Http\Controllers\AbonnementActualitesController;

// Contrôleurs du BACK OFFICE
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DevisController as AdminDevisController;
use App\Http\Controllers\Admin\AbonnementActualitesController as AdminAbonnementActualitesController;
use App\Http\Controllers\Admin\EnvoiActualiteController;

use App\Models\Realisation;
use App\Models\Service;
use App\Models\Article;


/*
|--------------------------------------------------------------------------
| PAGES PUBLIQUES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $realisations = Realisation::where('actif', true)
        ->orderBy('ordre')
        ->orderBy('id')
        ->get();

    $articles = Article::publies()->take(3)->get();

    return view('home', compact('realisations', 'articles'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    $services = Service::orderBy('id')->get();
    return view('services', compact('services'));
})->name('services');

Route::get('/services/{service}', [ServiceController::class, 'show'])
    ->whereNumber('service')
    ->name('services.show');

Route::get('/solutions', function () {
    $realisations = Realisation::where('actif', true)
        ->orderBy('ordre')
        ->orderBy('id')
        ->get();

    return view('solutions', compact('realisations'));
})->name('solutions');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/projets', [ProjetController::class, 'index'])->name('projets.index');
Route::get('/projets/{projet}', [ProjetController::class, 'show'])->name('projets.show');

Route::get('/blog', function () {
    $articles = Article::publies()
        ->when(request('categorie'), fn ($q, $categorie) => $q->where('categorie', $categorie))
        ->when(request('q'), fn ($q, $mot) => $q->where(
            fn ($r) => $r->where('titre', 'like', "%{$mot}%")->orWhere('extrait', 'like', "%{$mot}%")
        ))
        ->paginate(9)
        ->withQueryString();

    $recents = Article::publies()->take(3)->get();

    $categories = Article::publies()
        ->reorder()
        ->selectRaw('categorie, count(*) as total')
        ->groupBy('categorie')
        ->orderBy('categorie')
        ->get();

    return view('post', compact('articles', 'recents', 'categories'));
})->name('post.index');

Route::get('/blog/{article:slug}', function (Article $article) {
    abort_unless($article->publie_le && $article->publie_le->isPast(), 404);

    $recents = Article::publies()->where('id', '!=', $article->id)->take(3)->get();

    $categories = Article::publies()
        ->reorder()
        ->selectRaw('categorie, count(*) as total')
        ->groupBy('categorie')
        ->orderBy('categorie')
        ->get();

    return view('show', compact('article', 'recents', 'categories'));
})->name('post.show');


/*
|--------------------------------------------------------------------------
| FORMULAIRES PUBLICS (ouverts aux visiteurs)
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/devis', [DevisController::class, 'store'])->name('devis.store');

Route::post('/abonnement-actualites', [AbonnementActualitesController::class, 'enregistrer'])
    ->name('abonnement.actualites');

Route::post('/blog/{article}/commentaires', [CommentaireController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('post.comment');


/*
|--------------------------------------------------------------------------
| BACK OFFICE (réservé aux utilisateurs connectés)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Contacts
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/tables/data', [AdminContactController::class, 'index'])->name('tables.data');

    Route::put('/admin/contacts/{contact}', [AdminContactController::class, 'update'])->name('admin.contacts.update');
    Route::delete('/admin/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');

    Route::get('/contacts/liste', [AdminContactController::class, 'liste'])->name('contacts.liste');

    Route::get('/contacts/{contact}', [AdminContactController::class, 'lire'])
        ->whereNumber('contact')
        ->name('contacts.lire');

    Route::get('/contacts/{contact}/ecrire', [AdminContactController::class, 'ecrire'])
        ->whereNumber('contact')
        ->name('contacts.ecrire');

    Route::post('/contacts/{contact}/repondre', [AdminContactController::class, 'repondre'])
        ->whereNumber('contact')
        ->name('contacts.repondre');
});

// Tout le reste du back office
Route::middleware('auth')->group(function () {

    // Contacts envoyés et réponses
    Route::get('/admin/contacts/envoyes', [AdminContactController::class, 'sent'])->name('contacts.envoyes');
    Route::get('/admin/contacts/envoyes/{contact}', [AdminContactController::class, 'showSent'])->name('contacts.envoyes.show');
    Route::put('/admin/contacts/{contact}/repondre', [ContactController::class, 'repondre'])->name('admin.contacts.repondre');

    // Commentaires du blog
    Route::get('commentaires', [CommentaireAdminController::class, 'index'])->name('commentaires.index');
    Route::patch('commentaires/{commentaire}/approuver', [CommentaireAdminController::class, 'approuver'])->name('commentaires.approuver');
    Route::delete('commentaires/{commentaire}', [CommentaireAdminController::class, 'destroy'])->name('commentaires.destroy');

    // Abonnés aux actualités
    Route::get('/abonnements-actualites/liste', [AdminAbonnementActualitesController::class, 'liste'])->name('abonnements_actualites.liste');
    Route::get('/abonnements-actualites/ecrire', [AdminAbonnementActualitesController::class, 'ecrire'])->name('abonnements_actualites.ecrire');
    Route::post('/abonnements-actualites/envoyer', [AdminAbonnementActualitesController::class, 'envoyer'])->name('abonnements_actualites.envoyer');

    // Devis
    Route::post('/reponses-devis', [ReponseDevisController::class, 'store'])->name('reponses-devis.store');
    Route::get('/admin/devis', [AdminDevisController::class, 'index'])->name('admin.devis.index');
    Route::get('/admin/devis/envoyes', [AdminDevisController::class, 'sent'])->name('admin.devis.sent');
    Route::get('/admin/devis/envoyes/{id}', [AdminDevisController::class, 'showSent'])->name('admin.devis.sent.show');
    Route::get('/admin/devis/{id}', [AdminDevisController::class, 'show'])->name('admin.devis.show');

    // Réalisations, services, articles (URL en /admin/...)
    Route::prefix('admin')->group(function () {
        Route::resource('realisations', RealisationController::class)->except('show');
        Route::resource('services', ServiceController::class)->except('show');
        Route::resource('articles', ArticleController::class)->except('show');
    });

    // Envois d'actualités et projets (noms en admin.*)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('envois-actualites', EnvoiActualiteController::class);
        Route::resource('projets', ProjetAdminController::class)->except('show');
    });

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';