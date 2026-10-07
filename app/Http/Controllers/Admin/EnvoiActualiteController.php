<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnvoiActualite;
use App\Models\AbonnementActualites;
use Illuminate\Http\Request;

class EnvoiActualiteController extends Controller
{
    // Afficher la liste des envois
    public function index()
    {
        $envois = EnvoiActualite::with('abonnementActualites')
            ->latest()
            ->get();

        return view('admin.envois_actualites.index', compact('envois'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $abonnements = AbonnementActualites::all();

        return view('admin.envois_actualites.create', compact('abonnements'));
    }

    // Enregistrer un nouvel envoi
    public function store(Request $request)
    {
        $request->validate([
            'abonnement_actualites_id' => 'required|exists:abonnements_actualites,id',
            'objet' => 'required|string|max:191',
            'message' => 'required|string',
        ]);

        EnvoiActualite::create([
            'abonnement_actualites_id' => $request->abonnement_actualites_id,
            'objet' => $request->objet,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('admin.envois-actualites.index')
            ->with('succes', 'L’actualité a été enregistrée avec succès.');
    }

    // Afficher un envoi
        public function show($id)
    {
        $envoiActualite = EnvoiActualite::findOrFail($id);

        $envoiActualite->load('abonnementActualites');

        return view('admin.envois_actualites.show', compact('envoiActualite'));
    }

    // Afficher le formulaire de modification
    public function edit(EnvoiActualite $envoiActualite)
    {
        $abonnements = AbonnementActualites::all();

        return view('admin.envois_actualites.edit', compact(
            'envoiActualite',
            'abonnements'
        ));
    }

    // Modifier un envoi
    public function update(Request $request, EnvoiActualite $envoiActualite)
    {
        $request->validate([
            'abonnement_actualites_id' => 'required|exists:abonnements_actualites,id',
            'objet' => 'required|string|max:191',
            'message' => 'required|string',
        ]);

        $envoiActualite->update([
            'abonnement_actualites_id' => $request->abonnement_actualites_id,
            'objet' => $request->objet,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('admin.envois-actualites.index')
            ->with('succes', 'L’actualité a été modifiée avec succès.');
    }

    // Supprimer un envoi
    public function destroy(EnvoiActualite $envoiActualite)
    {
        $envoiActualite->delete();

        return redirect()
            ->route('admin.envois-actualites.index')
            ->with('succes', 'L’actualité a été supprimée avec succès.');
    }
}