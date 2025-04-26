<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $countries = [
            ['name' => 'Costa Rica'],
            ['name' => 'Panamá'],
            ['name' => 'Nicaragua'],
            ['name' => 'Honduras'],
            ['name' => 'El Salvador'],
            ['name' => 'Guatemala'],
            ['name' => 'Belice'],
            ['name' => 'Estados Unidos'],
        ];

        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
                'slug' => Str::slug($country['name']),
            ]);
        }
    }
}
