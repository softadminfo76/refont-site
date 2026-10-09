<?php

namespace App\Http\Controllers;

use App\Models\Departement;

class DepartementController extends Controller
{
    public function show(Departement $departement)
    {
        abort_unless($departement->actif, 404);

        $services = $departement->services()->orderBy('id')->get(['id', 'nom']);

        $autres = Departement::where('actif', true)
            ->where('id', '!=', $departement->id)
            ->orderBy('ordre')
            ->get();

        return view('departements.show', compact('departement', 'services', 'autres'));
    }
}