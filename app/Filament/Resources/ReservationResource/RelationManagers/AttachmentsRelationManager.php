<?php

namespace App\Filament\Resources\ReservationResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\FileUploads\TemporaryUploadedFile;

class AttachmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'attachments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('path')
                    ->label('Archivo')
                    ->required()
                    ->directory('reservation-attachments')
                    ->preserveFilenames()
                    ->maxSize(10240) // 10MB
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'image/jpeg',
                        'image/png',
                    ])
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => 
                            (string) str($file->getClientOriginalName())
                                ->prepend(now()->timestamp . '-')
                    )
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        if ($state) {
                            $set('original_filename', $state->getClientOriginalName());
                            $set('mime_type', $state->getMimeType());
                            $set('size', $state->getSize());
                        }
                    })
                    ->downloadable()
                    ->openable()
                    ->previewable()
                    ->columnSpanFull(),
                
                Forms\Components\TextInput::make('original_filename')
                    ->label('Nombre del archivo')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                
                Forms\Components\Hidden::make('uploaded_by')
                    ->default(auth()->id()),
                
                Forms\Components\Hidden::make('mime_type'),
                Forms\Components\Hidden::make('size'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('original_filename')
            ->columns([
                Tables\Columns\TextColumn::make('original_filename')
                    ->label('Archivo')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('mime_type')
                    ->label('Tipo')
                    ->formatStateUsing(fn (string $state): string => 
                        match (true) {
                            str_starts_with($state, 'image/') => 'Imagen',
                            $state === 'application/pdf' => 'PDF',
                            str_starts_with($state, 'application/msword') => 'Documento Word',
                            str_starts_with($state, 'application/vnd.openxmlformats') => 'Documento Word',
                            default => $state,
                        }
                    )
                    ->badge()
                    ->color(fn (string $state): string => 
                        match (true) {
                            str_starts_with($state, 'image/') => 'success',
                            $state === 'application/pdf' => 'danger',
                            str_starts_with($state, 'application/msword') => 'primary',
                            str_starts_with($state, 'application/vnd.openxmlformats') => 'primary',
                            default => 'gray',
                        }
                    ),
                
                Tables\Columns\TextColumn::make('size')
                    ->label('Tamaño')
                    ->formatStateUsing(fn (int $state): string => 
                        $state < 1024 ? 
                            $state . ' B' : 
                            (($size = round($state / 1024, 2)) < 1024 ? 
                                $size . ' KB' : 
                                round($size / 1024, 2) . ' MB'
                            )
                    ),
                
                Tables\Columns\TextColumn::make('uploadedBy.name')
                    ->label('Subido por')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de subida')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Subir archivo'),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->label('Descargar')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn ($record) => Storage::url($record->path))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        Storage::delete($record->path);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records) {
                            foreach ($records as $record) {
                                Storage::delete($record->path);
                            }
                        }),
                ]),
            ]);
    }
}
