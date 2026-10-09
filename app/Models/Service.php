<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'image',
        'detail',
        'icone',
        'departement_id',
    ];
    
    public function departement()
{
    return $this->belongsTo(Departement::class);
}

    public const ICONES = [
    'fa fa-code'           => 'Code (développement)',
    'fa fa-cogs'           => 'Engrenages (application métier)',
    'fa fa-globe'          => 'Globe (site web)',
    'fa fa-bullhorn'       => 'Mégaphone (marketing)',
    'fa fa-refresh'        => 'Flèches circulaires (refonte)',
    'fa fa-graduation-cap' => 'Chapeau de diplômé (formation)',
    'fa fa-mobile'         => 'Mobile',
    'fa fa-desktop'        => 'Ordinateur',
    'fa fa-database'       => 'Base de données',
    'fa fa-shield'         => 'Sécurité',
    'fa fa-cloud'          => 'Cloud',
    'fa fa-users'          => 'Équipe',
    'fa fa-search'   => 'Loupe (audit, conseil)',
    'fa fa-calendar' => 'Calendrier (évènementiel)',
    'fa fa-wrench'   => 'Clé (assistance technique)',
];
}