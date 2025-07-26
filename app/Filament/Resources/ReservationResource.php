<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Reservaciones';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tour_date_id')
                    ->relationship('tourDate', 'date')
                    ->required()
                    ->label('Fecha del tour'),
                
                TextInput::make('customer_name')
                    ->label('Nombre del cliente')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('customer_email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('customer_phone')
                    ->label('Teléfono')
                    ->tel()
                    ->maxLength(20),
                
                Forms\Components\Fieldset::make('Pasajeros')
                    ->schema([
                        TextInput::make('adults')
                            ->label('Adultos')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->live(onBlur: true),
                        TextInput::make('children')
                            ->label('Niños (3-12 años)')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->live(onBlur: true),
                        TextInput::make('foreigners')
                            ->label('Extranjeros')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->live(onBlur: true),
                        TextInput::make('total_people')
                            ->label('Total de personas')
                            ->disabled()
                            ->dehydrated()
                            ->numeric()
                            ->default(1)
                            ->afterStateUpdated(function (callable $set, $get) {
                                $total = (int)$get('adults') + (int)$get('children') + (int)$get('foreigners');
                                $set('total_people', $total);
                            }),
                    ])->columns(2),
                
                Textarea::make('special_requests')
                    ->label('Solicitudes especiales')
                    ->columnSpanFull(),
                
                Select::make('status')
                    ->label('Estado de la reserva')
                    ->options([
                        'pending' => 'Pendiente',
                        'confirmed' => 'Confirmada',
                        'cancelled' => 'Cancelada',
                    ])
                    ->default('pending')
                    ->required(),
                
                Select::make('payment_status')
                    ->label('Estado del pago')
                    ->options([
                        'pending' => 'Pendiente de pago',
                        'partial' => 'Pago parcial',
                        'paid' => 'Pagado',
                        'refunded' => 'Reembolsado',
                        'cancelled' => 'Cancelado',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tourDate.tour.name')
                    ->label('Tour')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('tourDate.date')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                
                TextColumn::make('customer_name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('total_people')
                    ->label('Personas')
                    ->numeric()
                    ->sortable(),
                
                BadgeColumn::make('status')
                    ->label('Estado')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pendiente',
                        'confirmed' => 'Confirmada',
                        'cancelled' => 'Cancelada',
                    }),
                
                BadgeColumn::make('payment_status')
                    ->label('Pago')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'partial',
                        'success' => 'paid',
                        'gray' => 'refunded',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pendiente',
                        'partial' => 'Parcial',
                        'paid' => 'Pagado',
                        'refunded' => 'Reembolsado',
                        'cancelled' => 'Cancelado',
                    }),
                
                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\ReservationResource\RelationManagers\AttachmentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'view' => Pages\ViewReservation::route('/{record}'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
