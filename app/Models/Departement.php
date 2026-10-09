<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['nom', 'slug', 'icone', 'resume', 'detail', 'ordre', 'actif'];

    protected $casts = ['actif' => 'boolean'];

    // L'adresse utilise le slug : /departements/consulting
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}