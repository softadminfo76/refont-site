<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbonnementActualites extends Model
{
    protected $table = 'abonnements_actualites';

    protected $fillable = [
        'email',
    ];

    public function envoisActualites(): HasMany
    {
        return $this->hasMany(EnvoiActualite::class);
    }
}