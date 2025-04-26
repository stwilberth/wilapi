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
        // Asegurar que el tipo sea 'place'
        $data['type'] = 'place';
        
        // Si no hay provincia seleccionada, usar el país como parent_id
        if (empty($data['province_id']) && isset($data['country_id'])) {
            $data['parent_id'] = $data['country_id'];
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
