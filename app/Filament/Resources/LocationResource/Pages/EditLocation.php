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
        
        // Guardar los IDs de país y provincia en los campos correspondientes
        if (isset($data['country_id'])) {
            $country = \App\Models\Location::find($data['country_id']);
            if ($country) {
                $data['country'] = $country->name;
            }
        }
        
        if (isset($data['province_id'])) {
            $province = \App\Models\Location::find($data['province_id']);
            if ($province) {
                $data['province'] = $province->name;
            }
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
