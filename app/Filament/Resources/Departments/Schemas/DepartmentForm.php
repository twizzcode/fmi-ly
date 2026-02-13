<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Departemen')
                    ->required()
                    ->placeholder('Contoh: Dept. PH'),

                FileUpload::make('image')
                    ->label('Foto Departemen')
                    ->disk('s3')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048)
                    ->imageResizeMode('contain')
                    ->imageResizeTargetWidth(1600)
                    ->imageResizeTargetHeight(1600)
                    ->directory('departments')
                    ->required()
                    ->imageEditor(),
            ]);
    }
}
