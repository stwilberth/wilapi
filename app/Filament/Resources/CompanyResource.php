<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

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
                    ->unique(Company::class, 'slug', ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\Textarea::make('about')
                    ->nullable(),
                Forms\Components\Textarea::make('address')
                    ->nullable(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->unique(Company::class, 'email', ignoreRecord: true),
                Forms\Components\TextInput::make('phone')
                    ->nullable(),
                Forms\Components\TextInput::make('whatsapp')
                    ->nullable(),
                Forms\Components\TextInput::make('facebook')
                    ->nullable(),
                Forms\Components\TextInput::make('instagram')
                    ->nullable(),
                Forms\Components\TextInput::make('twitter')
                    ->nullable(),
                Forms\Components\TextInput::make('tripadvisor')
                    ->nullable(),
                Forms\Components\TextInput::make('youtube')
                    ->nullable(),
                Forms\Components\TextInput::make('tiktok')
                    ->nullable(),
                Forms\Components\TextInput::make('website')
                    ->nullable(),
                Forms\Components\TextInput::make('url_logo')
                    ->nullable(),
                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->default('active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('whatsapp'),
                Tables\Columns\TextColumn::make('website'),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
