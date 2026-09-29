<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $donnees = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        Contact::create($donnees);

        return response()->json([
    'message' => 'Votre message a bien été envoyé.',
]);
    }
    
    public function repondre(Request $request, Contact $contact)
    {
        $donnees = $request->validate([
            'message' => ['required', 'string'],
        ]);

        $contact->reponses()->create([
            'message' => $donnees['message'],
        ]);

        return response()->json([
            'message' => 'Réponse enregistrée avec succès.',
        ]);
    }
}