<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('tables.data', compact('contacts'));
    }

    public function update(Request $request, Contact $contact)
    {
        $donnees = $request->validate([
            'nom'       => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:255'],
            'message'   => ['required', 'string'],
        ]);

        $contact->update($donnees);

        return response()->json(['message' => 'Contact modifié.']);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json(['message' => 'Contact supprimé.']);
    }

    public function lire(Contact $contact)
    {
        if (! $contact->est_lu) {
            $contact->update(['est_lu' => true]);
        }

        return view('admin.contacts.lire', compact('contact'));
    }

    public function ecrire(Contact $contact)
    {
        return view('admin.contacts.ecrire', compact('contact'));
    }

    public function repondre(Request $request, Contact $contact)
    {
        $donnees = $request->validate([
            'reponse' => ['required', 'string'],
        ]);

        $contact->reponses()->create([
            'reponse' => $donnees['reponse'],
            'etat'    => 'en_attente',
        ]);

        return redirect()
        ->route('contacts.liste')
        ->with('succes', 'Réponse enregistrée.');
        }

    public function liste()
    {
        $contacts = Contact::latest()->paginate(15);
        $nonLus   = Contact::where('est_lu', false)->count();

        return view('admin.contacts.liste', compact('contacts', 'nonLus'));
    }

    public function sent()
    {
        $contacts = Contact::whereHas('reponses')
            ->with('reponses')
            ->latest()
            ->paginate(15);

        return view('admin.contacts.envoyes', compact('contacts'));
    }

    public function showSent(Contact $contact)
    {
        $contact->load('reponses');

        return view('admin.contacts.envoyes-show', compact('contact'));
    }

    
}
