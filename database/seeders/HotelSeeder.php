<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'name' => 'Hôtel Marrakech',
                'price' => '2000 MAD/personne',
                'location' => 'Marrakech, Maroc',
                'days' => '3 Jours / 2 Nuits',
                'features' => '2 Salles de bain, 3 Chambres, Vue sur les montagnes',
                'background' => 'frontend/images/hotel-resto-1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hôtel Essaouira',
                'price' => '1500 MAD/personne',
                'location' => 'Essaouira, Maroc',
                'days' => '2 Jours / 1 Nuit',
                'features' => '1 Salle de bain, 2 Chambres, Proche de la plage',
                'background' => 'frontend/images/hotelEssaouira.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hôtel Rabat',
                'price' => '3500 MAD/personne',
                'location' => 'Rabat, Maroc',
                'days' => '2 Jours / 2 Nuits',
                'features' => '1 Salle de bain, 2 Chambres, Vue sur les montagnes',
                'background' => 'frontend/images/hotelRabat.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
