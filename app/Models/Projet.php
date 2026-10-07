<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'titre_court', 'titre', 'client', 'financeur',
        'secteur', 'resume', 'detail', 'image',
    ];

    // Liste des secteurs : sert au formulaire et aux filtres
    public const SECTEURS = [
        'Administration', 'Agriculture', 'Élevage', 'Finances', 'Gouvernance',
        'Mines', 'Protection sociale', 'Santé', 'Patrimoine',
    ];
}
