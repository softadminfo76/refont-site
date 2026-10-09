<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('partials.nav', function ($view) {
            $view->with('navServices', Service::orderBy('id')->get(['id', 'nom']));
        });
    }
}