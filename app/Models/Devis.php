<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ReponseDevis;

class Devis extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'entreprise',
        'objet',
        'description',
        'delai',
        'ville',
        'fichier',
        'est_lu',
    ];

    public function reponses()
    {
        return $this->hasMany(ReponseDevis::class);
    }
}
