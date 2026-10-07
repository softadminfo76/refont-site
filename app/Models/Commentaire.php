<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = ['article_id', 'nom', 'email', 'message', 'approuve'];

    protected $casts = ['approuve' => 'boolean'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
