<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourResource\Pages;
use App\Models\Tour;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Validation\Rule;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Traits\HasCompanyField;
use Illuminate\Support\Facades\Storage;

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
                TextInput::make('price')->nullable(),
                TinyEditor::make('description')
                    ->profile('default')
                    ->direction('ltr')
                    ->columnSpan('full')
                    ->required(),
                Textarea::make('short_description')->nullable(),
                Textarea::make('overview')->nullable(),
                Select::make('difficulty')->options(['easy' => 'Easy','medium' => 'Medium','hard' => 'Hard',])->nullable(),
                Textarea::make('things_to_bring')->nullable(),
                Textarea::make('itinerary')->nullable(),
                Textarea::make('before_booking')->nullable(),
                ...static::getCompanyField(),
                Select::make('location_id')->relationship('location', 'name'),
                FileUpload::make('cover_image')
                    ->label('Cover Image')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(1)
                    ->disk('public')
                    ->directory(fn (Forms\Get $get) => 'tours/' . $get('company_id') . '/cover')
                    ->columnSpanFull(),
                FileUpload::make('images')
                    ->label('Additional Images')
                    ->multiple()
                    ->image()
                    ->imageEditor()
                    ->maxFiles(10)
                    ->disk('public')
                    ->directory(fn (Forms\Get $get) => 'tours/' . $get('company_id') . '/additional')
                    ->helperText('Seleccione múltiples imágenes a la vez')
                    ->columnSpanFull()
                    // Cargar las imágenes existentes cuando se edita un tour
                    ->getUploadedFileUrlsUsing(fn (array $files): array => collect($files)
                        ->map(fn (string $file): string => Storage::disk('public')->url($file))
                        ->toArray())
                    ->getUploadStateUsing(function ($record) {
                        if (!$record) return [];
                        return $record->images->pluck('path')->toArray();
                    })
                    ->saveRelationshipsUsing(function ($component, $record, array $state) {
                        // Primero eliminamos las imágenes existentes que no están en el nuevo estado
                        $existingImages = $record->images->pluck('path')->toArray();
                        $newImages = $state;
                        
                        // Eliminar imágenes que ya no están en el estado
                        foreach ($existingImages as $existingImage) {
                            if (!in_array($existingImage, $newImages)) {
                                $record->images()->where('path', $existingImage)->delete();
                            }
                        }
                        
                        // Agregar nuevas imágenes
                        foreach ($state as $file) {
                            // Verificar si la imagen ya existe para evitar duplicados
                            if (!$record->images()->where('path', $file)->exists()) {
                                $record->images()->create([
                                    'path' => $file,
                                    'name' => pathinfo($file, PATHINFO_FILENAME),
                                ]);
                            }
                        }
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')->disk('public')->rounded(),
                TextColumn::make('name'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'warning',
                        'archived' => 'danger',
                    }),
                TextColumn::make('price'),
                TextColumn::make('company.name')->label('Company'),
                TextColumn::make('user.name')->label('User'),
            ])
            ->filters([
                // Solo mostrar el filtro de compañía para usuarios administradores
                ...auth()->user()->is_admin ? [
                    SelectFilter::make('company_id')
                        ->relationship('company', 'name')
                        ->label('Company')
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
