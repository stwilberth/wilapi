<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Elimina o comenta la llamada al LocationSeeder antiguo
        // $this->call(LocationSeeder::class);

        // Llama a los nuevos seeders en orden
        $this->call([
            CountrySeeder::class,
            ProvinceSeeder::class,
            PlaceSeeder::class,
            // Llama a otros seeders que necesites aquí
            // UserSeeder::class,
            // CategorySeeder::class,
            // ...
        ]);
    }
}
