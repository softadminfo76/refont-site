<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:50',
            'entreprise' => 'nullable|string|max:255',
            'objet' => 'required|string|max:255',
            'description' => 'required|string',
            'delai' => 'nullable|string|max:100',
            'ville' => 'nullable|string|max:255',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        Devis::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Votre demande de devis a bien été envoyée.'
        ]);
    }

    public function sent()
    {
        $devis = Devis::whereHas('reponses')
            ->with('reponses')
            ->latest()
            ->paginate(10);

        return view('admin.devis.sent', compact('devis'));
    }
}