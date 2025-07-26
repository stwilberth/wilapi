<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourDateResource\Pages;
use App\Models\TourDate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Traits\HasCompanyField;

class TourDateResource extends Resource
{
    use HasCompanyField;

    protected static ?string $model = TourDate::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static function mutateFormDataBeforeSave(array $data): array
    {
        // Asegurarse de que los precios sean numéricos y manejar valores nulos
        $data['price'] = isset($data['price']) ? (float) str_replace([',', ' '], ['.', ''], $data['price']) : null;
        $data['price_foreigners'] = isset($data['price_foreigners']) ? (float) str_replace([',', ' '], ['.', ''], $data['price_foreigners']) : null;
        
        // Si no se especifica precio para extranjeros, usar el mismo precio que para residentes
        if (empty($data['price_foreigners']) && !empty($data['price'])) {
            $data['price_foreigners'] = $data['price'];
        }
        
        return $data;
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tour_id')
                    ->relationship(
                        name: 'tour',
                        titleAttribute: 'name',
                        modifyQueryUsing: function ($query) {
                            $user = auth()->user();
                            if (!($user->is_admin ?? $user->hasRole('admin'))) {
                                $query->where('company_id', $user->company_id);
                            }
                            return $query->orderBy('name');
                        }
                    )
                    ->required()
                    ->searchable()
                    ->preload(),
                DateTimePicker::make('date')
                    ->label('Fecha y Hora')
                    ->required()
                    ->displayFormat('d/m/Y H:i')
                    ->seconds(false),
                TextInput::make('available_slots')
                    ->label('Cupos disponibles')
                    ->required()
                    ->numeric(),
                Select::make('currency')
                    ->label('Moneda')
                    ->options([
                        'CRC' => 'Colones (₡)',
                        'USD' => 'Dólares ($)',
                    ])
                    ->default('CRC')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, $set) {
                        // Actualizar sufijos cuando cambia la moneda
                        $suffix = $state === 'USD' ? '$' : '₡';
                        $set('price_suffix', $suffix);
                    }),
                    
                TextInput::make('price')
                    ->label('Precio (residentes)')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->suffix(fn ($get) => $get('currency') === 'USD' ? '$' : '₡')
                    ->hint('Dejar en blanco si no aplica')
                    ->nullable(),
                    
                TextInput::make('price_foreigners')
                    ->label('Precio (extranjeros)')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->suffix(fn ($get) => $get('currency') === 'USD' ? '$' : '₡')
                    ->hint('Dejar en blanco si es el mismo precio')
                    ->nullable(),
                Select::make('status')
                    ->options([
                        'available' => 'Disponible',
                        'sold_out' => 'Agotado',
                        'cancelled' => 'Cancelado',
                    ])
                    ->default('available')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
                ...static::getCompanyField(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tour.name'),
                TextColumn::make('date')
                    ->dateTime('d/m/Y H:i')
                    ->label('Fecha y Hora'),
                TextColumn::make('available_slots')
                    ->label('Cupos disponibles'),
                TextColumn::make('price')
                    ->label('Precio Res.')
                    ->formatStateUsing(fn ($state, $record) => $state ? 
                        ($record->currency === 'USD' ? '$' : '₡') . number_format($state, 2) : '-')
                    ->alignEnd(),
                    
                TextColumn::make('price_foreigners')
                    ->label('Precio Ext.')
                    ->formatStateUsing(fn ($state, $record) => $state ? 
                        ($record->currency === 'USD' ? '$' : '₡') . number_format($state, 2) : '-')
                    ->alignEnd(),
                    
                TextColumn::make('currency')
                    ->label('Moneda')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'USD' => 'success',
                        'CRC' => 'primary',
                    }),
                TextColumn::make('status')
                    ->label('Estado')
                        ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'sold_out' => 'danger',
                        'cancelled' => 'warning',
                    }),
                TextColumn::make('company.name')->label('Company'),
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
            'index' => Pages\ListTourDates::route('/'),
            'create' => Pages\CreateTourDate::route('/create'),
            'edit' => Pages\EditTourDate::route('/{record}/edit'),
        ];
    }
}
