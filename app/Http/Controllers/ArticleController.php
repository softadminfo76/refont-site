<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['slug'] = $this->slugUnique($data['titre']);
        $data['publie_le'] = $request->boolean('publie') ? now() : null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('articles.index')
            ->with('success', 'Article ajouté.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $this->validated($request);

        if ($request->boolean('publie')) {
            $data['publie_le'] = $article->publie_le ?? now();
        } else {
            $data['publie_le'] = null;
        }

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('articles.index')
            ->with('success', 'Article modifié.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article supprimé.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'titre'     => 'required|string|max:255',
            'categorie' => ['required', Rule::in(Article::CATEGORIES)],
            'extrait'   => 'required|string|max:300',
            'contenu'   => 'required|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    }

    private function slugUnique(string $titre): string
    {
        $base = Str::slug($titre) ?: 'article';
        $slug = $base;
        $i = 2;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}