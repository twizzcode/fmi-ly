<?php

namespace App\Filament\Resources\Contacts;

use App\Filament\Resources\Contacts\Pages;
use App\Models\Contact;
use Filament\Resources\Resource;
use BackedEnum;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Pesan Masuk';

    //notif badge
    public static function getNavigationBadge(): ?string
{
    $count = static::getModel()::where('is_read', false)->count();

    return $count > 0 ? (string) $count : null;
}

    public static function getNavigationBadgeColor(): ?string
    {
        /**
         * Memberi warna merah (danger) pada angka notifikasi
         * agar lebih terlihat oleh admin.
         */
        return 'danger';
    }

    // ----------------------------------

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->disabled(),
                \Filament\Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->disabled(),
                \Filament\Forms\Components\Textarea::make('message')
                    ->label('Pesan')
                    ->disabled()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')->label('Nama')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('email')->label('Email'),
                \Filament\Tables\Columns\TextColumn::make('message')->label('Pesan')->limit(30),
                \Filament\Tables\Columns\TextColumn::make('created_at')->label('Waktu')->dateTime(),
            ])
            ->actions([
                \Filament\Actions\ViewAction::make()
                ->label('Lihat Pesan')
                ->after(function ($record) {
                    
                    $record->update(['is_read' => true]);
                })

                ->after(fn () => redirect(static::getUrl('index'))),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
            
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
        ];
    }
}