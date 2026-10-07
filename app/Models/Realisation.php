<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{
    protected $fillable = [
        'titre', 'description', 'fonctionnalites',
        'logo', 'lien', 'ordre', 'actif',
    ];

    protected $casts = ['actif' => 'boolean'];

    public function getListeFonctionnalitesAttribute(): array
    {
        $lignes = preg_split('/\r\n|\r|\n/', (string) $this->fonctionnalites);

        return array_values(array_filter(array_map('trim', $lignes)));
    }
}

