<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\DatePicker;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Foto')
                    ->required(),

                FileUpload::make('image')
                    ->label('Pilih Foto')
                    ->disk('s3')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048)
                    ->imageResizeMode('contain')
                    ->imageResizeTargetWidth(1920)
                    ->imageResizeTargetHeight(1080)
                    ->directory('galeri-fmi')
                    ->required(),

                Textarea::make('description')
                    ->label('Tambahkan Link Google Drive')
                    ->columnSpanFull()
                    ->required(),

                Textarea::make('content')
                    ->label('Deskripsi Kegiatan')
                    ->placeholder('Jelaskan singkat mengenai kegiatan ini...')
                    ->rows(3)
                    ->columnSpanFull(),

                DatePicker::make('date_of_event')
                    ->label('Tanggal Kegiatan')
                    ->native(false)
                    ->displayFormat('d M Y')
                    ->required(),
            ]);
    }
}
