<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ville_id',  // Utilisation de la convention 'ville_id'
        'nbrHeure',
        'dateActivite',
        'lien_google_maps',
        'prix',
        'background',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dateActivite' => 'datetime', 
        'nbrHeure' => 'integer',      
        'prix' => 'float',            
    ];

    /**
     * Relation avec le modèle Ville.
     */
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}
