<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Devis;

class ReponseDevis extends Model
{
    protected $table = 'reponses_devis';

    protected $fillable = [
        'devis_id',
        'message',
        'fichier',
    ];

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }
}