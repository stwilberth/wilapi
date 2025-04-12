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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Traits\HasCompanyField;

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
                RichEditor::make('description')
                    ->nullable()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h1',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'subscript',
                        'superscript',
                        'table',
                        'underline',
                        'undo'
                    ])
                    ->columnSpanFull(),
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
                Repeater::make('images')
                    ->label('Additional Images')
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
                ->columnSpanFull()
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
