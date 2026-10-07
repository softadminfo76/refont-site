<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'         => 'required|string|max:255|unique:services,nom',
            'description' => 'required|string',
            'detail' => 'nullable|string',
            'icone'       => ['nullable', Rule::in(array_keys(Service::ICONES))],
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'nom'         => $request->nom,
            'description' => $request->description,
            'detail' => $request->detail,
            'icone'       => $request->icone,
            'image'       => $imagePath,
            
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service ajouté avec succès.');
    }

    public function show(Service $service)
    {
        $autresServices = Service::where('id', '!=', $service->id)
            ->latest()
            ->get();

        return view('services.show', compact('service', 'autresServices'));
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom'         => ['required', 'string', 'max:255', Rule::unique('services', 'nom')->ignore($id)],
            'description' => 'required|string',
            'detail' => 'nullable|string',
            'icone'       => ['nullable', Rule::in(array_keys(Service::ICONES))],
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            
        ]);

        $service = Service::findOrFail($id);

        $data = [
            'nom'         => $request->nom,
            'description' => $request->description,
            'detail' => $request->detail,
            'icone'       => $request->icone,
        ];

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('services.index')
            ->with('success', 'Service modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service supprimé avec succès.');
    }
}