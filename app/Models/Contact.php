<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'nom', 'email', 'telephone', 'message', 'est_lu',
    ];

    protected $casts = [
        'nom', 'email', 'telephone', 'service', 'message',
    ];
}