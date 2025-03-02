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
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('slug')->required()->unique(Company::class, 'slug', ignoreRecord: true)->maxLength(255),
                Textarea::make('about')->nullable(),
                Textarea::make('address')->nullable(),
                TextInput::make('email')->required()->email()->unique(Company::class, 'email', ignoreRecord: true),
                TextInput::make('phone')->nullable(),
                TextInput::make('whatsapp')->nullable(),
                TextInput::make('facebook')->nullable(),
                TextInput::make('instagram')->nullable(),
                TextInput::make('twitter')->nullable(),
                TextInput::make('tripadvisor')->nullable(),
                TextInput::make('youtube')->nullable(),
                TextInput::make('tiktok')->nullable(),
                TextInput::make('website')->nullable(),
                FileUpload::make('url_logo')
                    ->nullable()
                    ->label('Logo')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(1)
                    ->disk('public')
                    ->directory('companies/logos'),
                Select::make('status')->options(['active' => 'Active','inactive' => 'Inactive'])->default('active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                TextColumn::make('whatsapp'),
                IconColumn::make('status')
                ->icon(fn (string $state): string => match ($state) {
                    'active' => 'heroicon-o-check-circle',
                    'inactive' => 'heroicon-o-x-circle',
                    default => 'heroicon-o-question-mark-circle',
                })
                ->color(fn (string $state): string => match ($state) {
                    'active' => 'success',
                    'inactive' => 'danger',
                    default => 'gray',
                }),
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
