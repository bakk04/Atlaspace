<?php

namespace App\Models;

use App\Models\Commentaire;
use App\Models\Reserve;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'location',
        'days',
        'features',
        'background',
    ];

    /**
     * Relation avec les commentaires.
     * Un hôtel peut avoir plusieurs commentaires.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_hotel'); 
    }

    /**
     * Relation avec les réservations d'hôtel.
     * Un hôtel peut avoir plusieurs réservations.
     */
    public function reserves()
    {
        return $this->hasMany(Reserve::class, 'id_hotel'); 
    }
}
