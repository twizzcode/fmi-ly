<?php

namespace App\Filament\Resources\Galleries;

use App\Filament\Resources\Galleries\Pages;
use App\Models\Gallery;
use Filament\Resources\Resource;
use BackedEnum;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return \App\Filament\Resources\Galleries\Schemas\GalleryForm::configure($schema);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image')
                    ->label('Foto'),
                \Filament\Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('date_of_event')
                    ->label('Tanggal Kegiatan')
                    ->date('d M Y')
                    ->sortable(),
            ])
                    ->actions([
            \Filament\Actions\EditAction::make(), 
            \Filament\Actions\DeleteAction::make(),
        ])
            ;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}