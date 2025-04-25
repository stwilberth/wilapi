<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Seed locations table with Central American countries, US, provinces and tourist locations.
     */
    public function run(): void
    {
        // Truncate the locations table to avoid duplicates
        // This will reset the auto-increment counter
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('locations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        // Array of countries (Central America + USA)
        $countries = [
            ['id' => 1, 'name' => 'Costa Rica', 'slug' => 'costa-rica', 'country' => 'Costa Rica', 'type' => 'country'],
            ['id' => 2, 'name' => 'Panamá', 'slug' => 'panama', 'country' => 'Panamá', 'type' => 'country'],
            ['id' => 3, 'name' => 'Nicaragua', 'slug' => 'nicaragua', 'country' => 'Nicaragua', 'type' => 'country'],
            ['id' => 4, 'name' => 'Honduras', 'slug' => 'honduras', 'country' => 'Honduras', 'type' => 'country'],
            ['id' => 5, 'name' => 'El Salvador', 'slug' => 'el-salvador', 'country' => 'El Salvador', 'type' => 'country'],
            ['id' => 6, 'name' => 'Guatemala', 'slug' => 'guatemala', 'country' => 'Guatemala', 'type' => 'country'],
            ['id' => 7, 'name' => 'Belice', 'slug' => 'belice', 'country' => 'Belice', 'type' => 'country'],
            ['id' => 8, 'name' => 'Estados Unidos', 'slug' => 'estados-unidos', 'country' => 'Estados Unidos', 'type' => 'country'],
        ];
        
        // Insert countries
        foreach ($countries as $country) {
            Location::create($country);
        }
        
        // Array of provinces by country
        $provinces = [
            // Costa Rica provinces
            ['name' => 'San José', 'slug' => 'san-jose', 'country' => 'Costa Rica', 'province' => 'San José', 'parent_id' => 1, 'type' => 'province'],
            ['name' => 'Alajuela', 'slug' => 'alajuela', 'country' => 'Costa Rica', 'province' => 'Alajuela', 'parent_id' => 1, 'type' => 'province'],
            ['name' => 'Cartago', 'slug' => 'cartago', 'country' => 'Costa Rica', 'province' => 'Cartago', 'parent_id' => 1, 'type' => 'province'],
            ['name' => 'Heredia', 'slug' => 'heredia', 'country' => 'Costa Rica', 'province' => 'Heredia', 'parent_id' => 1, 'type' => 'province'],
            ['name' => 'Guanacaste', 'slug' => 'guanacaste', 'country' => 'Costa Rica', 'province' => 'Guanacaste', 'parent_id' => 1, 'type' => 'province'],
            ['name' => 'Puntarenas', 'slug' => 'puntarenas', 'country' => 'Costa Rica', 'province' => 'Puntarenas', 'parent_id' => 1, 'type' => 'province'],
            ['name' => 'Limón', 'slug' => 'limon', 'country' => 'Costa Rica', 'province' => 'Limón', 'parent_id' => 1, 'type' => 'province'],
            
            // Panamá provinces
            ['name' => 'Bocas del Toro', 'slug' => 'bocas-del-toro', 'country' => 'Panamá', 'province' => 'Bocas del Toro', 'parent_id' => 2],
            ['name' => 'Chiriquí', 'slug' => 'chiriqui', 'country' => 'Panamá', 'province' => 'Chiriquí', 'parent_id' => 2],
            ['name' => 'Coclé', 'slug' => 'cocle', 'country' => 'Panamá', 'province' => 'Coclé', 'parent_id' => 2],
            ['name' => 'Colón', 'slug' => 'colon-panama', 'country' => 'Panamá', 'province' => 'Colón', 'parent_id' => 2],
            ['name' => 'Darién', 'slug' => 'darien', 'country' => 'Panamá', 'province' => 'Darién', 'parent_id' => 2],
            ['name' => 'Herrera', 'slug' => 'herrera', 'country' => 'Panamá', 'province' => 'Herrera', 'parent_id' => 2],
            ['name' => 'Los Santos', 'slug' => 'los-santos', 'country' => 'Panamá', 'province' => 'Los Santos', 'parent_id' => 2],
            ['name' => 'Panamá', 'slug' => 'panama-provincia', 'country' => 'Panamá', 'province' => 'Panamá', 'parent_id' => 2],
            ['name' => 'Panamá Oeste', 'slug' => 'panama-oeste', 'country' => 'Panamá', 'province' => 'Panamá Oeste', 'parent_id' => 2],
            ['name' => 'Veraguas', 'slug' => 'veraguas', 'country' => 'Panamá', 'province' => 'Veraguas', 'parent_id' => 2],
            
            // Nicaragua departments
            ['name' => 'Managua', 'slug' => 'managua', 'country' => 'Nicaragua', 'province' => 'Managua', 'parent_id' => 3],
            ['name' => 'Granada', 'slug' => 'granada-nicaragua', 'country' => 'Nicaragua', 'province' => 'Granada', 'parent_id' => 3],
            ['name' => 'León', 'slug' => 'leon-nicaragua', 'country' => 'Nicaragua', 'province' => 'León', 'parent_id' => 3],
            ['name' => 'Rivas', 'slug' => 'rivas', 'country' => 'Nicaragua', 'province' => 'Rivas', 'parent_id' => 3],
            
            // Honduras departments
            ['name' => 'Francisco Morazán', 'slug' => 'francisco-morazan', 'country' => 'Honduras', 'province' => 'Francisco Morazán', 'parent_id' => 4],
            ['name' => 'Cortés', 'slug' => 'cortes', 'country' => 'Honduras', 'province' => 'Cortés', 'parent_id' => 4],
            ['name' => 'Islas de la Bahía', 'slug' => 'islas-de-la-bahia', 'country' => 'Honduras', 'province' => 'Islas de la Bahía', 'parent_id' => 4],
            
            // El Salvador departments
            ['name' => 'San Salvador', 'slug' => 'san-salvador', 'country' => 'El Salvador', 'province' => 'San Salvador', 'parent_id' => 5],
            ['name' => 'La Libertad', 'slug' => 'la-libertad', 'country' => 'El Salvador', 'province' => 'La Libertad', 'parent_id' => 5],
            ['name' => 'Santa Ana', 'slug' => 'santa-ana', 'country' => 'El Salvador', 'province' => 'Santa Ana', 'parent_id' => 5],
            
            // Guatemala departments
            ['name' => 'Guatemala', 'slug' => 'guatemala-departamento', 'country' => 'Guatemala', 'province' => 'Guatemala', 'parent_id' => 6],
            ['name' => 'Sacatepéquez', 'slug' => 'sacatepequez', 'country' => 'Guatemala', 'province' => 'Sacatepéquez', 'parent_id' => 6],
            ['name' => 'Petén', 'slug' => 'peten', 'country' => 'Guatemala', 'province' => 'Petén', 'parent_id' => 6],
            
            // Belice districts
            ['name' => 'Belize', 'slug' => 'belize-distrito', 'country' => 'Belice', 'province' => 'Belize', 'parent_id' => 7],
            ['name' => 'Cayo', 'slug' => 'cayo', 'country' => 'Belice', 'province' => 'Cayo', 'parent_id' => 7],
            
            // USA states (selected few)
            ['name' => 'Florida', 'slug' => 'florida', 'country' => 'Estados Unidos', 'province' => 'Florida', 'parent_id' => 8],
            ['name' => 'California', 'slug' => 'california', 'country' => 'Estados Unidos', 'province' => 'California', 'parent_id' => 8],
            ['name' => 'New York', 'slug' => 'new-york', 'country' => 'Estados Unidos', 'province' => 'New York', 'parent_id' => 8],
        ];
        
        // Insert provinces
        foreach ($provinces as $province) {
            Location::create($province);
        }
        
        // Array of tourist locations
        $touristLocations = [
            // Costa Rica tourist locations
            ['name' => 'Volcán Arenal', 'slug' => 'volcan-arenal', 'description' => 'Uno de los volcanes más activos de Costa Rica', 'country' => 'Costa Rica', 'province' => 'Alajuela', 'parent_id' => 10, 'type' => 'place'],
            ['name' => 'Manuel Antonio', 'slug' => 'manuel-antonio', 'description' => 'Parque nacional con hermosas playas', 'country' => 'Costa Rica', 'province' => 'Puntarenas', 'parent_id' => 14, 'type' => 'place'],
            ['name' => 'Monteverde', 'slug' => 'monteverde', 'description' => 'Bosque nuboso con gran biodiversidad', 'country' => 'Costa Rica', 'province' => 'Puntarenas', 'parent_id' => 14, 'type' => 'place'],
            ['name' => 'Tamarindo', 'slug' => 'tamarindo', 'description' => 'Popular destino de playa y surf', 'country' => 'Costa Rica', 'province' => 'Guanacaste', 'parent_id' => 13, 'type' => 'place'],
            
            // Panamá tourist locations
            ['name' => 'Casco Viejo', 'slug' => 'casco-viejo', 'description' => 'Centro histórico de la Ciudad de Panamá', 'country' => 'Panamá', 'province' => 'Panamá', 'parent_id' => 24],
            ['name' => 'Bocas del Toro', 'slug' => 'bocas-del-toro-islas', 'description' => 'Archipiélago con hermosas playas', 'country' => 'Panamá', 'province' => 'Bocas del Toro', 'parent_id' => 16],
            ['name' => 'Valle de Antón', 'slug' => 'valle-de-anton', 'description' => 'Pueblo ubicado en el cráter de un volcán extinto', 'country' => 'Panamá', 'province' => 'Coclé', 'parent_id' => 18],
            
            // Nicaragua tourist locations
            ['name' => 'Isla de Ometepe', 'slug' => 'isla-de-ometepe', 'description' => 'Isla formada por dos volcanes en el Lago de Nicaragua', 'country' => 'Nicaragua', 'province' => 'Rivas', 'parent_id' => 30],
            ['name' => 'San Juan del Sur', 'slug' => 'san-juan-del-sur', 'description' => 'Popular destino de playa en el Pacífico', 'country' => 'Nicaragua', 'province' => 'Rivas', 'parent_id' => 30],
            
            // Honduras tourist locations
            ['name' => 'Roatán', 'slug' => 'roatan', 'description' => 'Isla con arrecifes de coral y playas de arena blanca', 'country' => 'Honduras', 'province' => 'Islas de la Bahía', 'parent_id' => 33],
            ['name' => 'Copán Ruinas', 'slug' => 'copan-ruinas', 'description' => 'Sitio arqueológico maya', 'country' => 'Honduras', 'province' => 'Copán', 'parent_id' => 4],
            
            // El Salvador tourist locations
            ['name' => 'El Tunco', 'slug' => 'el-tunco', 'description' => 'Playa popular para el surf', 'country' => 'El Salvador', 'province' => 'La Libertad', 'parent_id' => 35],
            ['name' => 'Ruta de las Flores', 'slug' => 'ruta-de-las-flores', 'description' => 'Ruta escénica que conecta pueblos pintorescos', 'country' => 'El Salvador', 'province' => 'Ahuachapán', 'parent_id' => 5],
            
            // Guatemala tourist locations
            ['name' => 'Antigua Guatemala', 'slug' => 'antigua-guatemala', 'description' => 'Ciudad colonial patrimonio de la humanidad', 'country' => 'Guatemala', 'province' => 'Sacatepéquez', 'parent_id' => 38],
            ['name' => 'Tikal', 'slug' => 'tikal', 'description' => 'Sitio arqueológico maya en la selva', 'country' => 'Guatemala', 'province' => 'Petén', 'parent_id' => 39],
            ['name' => 'Lago de Atitlán', 'slug' => 'lago-de-atitlan', 'description' => 'Lago rodeado de volcanes y pueblos indígenas', 'country' => 'Guatemala', 'province' => 'Sololá', 'parent_id' => 6],
            
            // Belice tourist locations
            ['name' => 'Cayo Ambergris', 'slug' => 'cayo-ambergris', 'description' => 'La isla más grande de Belice', 'country' => 'Belice', 'province' => 'Belize', 'parent_id' => 40],
            ['name' => 'Blue Hole', 'slug' => 'blue-hole', 'description' => 'Gran sumidero submarino circular', 'country' => 'Belice', 'province' => 'Belize', 'parent_id' => 40],
            
            // USA tourist locations
            ['name' => 'Miami Beach', 'slug' => 'miami-beach', 'description' => 'Famosa playa en Florida', 'country' => 'Estados Unidos', 'province' => 'Florida', 'parent_id' => 42],
            ['name' => 'Disney World', 'slug' => 'disney-world', 'description' => 'Complejo de parques temáticos', 'country' => 'Estados Unidos', 'province' => 'Florida', 'parent_id' => 42],
            ['name' => 'Hollywood', 'slug' => 'hollywood', 'description' => 'Distrito famoso por la industria del cine', 'country' => 'Estados Unidos', 'province' => 'California', 'parent_id' => 43],
            ['name' => 'Times Square', 'slug' => 'times-square', 'description' => 'Intersección de calles famosa en Manhattan', 'country' => 'Estados Unidos', 'province' => 'New York', 'parent_id' => 44],
        ];
        
        // Insert tourist locations
        foreach ($touristLocations as $location) {
            Location::create($location);
        }
        
        // Preserve existing locations if needed
        $existingLocations = [
            ['id' => 100, 'name' => 'Corcovado', 'slug' => 'corcovado', 'description' => 'Parque Nacional en Costa Rica', 'country' => 'Costa Rica', 'province' => 'Puntarenas', 'parent_id' => 14, 'type' => 'place'],
            ['id' => 101, 'name' => 'Puerto Jiménez', 'slug' => 'puerto-jimenez', 'description' => 'Pueblo en la Península de Osa', 'country' => 'Costa Rica', 'province' => 'Puntarenas', 'parent_id' => 14, 'type' => 'place'],
            ['id' => 102, 'name' => 'Drake', 'slug' => 'drake', 'description' => 'Bahía Drake en la Península de Osa', 'country' => 'Costa Rica', 'province' => 'Puntarenas', 'parent_id' => 14, 'type' => 'place'],
            ['id' => 103, 'name' => 'Rio Tigre', 'slug' => 'rio-tigre', 'description' => 'Río en la Península de Osa', 'country' => 'Costa Rica', 'province' => 'Puntarenas', 'parent_id' => 14, 'type' => 'place'],
            ['id' => 104, 'name' => 'Isla Tortuga', 'slug' => 'isla-tortuga', 'description' => 'Isla en el Golfo de Nicoya', 'country' => 'Costa Rica', 'province' => 'Puntarenas', 'parent_id' => 14, 'type' => 'place'],
            ['id' => 105, 'name' => 'Fortuna', 'slug' => 'fortuna', 'description' => 'Fortuna de San Carlos', 'country' => 'Costa Rica', 'province' => 'Alajuela', 'parent_id' => 10, 'type' => 'place'],
        ];
        
        // Insert or update existing locations
        foreach ($existingLocations as $location) {
            Location::updateOrCreate(['id' => $location['id']], $location);
        }
    }
}