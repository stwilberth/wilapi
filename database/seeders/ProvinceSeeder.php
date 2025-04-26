<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $provincesData = [
            'Costa Rica' => ['San José', 'Alajuela', 'Cartago', 'Heredia', 'Guanacaste', 'Puntarenas', 'Limón'],
            'Panamá' => ['Bocas del Toro', 'Chiriquí', 'Coclé', 'Colón', 'Darién', 'Herrera', 'Los Santos', 'Panamá', 'Panamá Oeste', 'Veraguas'],
            // Añade más países y sus provincias aquí
        ];

        foreach ($provincesData as $countryName => $provinces) {
            $country = Country::where('name', $countryName)->first();
            if ($country) {
                foreach ($provinces as $provinceName) {
                    Province::create([
                        'name' => $provinceName,
                        'slug' => Str::slug($provinceName),
                        'country_id' => $country->id,
                    ]);
                }
            }
        }
    }
}
