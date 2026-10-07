<?php

namespace App\Http\Controllers;

use App\Models\Projet;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::latest()->get();
        $secteurs = $projets->pluck('secteur')->unique()->sort()->values();

        return view('projets.index', compact('projets', 'secteurs'));
    }

    public function show(Projet $projet)
    {
        $autresProjets = Projet::where('id', '!=', $projet->id)
            ->latest()
            ->take(3)
            ->get();

        return view('projets.show', compact('projet', 'autresProjets'));
    }
}