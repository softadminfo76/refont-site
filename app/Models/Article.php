<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'titre', 'slug', 'categorie', 'extrait', 'contenu', 'image', 'publie_le',
    ];

    protected $casts = [
        'publie_le' => 'datetime',
    ];
}