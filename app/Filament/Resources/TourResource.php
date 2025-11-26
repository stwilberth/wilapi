<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourResource\Pages;
use App\Models\Tour;
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
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Traits\HasCompanyField;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\Repeater;
// Ensure the Intervention Image facade is imported
use Intervention\Image\Facades\Image;

class TourResource extends Resource
{
    use HasCompanyField;

    protected static ?string $model = Tour::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                Select::make('status')->options(['draft' => 'Draft','published' => 'Published','archived' => 'Archived'])->default('draft'),
                TextInput::make('duration')->nullable(),
                TextInput::make('price')
                    ->label('Precio (USD)')
                    ->numeric()
                    ->prefix('$')
                    ->nullable(),
                TextInput::make('price_colones')
                    ->label('Precio (Colones)')
                    ->numeric()
                    ->prefix('₡')
                    ->nullable(),
                TextInput::make('price_national')
                    ->label('Precio Nacional (USD)')
                    ->numeric()
                    ->prefix('$')
                    ->nullable(),
                TextInput::make('price_national_colones')
                    ->label('Precio Nacional (Colones)')
                    ->numeric()
                    ->prefix('₡')
                    ->nullable(),
                TextInput::make('price_foreign')
                    ->label('Precio Extranjeros (USD)')
                    ->numeric()
                    ->prefix('$')
                    ->nullable(),
                TextInput::make('price_foreign_colones')
                    ->label('Precio Extranjeros (Colones)')
                    ->numeric()
                    ->prefix('₡')
                    ->nullable(),
                Toggle::make('has_daily_departures')
                    ->label('¿Este tour tiene salidas todos los días del año?')
                    ->helperText('Si está activado, se mostrará un mensaje indicando que hay salidas diarias en lugar de las fechas específicas')
                    ->default(false),
                Toggle::make('only_book_by_schedules')
                    ->label('Solo se puede reservar según las salidas programadas')
                    ->helperText('Si está activado, el tour solo se puede reservar en las fechas específicas programadas')
                    ->default(false),
                TinyEditor::make('description')
                    ->profile('default')
                    ->direction('ltr')
                    ->columnSpan('full')
                    ->required(),
                Textarea::make('short_description')->label('Descripción corta')->nullable(),
                Textarea::make('overview')->label('Descripción general')->nullable(),
                Select::make('difficulty')->options(['easy' => 'Easy','medium' => 'Medium','hard' => 'Hard',])->nullable(),
                Textarea::make('things_to_bring')->label('Cosas para traer')->nullable()->columnSpan('full'),
                Textarea::make('itinerary')->label('Itinerario')->nullable()->columnSpan('full'),
                Textarea::make('before_booking')->label('Antes de reservar')->nullable()->columnSpan('full'),
                ...static::getCompanyField(),
                Select::make('place_id')->relationship('place', 'name')->label('Place')->nullable(),
                FileUpload::make('cover_image')
                    ->label('Imagen principal')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(1)
                    ->disk('public')
                    ->directory(fn (Forms\Get $get) => 'tours/' . $get('company_id') . '/cover')
                    ->columnSpanFull(),
                    Repeater::make('images')
                    ->label('Imagenes adicionales')
                    ->relationship()
                    ->schema([
                        FileUpload::make('path')
                            ->image()
                            ->disk('public')
                            ->directory(fn (Forms\Get $get) => 'tours/' . $get('company_id') . '/additional'),
                        TextInput::make('name')->required(),
                    ])
                    ->collapsible()
                    ->defaultItems(0)
                    ->columnSpanFull(),
                

                
                Repeater::make('youtube_links')
                    ->relationship('youtubeLinks')
                    ->label('Videos de YouTube')
                    ->schema([
                        TextInput::make('url')
                            ->label('URL de YouTube')
                            ->required()
                            ->url(),
                        TextInput::make('title')
                            ->label('Título del video')
                            ->required(),
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
                ImageColumn::make('cover_image')->label('Imagen principal')->disk('public')->rounded(),
                TextColumn::make('name')->label('Nombre'),
                TextColumn::make('status')->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'warning',
                        'archived' => 'danger',
                    }),
                TextColumn::make('booking_type')
                    ->label('Tipo de Reserva')
                    ->badge()
                    ->formatStateUsing(function ($record) {
                        if ($record->has_daily_departures) {
                            return 'Salidas Diarias';
                        }
                        if ($record->only_book_by_schedules) {
                            return 'Solo por Fechas';
                        }
                        return 'Flexible';
                    })
                    ->color(fn ($record) => match (true) {
                        $record->has_daily_departures => 'success',
                        $record->only_book_by_schedules => 'warning',
                        default => 'info',
                    }),
                TextColumn::make('price')->label('Precio (USD)')
                    ->money('USD'),
                TextColumn::make('price_colones')->label('Precio (₡)')
                    ->money('CRC'),
                TextColumn::make('price_national')->label('Precio Nacional (USD)')
                    ->money('USD'),
                TextColumn::make('price_national_colones')->label('Precio Nacional (₡)')
                    ->money('CRC'),
                TextColumn::make('price_foreign')->label('Precio Extranjero (USD)')
                    ->money('USD'),
                TextColumn::make('price_foreign_colones')->label('Precio Extranjero (₡)')
                    ->money('CRC'),
                TextColumn::make('company.name')->label('Compañía'),
                TextColumn::make('user.name')->label('Usuario'),
            ])
            ->filters([
                // Solo mostrar el filtro de compañía para usuarios administradores
                ...auth()->user()->is_admin ? [
                    SelectFilter::make('company_id')
                        ->relationship('company', 'name')
                        ->label('Compañía')
                        ->searchable()
                        ->preload()
                ] : []
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
