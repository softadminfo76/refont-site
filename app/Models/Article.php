<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public const CATEGORIES = ['Développement', 'Digital', 'Technologie'];

    protected $fillable = [
        'titre', 'slug', 'categorie', 'extrait', 'contenu', 'image', 'publie_le',
    ];

    protected $casts = [
        'publie_le' => 'datetime',
    ];

    public function scopePublies(Builder $query): Builder
    {
        return $query->whereNotNull('publie_le')
            ->where('publie_le', '<=', now())
            ->orderByDesc('publie_le');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function commentairesApprouves()
    {
        return $this->hasMany(Commentaire::class)->where('approuve', true)->latest();
    }
}