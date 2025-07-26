<?php

namespace App\Filament\Resources\TourDateResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class ReservationsRelationManager extends RelationManager
{
    protected static string $relationship = 'reservations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('customer_name')
            ->columns([
                TextColumn::make('customer_name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('customer_email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('adults')
                    ->label('Adultos')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('children')
                    ->label('Niños')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('foreigners')
                    ->label('Extranjeros')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_people')
                    ->label('Total')
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
                    ->label('Fecha de reserva')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Nueva Reserva')
                    ->mutateFormDataUsing(function (array $data): array {
                        // Aquí podrías agregar lógica adicional si es necesario
                        return $data;
                    }),
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
}
