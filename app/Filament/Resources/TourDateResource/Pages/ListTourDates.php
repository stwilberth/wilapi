<?php

namespace App\Filament\Resources\TourDateResource\Pages;

use App\Filament\Resources\TourDateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTourDates extends ListRecords
{
    protected static string $resource = TourDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
