<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartementAdminController extends Controller
{
    private function regles(): array
    {
        return [
            'nom'    => 'required|string|max:120',
            'icone'  => 'nullable|string|max:60',
            'resume' => 'required|string|max:600',
            'detail' => 'nullable|string',
            'ordre'  => 'nullable|integer|min:0|max:999',
        ];
    }

    public function index()
    {
        $departements = Departement::withCount('services')->orderBy('ordre')->get();

        return view('admin.departements.index', compact('departements'));
    }

    public function create()
{
       return view('admin.departements.create');
}

    public function store(Request $request)
    {
        $data = $request->validate($this->regles());

        $data['actif'] = $request->boolean('actif');
        $data['ordre'] = $data['ordre'] ?? 0;
        $data['slug']  = $this->slugUnique($data['nom']);

        Departement::create($data);

        return redirect()->route('departements.index')
    ->with('success', 'Département ajouté.');
    }

    public function edit(Departement $departement)
    {
        return view('admin.departements.edit', compact('departement'));
    }

    public function update(Request $request, Departement $departement)
    {
        $data = $request->validate($this->regles());

        $data['actif'] = $request->boolean('actif');
        $data['ordre'] = $data['ordre'] ?? 0;

        // Le slug ne change pas, pour que l'adresse de la page reste stable
        $departement->update($data);

        return redirect()->route('departements.index')->with('success', 'Département modifié.');
    }

    public function destroy(Departement $departement)
    {
        // Les services rattachés ne sont pas supprimés : leur département devient « aucun »
        $departement->delete();

        return back()->with('success', 'Département supprimé.');
    }

    private function slugUnique(string $nom): string
    {
        $base = Str::slug($nom);
        $slug = $base;
        $i = 2;

        while (Departement::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}