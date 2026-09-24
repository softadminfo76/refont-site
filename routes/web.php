<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/elements', function () {
    return view('elements');
})->name('elements');

Route::get('/blog', function () {
    return view('post');
})->name('post.index');

Route::get('/blog/exemple', function () {
    return view('show');
})->name('post.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/starter', function () {
    return view('admin-starter');
})->middleware(['auth', 'verified'])->name('admin.starter');

Route::get('/tables/simple', function () {
    return view('tables.simple');
})->middleware(['auth', 'verified'])->name('tables.simple');

Route::get('/tables/data', function () {
    return view('tables.data');
})->middleware(['auth', 'verified'])->name('tables.data');

Route::get('/solutions', function () {
    return view('solutions');
})->name('solutions');

Route::get('/ui/colors', function () {
    return view('ui.colors');
})->middleware(['auth', 'verified'])->name('ui.colors');

Route::get('/ui/general', function () {
    return view('ui.general');
})->middleware(['auth', 'verified'])->name('ui.general');

Route::get('/ui/icons', function () {
    return view('ui.icons');
})->middleware(['auth', 'verified'])->name('ui.icons');

Route::get('/ui/ribbons', function () {
    return view('ui.ribbons');
})->middleware(['auth', 'verified'])->name('ui.ribbons');

Route::get('/ui/timeline', function () {
    return view('ui.timeline');
})->middleware(['auth', 'verified'])->name('ui.timeline');

Route::get('/charts/apexcharts', function () {
    return view('charts.apexcharts');
})->middleware(['auth', 'verified'])->name('charts.apexcharts');

Route::get('/examples/forgot-password', function () {
    return view('examples.forgot-password');
})->middleware(['auth', 'verified'])->name('examples.forgot-password');

Route::get('/examples/lockscreen', function () {
    return view('examples.lockscreen');
})->middleware(['auth', 'verified'])->name('examples.lockscreen');

Route::get('/examples/login', function () {
    return view('examples.login');
})->middleware(['auth', 'verified'])->name('examples.login');

Route::get('/examples/login-v2', function () {
    return view('examples.login-v2');
})->middleware(['auth', 'verified'])->name('examples.login-v2');

Route::get('/examples/register', function () {
    return view('examples.register');
})->middleware(['auth', 'verified'])->name('examples.register');

Route::get('/examples/register-v2', function () {
    return view('examples.register-v2');
})->middleware(['auth', 'verified'])->name('examples.register-v2');

Route::get('/forms/advanced', function () {
    return view('forms.advanced');
})->middleware(['auth', 'verified'])->name('forms.advanced');

Route::get('/forms/editors', function () {
    return view('forms.editors');
})->middleware(['auth', 'verified'])->name('forms.editors');

Route::get('/forms/elements', function () {
    return view('forms.elements');
})->middleware(['auth', 'verified'])->name('forms.elements');

Route::get('/forms/layout', function () {
    return view('forms.layout');
})->middleware(['auth', 'verified'])->name('forms.layout');

Route::get('/forms/validation', function () {
    return view('forms.validation');
})->middleware(['auth', 'verified'])->name('forms.validation');

Route::get('/forms/wizard', function () {
    return view('forms.wizard');
})->middleware(['auth', 'verified'])->name('forms.wizard');

Route::get('/generate/theme', function () {
    return view('generate.theme');
})->middleware(['auth', 'verified'])->name('generate.theme');

Route::get('/index2', function () {
    return view('index2');
})->middleware(['auth', 'verified'])->name('index2');

Route::get('/index3', function () {
    return view('index3');
})->middleware(['auth', 'verified'])->name('index3');

Route::get('/layout/collapsed-sidebar', function () {
    return view('layout.collapsed-sidebar');
})->middleware(['auth', 'verified'])->name('layout.collapsed-sidebar');

Route::get('/layout/collapsed-sidebar-without-hover', function () {
    return view('layout.collapsed-sidebar-without-hover');
})->middleware(['auth', 'verified'])->name('layout.collapsed-sidebar-without-hover');

Route::get('/layout/fixed-complete', function () {
    return view('layout.fixed-complete');
})->middleware(['auth', 'verified'])->name('layout.fixed-complete');

Route::get('/layout/fixed-footer', function () {
    return view('layout.fixed-footer');
})->middleware(['auth', 'verified'])->name('layout.fixed-footer');

Route::get('/layout/fixed-header', function () {
    return view('layout.fixed-header');
})->middleware(['auth', 'verified'])->name('layout.fixed-header');

Route::get('/layout/fixed-sidebar', function () {
    return view('layout.fixed-sidebar');
})->middleware(['auth', 'verified'])->name('layout.fixed-sidebar');

Route::get('/layout/layout-custom-area', function () {
    return view('layout.layout-custom-area');
})->middleware(['auth', 'verified'])->name('layout.layout-custom-area');

Route::get('/layout/layout-rtl', function () {
    return view('layout.layout-rtl');
})->middleware(['auth', 'verified'])->name('layout.layout-rtl');

Route::get('/layout/logo-switch', function () {
    return view('layout.logo-switch');
})->middleware(['auth', 'verified'])->name('layout.logo-switch');

Route::get('/layout/sidebar-mini', function () {
    return view('layout.sidebar-mini');
})->middleware(['auth', 'verified'])->name('layout.sidebar-mini');

Route::get('/layout/top-nav', function () {
    return view('layout.top-nav');
})->middleware(['auth', 'verified'])->name('layout.top-nav');

Route::get('/layout/unfixed-sidebar', function () {
    return view('layout.unfixed-sidebar');
})->middleware(['auth', 'verified'])->name('layout.unfixed-sidebar');

Route::get('/mailbox/compose', function () {
    return view('mailbox.compose');
})->middleware(['auth', 'verified'])->name('mailbox.compose');

Route::get('/mailbox/inbox', function () {
    return view('mailbox.inbox');
})->middleware(['auth', 'verified'])->name('mailbox.inbox');

Route::get('/mailbox/read', function () {
    return view('mailbox.read');
})->middleware(['auth', 'verified'])->name('mailbox.read');

Route::get('/pages/404', function () {
    return view('pages.404');
})->middleware(['auth', 'verified'])->name('pages.404');

Route::get('/pages/500', function () {
    return view('pages.500');
})->middleware(['auth', 'verified'])->name('pages.500');

Route::get('/pages/calendar', function () {
    return view('pages.calendar');
})->middleware(['auth', 'verified'])->name('pages.calendar');

Route::get('/pages/chat', function () {
    return view('pages.chat');
})->middleware(['auth', 'verified'])->name('pages.chat');

Route::get('/pages/faq', function () {
    return view('pages.faq');
})->middleware(['auth', 'verified'])->name('pages.faq');

Route::get('/pages/file-manager', function () {
    return view('pages.file-manager');
})->middleware(['auth', 'verified'])->name('pages.file-manager');

Route::get('/pages/gallery', function () {
    return view('pages.gallery');
})->middleware(['auth', 'verified'])->name('pages.gallery');

Route::get('/pages/invoice', function () {
    return view('pages.invoice');
})->middleware(['auth', 'verified'])->name('pages.invoice');

Route::get('/pages/kanban', function () {
    return view('pages.kanban');
})->middleware(['auth', 'verified'])->name('pages.kanban');

Route::get('/pages/maintenance', function () {
    return view('pages.maintenance');
})->middleware(['auth', 'verified'])->name('pages.maintenance');

Route::get('/pages/pricing', function () {
    return view('pages.pricing');
})->middleware(['auth', 'verified'])->name('pages.pricing');

Route::get('/pages/profile', function () {
    return view('pages.profile');
})->middleware(['auth', 'verified'])->name('pages.profile');

Route::get('/pages/projects', function () {
    return view('pages.projects');
})->middleware(['auth', 'verified'])->name('pages.projects');

Route::get('/pages/search-results', function () {
    return view('pages.search-results');
})->middleware(['auth', 'verified'])->name('pages.search-results');

Route::get('/pages/settings', function () {
    return view('pages.settings');
})->middleware(['auth', 'verified'])->name('pages.settings');

Route::get('/starter', function () {
    return view('starter');
})->middleware(['auth', 'verified'])->name('starter');

Route::get('/tables/data', function () {
    return view('tables.data');
})->middleware(['auth', 'verified'])->name('tables.data');

Route::get('/tables/simple', function () {
    return view('tables.simple');
})->middleware(['auth', 'verified'])->name('tables.simple');

Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/widgets/cards', function () {
    return view('widgets.cards');
})->middleware(['auth', 'verified'])->name('widgets.cards');

Route::get('/widgets/info-box', function () {
    return view('widgets.info-box');
})->middleware(['auth', 'verified'])->name('widgets.info-box');

Route::get('/widgets/small-box', function () {
    return view('widgets.small-box');
})->middleware(['auth', 'verified'])->name('widgets.small-box');

Route::get('/widgets/social', function () {
    return view('widgets.social');
})->middleware(['auth', 'verified'])->name('widgets.social');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';