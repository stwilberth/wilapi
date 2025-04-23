<?php

namespace App\Filament\Resources\AccommodationResource\Pages;

use App\Filament\Resources\AccommodationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateAccommodation extends CreateRecord
{
    protected static string $resource = AccommodationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['name']);
        
        // Asegurar que company_id esté establecido para usuarios no administradores
        if (!isset($data['company_id']) && auth()->check()) {
            $data['company_id'] = auth()->user()->company_id;
        }
        
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}