<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccommodationResource\Pages;
use App\Models\Accommodation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Traits\HasCompanyField;
use Filament\Forms\Components\Repeater;


class AccommodationResource extends Resource
{
    use HasCompanyField;

    protected static ?string $model = Accommodation::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('slug')->nullable(),
                Select::make('type')
                    ->options([
                        'hotel' => 'Hotel',
                        'hostel' => 'Hostal',
                        'motel' => 'Motel',
                        'apartment' => 'Apartamento',
                        'cabin' => 'Cabaña',
                        'villa' => 'Villa',
                        'cottage' => 'Casa de Campo',
                        'condo' => 'Condominio',
                        'resort' => 'Resort',
                        'glamping' => 'Glamping',
                        'camping' => 'Camping',
                        'lodge' => 'Lodge',
                        'bed_breakfast' => 'Bed & Breakfast',
                        'guest_house' => 'Casa de Huéspedes',
                        'boutique_hotel' => 'Hotel Boutique',
                        'vacation_home' => 'Casa Vacacional',
                        'eco_lodge' => 'Eco Lodge',
                        'mountain_refuge' => 'Refugio de Montaña',
                        'beach_house' => 'Casa de Playa',
                        'pension' => 'Pensión',
                        'all_inclusive' => 'Resort Todo Incluido',
                        'other' => 'Otro'
                    ])
                    ->required(),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived'
                    ])
                    ->default('published'),
                TinyEditor::make('description')
                    ->profile('default')
                    ->direction('ltr')
                    ->columnSpan('full')
                    ->required(),
                Textarea::make('short_description')->nullable(),
                TextInput::make('phone')->nullable(),
                TextInput::make('email')->email()->nullable(),
                TextInput::make('website')->url()->nullable(),
                ...static::getCompanyField(), // Asegura que company_id sea requerido
                Select::make('place_id')->relationship('place', 'name')->label('Place')->nullable(),
                FileUpload::make('cover_image')
                    ->label('Cover Image')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(1)
                    ->disk('public')
                    ->directory(fn (Forms\Get $get) => 'accommodations/' . $get('company_id') . '/cover')
                    ->columnSpanFull(),
                Repeater::make('images')
                    ->label('Additional Images')
                    ->relationship()
                    ->schema([
                        FileUpload::make('path')
                            ->image()
                            ->disk('public')
                            ->directory(fn (Forms\Get $get) => 'accommodations/' . $get('company_id') . '/additional'),
                        TextInput::make('name')->required(),
                    ])
                    ->collapsible()
                    ->defaultItems(0)
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')->disk('public')->rounded(),
                TextColumn::make('name'),
                TextColumn::make('type'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'warning',
                        'archived' => 'danger',
                    }),
                TextColumn::make('company.name')->label('Company'),
                TextColumn::make('location.name')->label('Ubicación'),
            ])
            ->filters([
                // Solo mostrar el filtro de compañía para usuarios administradores
                ...auth()->user()->is_admin ? [
                    SelectFilter::make('company_id')
                        ->relationship('company', 'name')
                        ->label('Company')
                        ->searchable()
                        ->preload()
                ] : [],
                SelectFilter::make('type')
                    ->options([
                        'hotel' => 'Hotel',
                        'hostel' => 'Hostal',
                        'motel' => 'Motel',
                        'apartment' => 'Apartamento',
                        'cabin' => 'Cabaña',
                        'villa' => 'Villa',
                        'cottage' => 'Casa de Campo',
                        'condo' => 'Condominio',
                        'resort' => 'Resort',
                        'glamping' => 'Glamping',
                        'camping' => 'Camping',
                        'lodge' => 'Lodge',
                        'bed_breakfast' => 'Bed & Breakfast',
                        'guest_house' => 'Casa de Huéspedes',
                        'boutique_hotel' => 'Hotel Boutique',
                        'vacation_home' => 'Casa Vacacional',
                        'eco_lodge' => 'Eco Lodge',
                        'mountain_refuge' => 'Refugio de Montaña',
                        'beach_house' => 'Casa de Playa',
                        'pension' => 'Pensión',
                        'all_inclusive' => 'Resort Todo Incluido',
                        'other' => 'Otro'
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccommodations::route('/'),
            'create' => Pages\CreateAccommodation::route('/create'),
            'edit' => Pages\EditAccommodation::route('/{record}/edit'),
        ];
    }
}