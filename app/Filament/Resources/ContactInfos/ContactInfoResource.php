<?php

namespace App\Filament\Resources\ContactInfos;

use App\Filament\Resources\ContactInfos\Pages;
use App\Models\ContactInfo;
use Filament\Resources\Resource;
use BackedEnum;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-phone';

    protected static ?string $recordTitleAttribute = 'type';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return \App\Filament\Resources\ContactInfos\Schemas\ContactInfoForm::configure($schema);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('type')
                    ->label('Tipe Kontak')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('icon')
                    ->label('Nama Icon'),
                \Filament\Tables\Columns\TextColumn::make('value')
                    ->label('Isi Kontak')
                    ->searchable(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(), 
                \Filament\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactInfos::route('/'),
            'create' => Pages\CreateContactInfo::route('/create'),
            'edit' => Pages\EditContactInfo::route('/{record}/edit'),
        ];
    }
}