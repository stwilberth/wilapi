<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $placesData = [
            'San José' => ['San José Centro', 'Escazú', 'Santa Ana'], // Provincia => Lugares
            'Alajuela' => ['La Fortuna', 'Alajuela Centro'],
            'Puntarenas' => ['Isla Tortuga', 'Piedras Blancas', 'Jacó'],
            // Añade más provincias y sus lugares
        ];

         foreach ($placesData as $provinceName => $places) {
            $province = Province::where('name', $provinceName)->first();
            if ($province) {
                foreach ($places as $placeName) {
                    Place::create([
                        'name' => $placeName,
                        'slug' => Str::slug($placeName),
                        'province_id' => $province->id,
                    ]);
                }
            }
        }
    }
}
