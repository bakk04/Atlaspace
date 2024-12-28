<?php

namespace App\Models;

use App\Models\User;
use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;

class ReserveActivite extends Model
{
    /**
     * Les attributs qui peuvent être affectés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nom_activite',
        'prix',
        'nbrHeure',
        'ville',
        'dateActivite',
        'Etat',
    ];

    /**
     * Les attributs qui doivent être masqués lors de la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Les attributs qui doivent être castés en types natifs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dateActivite' => 'datetime',
        'nbrHeure' => 'integer',
        'prix' => 'float',
    ];

    /**
     * Définir la relation avec le modèle User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Définir la relation avec le modèle Activite.
     * Une réservation d'activité est associée à une activité.
     */
    public function activite()
    {
        return $this->belongsTo(Activite::class, 'nom_activite', 'name'); 
    }
}
