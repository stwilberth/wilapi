<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),
                Select::make('type')
                    ->options([
                        'cabin' => 'Cabin',
                        'room' => 'Room',
                        'suite' => 'Suite'
                    ])
                    ->default('room'),
                TextInput::make('price_per_night')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('capacity')
                    ->required()
                    ->numeric()
                    ->default(2),
                TextInput::make('beds')
                    ->required()
                    ->numeric()
                    ->default(1),
                Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull(),
                Textarea::make('short_description')
                    ->nullable()
                    ->columnSpanFull(),
                TagsInput::make('amenities')
                    ->separator(',')
                    ->columnSpanFull(),
                FileUpload::make('cover_image')
                    ->image()
                    ->imageEditor()
                    ->directory('rooms')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'occupied' => 'Occupied',
                        'maintenance' => 'Maintenance',
                        'inactive' => 'Inactive'
                    ])
                    ->default('available'),
                Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image'),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('type')->sortable(),
                TextColumn::make('price_per_night')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('capacity')->sortable(),
                IconColumn::make('status')
                    ->icon(fn (string $state): string => match ($state) {
                        'available' => 'heroicon-o-check-circle',
                        'occupied' => 'heroicon-o-user',
                        'maintenance' => 'heroicon-o-wrench',
                        'inactive' => 'heroicon-o-x-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'occupied' => 'warning',
                        'maintenance' => 'danger',
                        'inactive' => 'gray',
                    }),
                TextColumn::make('company.name')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
