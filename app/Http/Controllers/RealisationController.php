<?php

namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealisationController extends Controller
{
    public function index()
    {
        $realisations = Realisation::orderBy('ordre')->get();
        return view('admin.realisations.index', compact('realisations'));
    }

    public function create()
    {
        return view('admin.realisations.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('realisations', 'public');
        }
        $data['actif'] = $request->boolean('actif');

        Realisation::create($data);

        return redirect()->route('realisations.index')
            ->with('success', 'Réalisation ajoutée.');
    }

    public function edit(Realisation $realisation)
    {
        return view('admin.realisations.edit', compact('realisation'));
    }

    public function update(Request $request, Realisation $realisation)
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            if ($realisation->logo) {
                Storage::disk('public')->delete($realisation->logo);
            }
            $data['logo'] = $request->file('logo')->store('realisations', 'public');
        }
        $data['actif'] = $request->boolean('actif');

        $realisation->update($data);

        return redirect()->route('realisations.index')
            ->with('success', 'Réalisation modifiée.');
    }

    public function destroy(Realisation $realisation)
    {
        if ($realisation->logo) {
            Storage::disk('public')->delete($realisation->logo);
        }
        $realisation->delete();

        return redirect()->route('realisations.index')
            ->with('success', 'Réalisation supprimée.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'titre'           => 'required|string|max:255',
            'description'     => 'required|string',
            'fonctionnalites' => 'nullable|string',
            'lien'            => 'nullable|url',
            'ordre'           => 'nullable|integer|min:0',
            'logo'            => 'nullable|image|max:2048',
        ]);

        $data['ordre'] = $data['ordre'] ?? 0;

        return $data;
    }
}