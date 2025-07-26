<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantResource\Pages;
use App\Models\Restaurant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Traits\HasCompanyField;

class RestaurantResource extends Resource
{
    use HasCompanyField;

    protected static ?string $model = Restaurant::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationGroup = 'Guía Turística';
    protected static ?string $modelLabel = 'Restaurante';
    protected static ?string $pluralModelLabel = 'Restaurantes';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('slug')
                    ->label('URL amigable')
                    ->nullable()
                    ->unique(ignoreRecord: true),
                    
                Textarea::make('short_description')
                    ->label('Descripción corta')
                    ->maxLength(160)
                    ->columnSpanFull(),
                    
                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel()
                    ->maxLength(20),
                    
                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email()
                    ->maxLength(255),
                    
                TextInput::make('website')
                    ->label('Sitio Web')
                    ->url()
                    ->maxLength(255),
                    
                FileUpload::make('cover_image')
                    ->label('Imagen de portada')
                    ->image()
                    ->directory('restaurants')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->maxSize(2048)
                    ->columnSpanFull(),
                    
                Forms\Components\Toggle::make('is_active')
                    ->label('¿Activo?')
                    ->default(true),
                    
                Select::make('place_id')
                    ->relationship('place', 'name')
                    ->label('Ubicación')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nombre del Lugar')
                            ->required()
                            ->maxLength(255),
                        Select::make('province_id')
                            ->relationship('province', 'name')
                            ->label('Provincia')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('latitude')
                            ->label('Latitud')
                            ->numeric(),
                        TextInput::make('longitude')
                            ->label('Longitud')
                            ->numeric(),
                    ]),
                    
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('')
                    ->circular(),
                    
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('short_description')
                    ->label('Descripción')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= $column->getCharacterLimit()) {
                            return null;
                        }
                        return $state;
                    }),
                    
                TextColumn::make('place.name')
                    ->label('Ubicación')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('place_id')
                    ->label('Ubicación')
                    ->relationship('place', 'name')
                    ->searchable()
                    ->preload(),
                    
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Estado')
                    ->placeholder('Todos')
                    ->trueLabel('Solo activos')
                    ->falseLabel('Solo inactivos'),
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
    
    public static function getRelations(): array
    {
        return [
            // Aquí puedes agregar relaciones si son necesarias
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRestaurants::route('/'),
            'create' => Pages\CreateRestaurant::route('/create'),
            'edit' => Pages\EditRestaurant::route('/{record}/edit'),
        ];
    }    
}
