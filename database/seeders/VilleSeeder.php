<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('villes')->insert([
        [
            'name' => 'Rabat',
            'postal_code' => '1000',
            'region' => 'Rabat-Sale-Kenitra',
        ],
        [
            'name' => 'Marrakech',
            'postal_code' => '40000',
            'region' => 'Marrakech-Safi',
        ],
        [
            'name' => 'Tanger',
            'postal_code' => '90000',
            'region' => 'Tanger-Tetouan-Al Hoceima',
        ],
        [
            'name' => 'Casablanca',
            'postal_code' => '20000',
            'region' => 'Casablanca-Settat',
        ],
        [
            'name' => 'Agadir',
            'postal_code' => '80000',
            'region' => 'Souss-Massa',
        ],
    ]);
}

}
