<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLocation extends EditRecord
{
    protected static string $resource = LocationResource::class;
    
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Eliminar el campo country_id que no existe en el modelo
        if (isset($data['country_id'])) {
            unset($data['country_id']);
        }
        
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
