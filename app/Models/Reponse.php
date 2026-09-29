<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Reponse extends Model
{
    protected $fillable = [
    'contact_id',
    'reponse',
    'etat',
];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
