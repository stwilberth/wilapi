<?php

namespace App\Filament\Traits;

use Filament\Forms\Components\Select;

trait HasCompanyField
{
    protected static function getCompanyField(): array
    {
        $user = auth()->user();
        if ($user->is_admin ?? $user->hasRole('admin')) {
            return [
                Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
            ];
        }
        return [
            Select::make('company_id')
                ->relationship('company', 'name')
                ->required()
                ->preload()
                ->disabled()
                ->default($user->company_id),
        ];
    }
}