<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
            'titre',
            'auteur',
            'editeur',
            'url',
            'publication',
            'isbn',
            'categorie_id',
            'rayon_id',
            'page',
            'description'
    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }
}
