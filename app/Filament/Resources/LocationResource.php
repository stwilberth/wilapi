<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocationResource\Pages;
use App\Models\Location;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                        if (!$get('slug') || $get('slug') === '') {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->unique(Location::class, 'slug', ignoreRecord: true)
                    ->maxLength(255),
                Select::make('type')
                    ->label('Tipo de ubicación')
                    ->options([
                        'country' => 'País',
                        'province' => 'Provincia',
                        'place' => 'Lugar',
                    ])
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('parent_id', null)),
                Select::make('parent_id')
                    ->label('País')
                    ->options(function (Get $get) {
                        if ($get('type') === 'province') {
                            return Location::where('type', 'country')->pluck('name', 'id');
                        }
                        return [];
                    })
                    ->visible(fn (Get $get): bool => $get('type') === 'province')
                    ->searchable()
                    ->preload()
                    ->live(),
                Select::make('province_id')
                    ->label('Provincia')
                    ->options(function (Get $get) {
                        if ($get('type') === 'place' && $get('parent_id')) {
                            return Location::where('type', 'province')
                                ->where('parent_id', $get('parent_id'))
                                ->pluck('name', 'id');
                        }
                        return [];
                    })
                    ->visible(fn (Get $get): bool => $get('type') === 'place')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(fn (Set $set, $state) => $set('parent_id', $state)),
                Select::make('parent_id')
                    ->label('País (para lugares)')
                    ->options(function () {
                        return Location::where('type', 'country')->pluck('name', 'id');
                    })
                    ->visible(fn (Get $get): bool => $get('type') === 'place')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('province_id', null)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name'),
                TextColumn::make('slug'),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'country' => 'País',
                        'province' => 'Provincia',
                        'place' => 'Lugar',
                        default => $state,
                    }),
                TextColumn::make('parent.name')
                    ->label('Ubicación padre')
                    ->placeholder('N/A'),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('updated_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
