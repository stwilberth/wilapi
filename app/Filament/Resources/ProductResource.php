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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Support\Facades\Http;
use App\Filament\Traits\HasCompanyField;

class ProductResource extends Resource
{
    use HasCompanyField;
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),
                Actions::make([
                    Action::make('generarDescripcion')
                        ->label('Generar Descripción con IA')
                        ->button()
                        ->color('primary')
                        ->icon('heroicon-o-sparkles')
                        ->action(function ($get, $set) {
                            // Obtener el nombre del producto del estado actual del formulario
                            $productName = $get('name');
                            
                            // Verificar que el nombre del producto esté presente
                            if (empty($productName)) {
                                throw new \Exception('El nombre del producto es requerido para generar la descripción.');
                            }
                            
                            // Usar exclusivamente DeepSeek API
                            $apiKey = 'sk-5da1c1e67eec472182650233b46909f6';
                            
                            if (empty($apiKey)) {
                                throw new \Exception('La API key de DeepSeek no está configurada. Por favor, configúrela en el archivo .env');
                            }
                            
                            $response = Http::withHeaders([
                                'Authorization' => 'Bearer ' . $apiKey,
                                'Content-Type' => 'application/json',
                            ])->withoutVerifying()->post('https://api.deepseek.com/v1/chat/completions', [
                                'model' => 'deepseek-chat',
                                'messages' => [
                                    ['role' => 'system', 'content' => 'Eres un asistente experto en redacción de descripciones de productos. Genera una descripción detallada y atractiva para el siguiente producto.'],
                                    ['role' => 'user', 'content' => 'Genera una descripción comercial para el producto: ' . $productName],
                                ],
                                'temperature' => 0.7,
                                'max_tokens' => 500,
                            ]);
                            
                            if ($response->successful()) {
                                // Extraer la descripción generada de la respuesta
                                $description = $response->json('choices.0.message.content');
                                $set('description', $description);
                            } else {
                                // Mostrar mensaje de error con detalles
                                $errorMessage = $response->json('error.message') ?? 'Error al generar la descripción.'; 
                                throw new \Exception('Error: ' . $errorMessage);
                            }
                        })
                ])->columnSpanFull(),
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
                Select::make('status')->options(['active' => 'Active','inactive' => 'Inactive'])->default('active'),
                Select::make('category_id')->relationship('category', 'name')->required(),
                Select::make('brand_id')->relationship('brand', 'name')->required(),
                ...static::getCompanyField(),
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
