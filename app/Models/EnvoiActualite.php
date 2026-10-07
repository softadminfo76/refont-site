<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnvoiActualite extends Model
{
    protected $table = 'envois_actualites';

    protected $fillable = [
        'abonnement_actualites_id',
        'objet',
        'message',
    ];

    public function abonnementActualites(): BelongsTo
    {
        return $this->belongsTo(AbonnementActualites::class);
    }
}