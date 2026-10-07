<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProjetAdminController extends Controller
{
    private function regles(): array
    {
        return [
            'titre_court' => 'required|string|max:120',
            'titre'       => 'required|string',
            'client'      => 'required|string|max:255',
            'financeur'   => 'nullable|string|max:255',
            'secteur'     => ['required', Rule::in(Projet::SECTEURS)],
            'resume'      => 'required|string|max:400',
            'detail'      => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ];
    }

    public function index()
    {
        $projets = Projet::latest()->paginate(15);

        return view('admin.projets.index', compact('projets'));
    }

    public function create()
    {
        return view('admin.projets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->regles());

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projets', 'public');
        }

        Projet::create($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet ajouté.');
    }

    public function edit(Projet $projet)
    {
        return view('admin.projets.edit', compact('projet'));
    }

    public function update(Request $request, Projet $projet)
    {
        $data = $request->validate($this->regles());

        if ($request->hasFile('image')) {
            if ($projet->image) {
                Storage::disk('public')->delete($projet->image);
            }
            $data['image'] = $request->file('image')->store('projets', 'public');
        } else {
            unset($data['image']); // on garde l'image actuelle
        }

        $projet->update($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet modifié.');
    }

    public function destroy(Projet $projet)
    {
        if ($projet->image) {
            Storage::disk('public')->delete($projet->image);
        }
        $projet->delete();

        return back()->with('success', 'Projet supprimé.');
    }
}