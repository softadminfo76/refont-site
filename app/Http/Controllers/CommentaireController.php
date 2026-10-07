<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request, Article $article)
    {
        // Champ piège : un humain ne le voit pas, un robot le remplit
        if ($request->filled('website')) {
            return back();
        }

        $data = $request->validate([
            'nom'     => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'message' => 'required|string|min:5|max:2000',
        ]);

        Commentaire::create($data + ['article_id' => $article->id]);

        return redirect(route('post.show', $article->slug) . '#commentaires')
            ->with('success', 'Merci ! Votre commentaire sera publié après validation.');
    }
}