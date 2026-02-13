<?php

namespace App\Filament\Resources\ContactInfos\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ContactInfosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Tipe Kontak')
                    ->searchable(),

                TextColumn::make('icon')
                    ->label('Icon'),

                TextColumn::make('value')
                    ->label('Isi Kontak / Alamat')
                    ->searchable(),
            ]);
    }
}