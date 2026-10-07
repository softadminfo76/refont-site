<?php

namespace App\Http\Controllers;

use App\Models\ReponseDevis;
use Illuminate\Http\Request;

class ReponseDevisController extends Controller
{
public function store(Request $request)
{
    $validated = $request->validate([
        'devis_id' => 'required|exists:devis,id',
        'message' => 'required|string',
        'fichier' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
    ]);

    if (!$request->filled('message') && !$request->hasFile('fichier')) {
        return back()
            ->withErrors([
                'message' => 'Veuillez saisir une réponse ou joindre un fichier.'
            ])
            ->withInput();
    }

    if ($request->hasFile('fichier')) {
        $validated['fichier'] = $request->file('fichier')->store('reponses-devis', 'public');
    }

    ReponseDevis::create($validated);

    return redirect()
    ->route('admin.devis.sent')
    ->with('success', 'La réponse a bien été enregistrée.');

}

}