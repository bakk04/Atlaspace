<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Activités pour Rabat
        DB::table('activites')->insert([
            [
                'name' => 'Tour en bateau au coucher de soleil et dîner marocain',
                'id_ville' => 1, // Rabat
                'nbrHeure' => 2,
                'dateActivite' => now(),
                'prix' => 969.00,
                'background' => 'frontend/images/activite_Rabat2.jpg',
                'lien_google_maps' => 'Bouragrag Rabat'
            ],
            [
                'name' => 'Visite guidée des monuments historiques de Rabat',
                'id_ville' => 1, // Rabat
                'nbrHeure' => 3,
                'dateActivite' => now(),
                'prix' => 350.00,
                'background' => 'frontend/images/activite_Rabat3.jpg',
                'lien_google_maps' => 'Kasbah des Oudayas Rabat'
            ]
        ]);

        // Activités pour Marrakech
        DB::table('activites')->insert([
            [
                'name' => 'Excursion dans le désert d\'Agafay',
                'id_ville' => 2, // Marrakech
                'nbrHeure' => 4,
                'dateActivite' => now(),
                'prix' => 1200.00,
                'background' => 'frontend/images/activite_Marrakech1.jpg',
                'lien_google_maps' => 'Désert d\'Agafay Marrakech'
            ],
            [
                'name' => 'Visite du Jardin Majorelle et musée Yves Saint Laurent',
                'id_ville' => 2, // Marrakech
                'nbrHeure' => 2,
                'dateActivite' => now(),
                'prix' => 300.00,
                'background' => 'frontend/images/activite_Marrakech2.jpg',
                'lien_google_maps' => 'Jardin Majorelle Marrakech'
            ]
        ]);

        // Activités pour Tanger
        DB::table('activites')->insert([
            [
                'name' => 'Balade en mer à Tanger',
                'id_ville' => 3, // Tanger
                'nbrHeure' => 2,
                'dateActivite' => now(),
                'prix' => 700.00,
                'background' => 'frontend/images/activite_Tanger1.jpg',
                'lien_google_maps' => 'Plage de Tanger'
            ],
            [
                'name' => 'Visite des grottes d\'Hercule',
                'id_ville' => 3, // Tanger
                'nbrHeure' => 3,
                'dateActivite' => now(),
                'prix' => 500.00,
                'background' => 'frontend/images/activite_Tanger2.jpg',
                'lien_google_maps' => 'Grottes d\'Hercule Tanger'
            ],
            [
                'name' => 'Découverte de la médina de Tanger',
                'id_ville' => 3, // Tanger
                'nbrHeure' => 2,
                'dateActivite' => now(),
                'prix' => 250.00,
                'background' => 'frontend/images/activite_Tanger3.jpg',
                'lien_google_maps' => 'Médina de Tanger'
            ]
        ]);
    }
}