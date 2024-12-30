<?php

namespace App\Models;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    /**
     * Les attributs qui peuvent être affectés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_hotel',  // Lien avec l'hôtel
        'user_name', // Si tu souhaites toujours garder le nom de l'utilisateur
        'content',   // Le contenu du commentaire
    ];

    /**
     * Relation avec l'utilisateur qui a laissé le commentaire.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec l'hôtel auquel ce commentaire est associé.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }
}