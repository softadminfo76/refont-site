<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/solutions', function () {
    return view('solutions');
})->name('solutions');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/blog', function () {
    return view('post');
})->name('post.index');

Route::get('/blog/exemple', function () {
    return view('show');
})->name('post.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tables/data', [AdminContactController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('tables.data');

Route::put('/admin/contacts/{contact}', [AdminContactController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('admin.contacts.update');

Route::delete('/admin/contacts/{contact}', [AdminContactController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.contacts.destroy');

Route::put('/admin/contacts/{contact}/repondre', [ContactController::class, 'repondre'])
    ->name('admin.contacts.repondre');

    Route::get('/contacts/liste', [AdminContactController::class, 'liste'])
    ->middleware(['auth', 'verified'])
    ->name('contacts.liste');

Route::get('/contacts/{contact}', [AdminContactController::class, 'lire'])
    ->whereNumber('contact')
    ->middleware(['auth', 'verified'])
    ->name('contacts.lire');

Route::get('/contacts/{contact}/ecrire', [AdminContactController::class, 'ecrire'])
    ->whereNumber('contact')
    ->middleware(['auth', 'verified'])
    ->name('contacts.ecrire');

Route::post('/contacts/{contact}/repondre', [AdminContactController::class, 'repondre'])
    ->whereNumber('contact')
    ->middleware(['auth', 'verified'])
    ->name('contacts.repondre');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
