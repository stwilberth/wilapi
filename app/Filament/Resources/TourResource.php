<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourResource\Pages;
use App\Models\Tour;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TourResource extends Resource
{
    protected static ?string $model = Tour::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(Tour::class, 'slug')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])
                    ->default('draft'),
                Forms\Components\TextInput::make('duration')
                    ->nullable(),
                Forms\Components\TextInput::make('price')
                    ->nullable(),
                Forms\Components\Textarea::make('description')
                    ->nullable(),
                Forms\Components\Textarea::make('short_description')
                    ->nullable(),
                Forms\Components\Textarea::make('overview')
                    ->nullable(),
                Forms\Components\Select::make('difficulty')
                    ->options([
                        'easy' => 'Easy',
                        'medium' => 'Medium',
                        'hard' => 'Hard',
                    ])
                    ->nullable(),
                Forms\Components\Textarea::make('things_to_bring')
                    ->nullable(),
                Forms\Components\Textarea::make('itinerary')
                    ->nullable(),
                Forms\Components\Textarea::make('before_booking')
                    ->nullable(),
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('short_description'),
                Tables\Columns\TextColumn::make('overview'),
                Tables\Columns\TextColumn::make('difficulty'),
                Tables\Columns\TextColumn::make('things_to_bring'),
                Tables\Columns\TextColumn::make('itinerary'),
                Tables\Columns\TextColumn::make('before_booking'),
                Tables\Columns\TextColumn::make('company.name')->label('Company'),
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListTours::route('/'),
            'create' => Pages\CreateTour::route('/create'),
            'edit' => Pages\EditTour::route('/{record}/edit'),
        ];
    }
}
