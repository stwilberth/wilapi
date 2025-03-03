<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('price')->required()->numeric()->prefix('$'),
                Textarea::make('description')->nullable()->columnSpanFull(),
                Textarea::make('short_description')->nullable()->columnSpanFull(),
                Select::make('status')->options(['active' => 'Active','inactive' => 'Inactive'])->default('active'),
                Select::make('category_id')->relationship('category', 'name')->required(),
                Select::make('brand_id')->relationship('brand', 'name')->required(),
                Select::make('company_id')->relationship('company', 'name')->required(),
                FileUpload::make('cover_image')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(1)
                    ->directory(fn (Forms\Get $get) => 'products/' . $get('company_id'))
                    ->disk('public')
                    ->columnSpanFull(),
                Repeater::make('images')
                    ->label('Additional Images')
                    ->relationship()
                    ->schema([
                        FileUpload::make('path')
                            ->image()
                            ->disk('public')
                            ->directory(fn (Forms\Get $get) => 'products/' . $get('company_id') . '/additional'),
                        TextInput::make('name')->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->sortable(),
                TextColumn::make('brand.name')
                    ->sortable(),
                TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                IconColumn::make('status')
                    ->icon(fn (string $state): string => match ($state) {
                        'active' => 'heroicon-o-check-circle',
                        'inactive' => 'heroicon-o-x-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                    }),
                TextColumn::make('company.name')
                    ->sortable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
