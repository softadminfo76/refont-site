<?php

namespace App\Http\Controllers;

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
}