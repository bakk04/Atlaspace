<?php

namespace App\Models;

use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    /**
     * Les attributs qui peuvent être affectés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'postal_code',
        'region',
    ];

    /**
     * Les attributs qui doivent être masqués lors de la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Les attributs qui doivent être castés en types natifs.
     *
     * @var array<string, string>
     */

    /**
     * Relation entre Ville et Activité.
     * Une ville peut avoir plusieurs activités.
     */
    public function activites()
    {
        return $this->hasMany(Activite::class);
    }
}