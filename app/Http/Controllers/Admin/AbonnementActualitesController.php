<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbonnementActualites;
use App\Models\EnvoiActualite;
use Illuminate\Http\Request;

class AbonnementActualitesController extends Controller
{
    // Afficher la liste des abonnés
    public function liste()
    {
        $abonnements = AbonnementActualites::latest()->paginate(10);

        return view('admin.abonnements_actualites.liste', compact('abonnements'));
    }

    // Afficher le formulaire pour écrire une actualité
    public function ecrire()
    {
        $nombreAbonnes = AbonnementActualites::count();

        return view('admin.abonnements_actualites.ecrire', compact('nombreAbonnes'));
    }

    // Envoyer l'actualité
    public function envoyer(Request $request)
{
    $request->validate([
        'objet' => 'required|string|max:191',
        'message' => 'required|string',
    ]);

    $abonnements = AbonnementActualites::all();

    if ($abonnements->isEmpty()) {
        return back()->with('error', 'Aucun abonné aux actualités.');
    }

    foreach ($abonnements as $abonnement) {
        EnvoiActualite::create([
            'abonnement_actualites_id' => $abonnement->id,
            'objet' => $request->objet,
            'message' => $request->message,
        ]);
    }

    return redirect()
        ->route('abonnements_actualites.liste')
        ->with('succes', 'L’actualité a été enregistrée pour tous les abonnés.');
}
}