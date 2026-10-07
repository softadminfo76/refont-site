<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devis;
use App\Models\ReponseDevis;

class DevisController extends Controller
{
    public function index()
    {
        $devis = Devis::latest()->paginate(10);

        $nonLus = Devis::where('est_lu', false)->count();

        $devisEnvoyes = ReponseDevis::distinct('devis_id')->count('devis_id');

        return view('admin.devis.index', compact(
            'devis',
            'nonLus',
            'devisEnvoyes'
        ));
    }

    public function show($id)
    {
        $devis = Devis::findOrFail($id);

        if (!$devis->est_lu) {
            $devis->update([
                'est_lu' => true
            ]);
        }

        return view('admin.devis.show', compact('devis'));
    }

    public function sent()
    {
        $devis = Devis::whereHas('reponses')
            ->with('reponses')
            ->latest()
            ->paginate(10);

        return view('admin.devis.sent', compact('devis'));
    }

    public function showSent($id)
    {
        $devis = Devis::with('reponses')->findOrFail($id);

        return view('admin.devis.sent-show', compact('devis'));
    }
}