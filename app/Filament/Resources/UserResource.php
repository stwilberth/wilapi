<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Administración';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(User::class, 'email', ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required(function ($record) {
                        return !$record;
                    })
                    ->minLength(8)
                    ->dehydrated(fn ($state) => filled($state))
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
                DateTimePicker::make('email_verified_at')
                    ->label('Email verificado el')
                    ->nullable(),
                Select::make('company_id')
                    ->label('Compañía')
                    ->relationship('company', 'name')
                    ->options(Company::pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->nullable(),
                Toggle::make('is_admin')
                    ->label('Es administrador')
                    ->default(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('company.name')
                    ->label('Compañía')
                    ->sortable(),
                IconColumn::make('email_verified_at')
                    ->label('Verificado')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->sortable(),
                ToggleColumn::make('is_admin')
                    ->label('Admin')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('company_id')
                    ->label('Compañía')
                    ->relationship('company', 'name'),
                SelectFilter::make('is_admin')
                    ->label('Rol')
                    ->options([
                        '1' => 'Administrador',
                        '0' => 'Usuario',
                    ]),
                SelectFilter::make('email_verified_at')
                    ->label('Verificación')
                    ->options([
                        'verified' => 'Verificado',
                        'unverified' => 'No verificado',
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(
                                $data['value'] === 'verified',
                                fn (Builder $query) => $query->whereNotNull('email_verified_at'),
                            )
                            ->when(
                                $data['value'] === 'unverified',
                                fn (Builder $query) => $query->whereNull('email_verified_at'),
                            );
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}