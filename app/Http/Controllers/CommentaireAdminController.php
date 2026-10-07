<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireAdminController extends Controller
{
    public function index(Request $request)
    {
        $statut = $request->query('statut', 'attente');

        $query = Commentaire::with('article')->latest();

        if ($statut === 'attente') {
            $query->where('approuve', false);
        } elseif ($statut === 'approuves') {
            $query->where('approuve', true);
        }

        $commentaires = $query->paginate(15)->withQueryString();
        $enAttente = Commentaire::where('approuve', false)->count();

        return view('admin.commentaires.index', compact('commentaires', 'statut', 'enAttente'));
    }

    public function approuver(Commentaire $commentaire)
    {
        $commentaire->update(['approuve' => ! $commentaire->approuve]);

        return back()->with('success', $commentaire->approuve
            ? 'Commentaire approuvé : il est maintenant visible sur le site.'
            : 'Commentaire retiré du site.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return back()->with('success', 'Commentaire supprimé.');
    }
}