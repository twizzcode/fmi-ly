<?php

namespace App\Filament\Resources\LinkServices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction; // Tambahkan ini
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class LinkServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('judul')
                    ->label('Layanan'),
                \Filament\Tables\Columns\TextColumn::make('url')
                    ->label('Link Aktif')
                    ->limit(50),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(), 
                \Filament\Actions\DeleteAction::make(),
            ]);
    }
}