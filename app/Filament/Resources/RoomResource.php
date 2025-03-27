<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use App\Filament\Traits\HasCompanyField;

class RoomResource extends Resource
{
    use HasCompanyField;
    protected static ?string $model = Room::class;
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('number')->required()->numeric(),
                Select::make('type')->options(['cabin' => 'Cabin','room' => 'Room','suite' => 'Suite'])->default('room'),
                TextInput::make('price_per_night')->nullable()->numeric()->prefix('$'),
                TextInput::make('capacity')->required()->numeric()->default(2),
                TextInput::make('beds')->required()->numeric()->default(1),
                RichEditor::make('description')->nullable()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                ->columnSpanFull(),
                Textarea::make('short_description')->nullable()->columnSpanFull(),
                TagsInput::make('amenities')
                ->separator(',')
                ->default([
                    'Free toiletries',
                    'Towels',
                    'Bed linen',
                    'Power outlet near the bed',
                    'Cleaning products',
                    'Private entrance',
                    'Fan',
                    'Towels/sheets (extra fee)',
                    'Wardrobe',
                    'Entire unit located on ground floor',
                    'Clothes rack',
                    'Drying rack',
                    'Toilet paper',
                    'Entire unit wheelchair accessible',
                    'Individual air conditioning for each accommodation',
                    'Hand sanitizer',
                    'Accessible for hearing impaired',
                ])
                ->columnSpanFull(),
                Select::make('status')->options(['available' => 'Available','occupied' => 'Occupied','maintenance' => 'Maintenance','inactive' => 'Inactive'])->default('available'),
                ...static::getCompanyField(),
                FileUpload::make('cover_image')->label('Cover Image')->image()->imageEditor()->imageEditorMode(1)->disk('public')->directory(fn (Forms\Get $get) => 'rooms/' . $get('company_id') . '/cover')->columnSpanFull(),
                Repeater::make('images')->label('Additional Images')->relationship()->schema([
                    FileUpload::make('path')->image()->disk('public')
                        ->directory(function ($livewire) {
                            // Get company_id from the parent form
                            return 'rooms/' . $livewire->data['company_id'] . '/additional';
                        }),
                    TextInput::make('name')->required(),
                ])->collapsible()->defaultItems(0)->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('number')->sortable(),
                TextColumn::make('type')->sortable(),
                TextColumn::make('price_per_night')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('capacity')->sortable(),
                IconColumn::make('status')
                    ->icon(fn (string $state): string => match ($state) {
                        'available' => 'heroicon-o-check-circle',
                        'occupied' => 'heroicon-o-user',
                        'maintenance' => 'heroicon-o-wrench',
                        'inactive' => 'heroicon-o-x-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'occupied' => 'warning',
                        'maintenance' => 'danger',
                        'inactive' => 'gray',
                    }),
                TextColumn::make('company.name')->sortable(),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
