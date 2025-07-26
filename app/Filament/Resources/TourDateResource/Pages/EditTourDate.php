<?php

namespace App\Filament\Resources\TourDateResource\Pages;

use App\Filament\Resources\TourDateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTourDate extends EditRecord
{
    protected static string $resource = TourDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
