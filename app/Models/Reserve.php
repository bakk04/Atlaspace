<?php

namespace App\Models;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    /**
     * Les attributs qui peuvent être affectés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'prix',
        'nom_hotel',
        'email',
        'phone',
        'arrival_date',
        'nights',
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
        'arrival_date' => 'datetime',  // Cast de la date d'arrivée
    ];

    /**
     * Définir la relation avec le modèle User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le modèle Hotel.
     * Une réservation appartient à un seul hôtel.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'nom_hotel');
    }
}
