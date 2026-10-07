<?php

namespace App\Http\Controllers;

use App\Models\AbonnementActualites;
use Illuminate\Http\Request;

class AbonnementActualitesController extends Controller
{
    public function enregistrer(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:abonnements_actualites,email',
        ]);

        AbonnementActualites::create([
            'email' => $request->email,
        ]);

        $message = 'Merci ! Vous êtes bien abonné à nos actualités.';

        if ($request->expectsJson()) {
            return response()->json(['message' => $message]);
        }

        return back()->with('succes', $message);
            }
}