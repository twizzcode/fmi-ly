<?php

namespace App\Filament\Resources\LinkServices\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class LinkServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->label('Judul Layanan'),
                Textarea::make('keterangan')
                    ->required()
                    ->label('Deskripsi'),
                TextInput::make('url')
                    ->url()
                    ->required()
                    ->label('Link Google Form'),
            ]);
    }
}
