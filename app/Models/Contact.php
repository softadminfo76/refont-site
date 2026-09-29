<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reponse;

class Contact extends Model
{
    protected $fillable = [
        'nom', 'email', 'telephone', 'message', 'est_lu',
    ];

    protected $casts = [
        'est_lu' => 'boolean',
    ];

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}