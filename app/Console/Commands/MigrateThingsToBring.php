<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tour;

class MigrateThingsToBring extends Command
{
    protected $signature = 'tours:migrate-things';
    protected $description = 'Migrate old text things_to_bring to the new JSON array format';

    public function handle()
    {
        $tours = Tour::whereNotNull('things_to_bring')->get();
        $count = 0;

        foreach ($tours as $tour) {
            $value = $tour->getRawOriginal('things_to_bring');

            // Si ya es JSON, lo ignoramos (o verificamos si es un array válido)
            if ($this->isJson($value)) {
                $decoded = json_decode($value, true);
                if (is_array($decoded)) {
                    continue;
                }
            }

            if (empty($value)) continue;

            // Convertimos el texto plano al nuevo formato de Repeater
            // Lo ponemos en una categoría genérica "Otros" o tratamos de split por líneas
            $items = explode("\n", $value);
            $newData = [];

            foreach ($items as $item) {
                $trimmed = trim($item, " \t\n\r\0\x0B-•*");
                if (!empty($trimmed)) {
                    $newData[] = [
                        'category' => 'Otros',
                        'item' => $trimmed,
                    ];
                }
            }

            if (!empty($newData)) {
                $tour->things_to_bring = $newData;
                $tour->save();
                $count++;
            }
        }

        $this->info("Hecho! Se migraron {$count} tours al nuevo formato.");
    }

    private function isJson($string) {
        if (!is_string($string)) return false;
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
